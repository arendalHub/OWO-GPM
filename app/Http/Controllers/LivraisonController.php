<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleLivraison;
use App\Models\ArticleMouvement;
use App\Models\Commande;
use App\Models\Fournisseur;
use App\Models\Livraison;
use App\Models\MouvementStock;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivraisonController extends Controller
{
    public function list(string $num_page = null)
    {
        $livraisons = Livraison::orderBy('id_livraison', 'desc')
            ->paginate(10);
        for($i = 0; $i<count($livraisons); ++$i)
        {
            $articles = DB::table("article")
                ->leftJoin('articlemouvement', 'articlemouvement.id_article', '=', 'article.id_article')
                ->leftJoin('mouvementstock', 'mouvementstock.id_mouvement_stock', '=', 'articlemouvement.id_mouvement')
                ->where('mouvementstock.id_mouvement_stock', '=', $livraisons[$i]->id_mouvement_stock)
                ->get() ;
            $total = 0 ;

            foreach ($articles as $article) {
                $total  +=  $article->prix ;
            }
            $livraisons[$i]->total_livraison = $total ;
        }

        return view("stock/livraison/list")->with(['livraisons' => $livraisons]);
    }

    /**
     * Afficher les details d'une livraison
     * @param string $id_livraison l'id de la livraison.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details(string $id_livraison)
    {
        $var = $this->livraison_details($id_livraison) ;

        return view("stock/livraison/details")->with(['livraison'=>$var[0], 'articles'=>$var[1], 'total'=>$var[2]]) ;
    }


    /**
     * Imprimer les details de la livraison.
     * @param string $item_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function print(string $item_id)
    {
        $var = $this->livraison_details($item_id) ;

        try
        {
            $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 3);
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML(
                view("stock/livraison/detailspart")->with(['livraison'=>$var[0], 'articles'=>$var[1], 'total'=>$var[2]])
            );
            $html2pdf->output('Livraison LIV-'.$item_id->id_livraison.'.pdf') ;
            return back()->with(["message"=>"Impression faite"]) ;
        }
        catch (Html2PdfException $e)
        {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            return redirect('/stock/livraison/details/'.$item_id->id_livraison)->with(["error"=>$formatter->getHtmlMessage()]) ;
        }
    }

    protected function livraison_details($id_livraison)
    {
        $livraison = Livraison::where('livraison.id_livraison', $id_livraison)
            ->leftJoin('mouvementstock', 'mouvementstock.id_livraison', '=', 'livraison.id_livraison')->get()[0];

        $livraison->fournisseur = Livraison::find($livraison->id_fournisseur) ;
        $articles = DB::table("article")
            ->select([
                "articlemouvement.prix",
                "articlemouvement.quantite_mouvement",
                "articlemouvement.date_peremption",
                "articlemouvement.date_fabrication",
                "articlemouvement.id_article"
            ])
            ->leftJoin('articlemouvement', 'articlemouvement.id_article', '=', 'article.id_article')
            ->where('articlemouvement.id_mouvement', '=', $livraison->id_mouvement_stock)
            ->get() ;
        foreach($articles as $article) {
            $article->designation_article = Article::find($article->id_article)->designation_article ;
        }

        $total = 0 ;
        for($i = 0; $i<count($articles); ++$i)
            $total+= $articles[0]->prix ;

        return [$livraison, $articles, $total] ;
    }

    /**
     * Afficher le formulaire d'enregistrement d'un commande.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create_update()
    {
        // Affichage
        $commandes = Commande::where('livre', false)->orderBy('id_commande', 'asc')->get();
        $fournisseurs = Fournisseur::all();
        return view(
            'stock.livraison.create_update',
            [
                'commandes' => $commandes,
                'fournisseurs' => $fournisseurs
            ]
        );
    }

    /**
     * Cette fonction traite le formulaire d'enregistrement de produit.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function do_create_update(Request $request)
    {
        $postData = $request->all() ;

        $livraison = new Livraison  ;
        $mouvement = new MouvementStock() ;

        $livraison->date_livraison = date("d-m-Y H:i:s") ;
        $livraison->id_commande = $postData["id_commande"] ;
        $livraison->num_bordereau = $postData["num_bordereau"] ;
        $livraison->num_facture = $postData["num_facture"] ;
        if($livraison->save())
        {
            $mouvement->id_fournisseur = $postData["id_fournisseur"] ;
            $mouvement->id_livraison = $livraison->id_livraison ;
            $mouvement->id_type_mouvement_stock = 1;
            $mouvement->date_mouvement = $livraison->date_livraison ;
            $mouvement->save() ;

            $postDataKeys = array_keys($postData) ;
            for($i=0; $i<count($postDataKeys); $i++)
            {
                if(strstr($postDataKeys[$i], "id_article-") !== false)
                {
                    // Bulk insertion without verification
                    if($postData[$postDataKeys[$i+1]] != 0)
                    {
                        $am = new Articlemouvement() ;
                        $am->id_article = $postData[$postDataKeys[$i]] ;
                        $am->id_mouvement = $mouvement->id_mouvement_stock ;
                        $am->prix = $postData[$postDataKeys[$i+2]] ;
                        $am->date_peremption = $postData[$postDataKeys[$i+3]] ;
                        $am->date_fabrication = $postData[$postDataKeys[$i+4]] ;
                        $am->quantite_mouvement = $postData[$postDataKeys[$i+1]] ;
                        $am->save() ;

                        // This should work
                        $article = Article::find($am->id_article) ;
                        $article->quantite_stock += $am->quantite_mouvement ;
                        $article->save() ;
                    }
                }
            }

            // Mise à jour de la commande pour livre = true
            // if($this->isFullDelivered( intval( $postData["id_commande"] ) ))
            // {
                $commande = Commande::find($postData["id_commande"]);
                $commande->livre = true ;
                // Bulk update
                $commande->save() ;
                // return redirect("/stock/livraison/list")->with(["message"=>"Votre commande est maintenant entièrement livrée !"]) ;
            // }

            return redirect("/stock/livraison/list")->with(["message"=>"Votre livraison a été enregistrée !"]) ;
        }
        return back()->with(["error"=>"Une erreur inattendue est survenue, veuillez réessayer !"]) ;
    }

    public function isFullDelivered(int $id_commande)
    {
        $articles = DB::table('article')
            ->leftJoin('articlecommande', 'articlecommande.id_article', '=', 'article.id_article')
            ->where('articlecommande.id_commande', '=', intval($id_commande))
            ->get(['article.id_article', 'quantite_stock']);
        // Vérifions s'il y a déjà une livraison pour certains produits
        $delivered = DB::table('articlemouvement')
            ->leftJoin('articlecommande', 'articlecommande.id_article', '=', 'articlemouvement.id_article')
            ->where('articlecommande.id_commande', '=', intval($id_commande))
            ->get(['articlemouvement.id_article', 'articlemouvement.quantite_mouvement']);
        // Trie des deux collections
        $articlesArr = Collection::unwrap($articles);
        $deliveredArr = Collection::unwrap($delivered);
        if (count($deliveredArr) > 0)
        {
            for ($i = 0; $i < count($deliveredArr); $i++)
            {
                for ($j = 0; $j < count($articlesArr); $j++)
                {
                    if ($deliveredArr[$i]->id_article == $articlesArr[$j]->id_article)
                    {
                        $flag = intval($articlesArr[$j]->quantite_stock - $deliveredArr[$i]->quantite_mouvement);
                        if ($flag >= 1)
                        {
                            return false;
                        }
                    }
                }
            }
            return true;
        }
        return false;
    }

    public function getItemsPart(string $id_commande)
    {
        $articles = DB::table('article')
            ->leftJoin('articlecommande', 'articlecommande.id_article', '=', 'article.id_article')
            ->where('articlecommande.id_commande', '=', intval($id_commande))
            ->get(['article.id_article', 'designation_article', 'quantite_commande']);

        // Vérifions s'il y a déjà une livraison pour certains produits
        $delivered = DB::table('articlemouvement')
            ->leftJoin('articlecommande', 'articlecommande.id_article', '=', 'articlemouvement.id_article')
            ->where('articlecommande.id_commande', '=', intval($id_commande))
            ->get(['articlemouvement.id_article', 'articlemouvement.quantite_mouvement']);

        // Trie des deux collections
        $articlesArr = Collection::unwrap($articles);
        $deliveredArr = Collection::unwrap($delivered);

        if (count($deliveredArr) > 0)
        {
            for ($i = 0; $i < count($articlesArr); $i++)
            {
                if ($deliveredArr[$i]->id_article == $articlesArr[$i]->id_article)
                {
                    $articlesArr[$i]->quantite_commande -= $deliveredArr[$i]->quantite_mouvement;
                }
            }
        }



        return view('stock.livraison.itemspart', ['articles' => $articlesArr, 'id' => uniqid()]);
    }
}
