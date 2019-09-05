<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCommande;
use App\Models\ArticleLivraison;
use App\Models\ArticleMouvement;
use App\Models\Commande;
use App\Models\Fournisseur;
use App\Models\Livraison;
use App\Models\MouvementStock;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spipu\Html2Pdf\HTML2PDF;

class LivraisonController extends Controller
{
    public function list()
    {
        if (isset($_GET['date_deb'])) {
            $sql = "SELECT * FROM livraison WHERE";

            if ($_GET['date_fin'] == null )
                $sql .= " date_format(livraison.date_livraison, '%d %m %Y') = date_format('" . $_GET['date_deb'] . "', '%d %m %Y')";
            else
                $sql .= " date_format(livraison.date_livraison, '%d %m %Y') BETWEEN date_format('" . $_GET['date_deb'] . "', '%d %m %Y') AND date_format('" . $_GET['date_fin'] . "', '%d %m %Y')";

            // dd($sql);
            $livraisons = DB::select($sql);

        } else {
            $livraisons = Livraison::orderBy('id_livraison', 'desc')->get();
        }

        for ($i = 0; $i < count($livraisons); ++$i) {
            $lignes = DB::table("articlemouvement")
                ->leftJoin('mouvementstock', 'mouvementstock.id_mouvement_stock', '=', 'articlemouvement.id_mouvement')
                ->where('mouvementstock.id_livraison', '=', $livraisons[$i]->id_livraison)
                ->get();
            $total = 0;

            foreach ($lignes as $ligne) {
                $total  +=  $ligne->prix * $ligne->quantite_mouvement;
            }

            $livraisons[$i]->total_livraison = $total;
        }

        $commandes = Commande::where('livre', false)->orderBy('id_commande', 'asc')->get();

        return view("stock/livraison/list")->with([
                'livraisons' => $livraisons,
                'commandes' => $commandes
            ]);
    }

    /**
     * Afficher les details d'une livraison
     * @param string $id_livraison l'id de la livraison.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details(string $id_livraison)
    {
        $var = $this->livraison_details($id_livraison);

        return view("stock/livraison/details")->with(['livraison' => $var[0], 'articles' => $var[1], 'total' => $var[2]]);
    }

    /**
     * Imprimer les details de la livraison.
     * @param string $item_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function print_list()
    {
        if (isset($_GET['date_deb'])) {
            $sql = "SELECT * FROM livraison WHERE";

            if ($_GET['date_fin'] == null )
                $sql .= " date_format(livraison.date_livraison, '%d %m %Y') = date_format('" . $_GET['date_deb'] . "', '%d %m %Y')";
            else
                $sql .= " date_format(livraison.date_livraison, '%d %m %Y') BETWEEN date_format('" . $_GET['date_deb'] . "', '%d %m %Y') AND date_format('" . $_GET['date_fin'] . "', '%d %m %Y')";

            $livraisons = DB::select($sql);

        } else {
            $livraisons = Livraison::orderBy('id_livraison', 'desc')->get();
        }

        for($i = 0; $i<count($livraisons); ++$i)
        {
            $lignes = DB::table("articlemouvement")
                ->leftJoin('mouvementstock', 'mouvementstock.id_mouvement_stock', '=', 'articlemouvement.id_mouvement')
                ->where('mouvementstock.id_livraison', '=', $livraisons[$i]->id_livraison)
                ->get();
            $total = 0;

            foreach ($lignes as $ligne) {
                $total  +=  $ligne->prix * $ligne->quantite_mouvement;
            }

            $livraisons[$i]->total_livraison = $total;
        }

        try
        {
            $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 3);
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML(
                view("stock/livraison/print_list")->with(['livraisons'=>$livraisons])
            );
            $html2pdf->output('Liste des livraisons.pdf') ;
            return back()->with(["message"=>"Impression faite"]) ;
        }
        catch (Html2PdfException $e)
        {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            return redirect('/stock/livraison/list/')->with(["error"=>$formatter->getHtmlMessage()]) ;
        }
    }

    public function print_details(string $item_id)
    {
        $var = $this->livraison_details($item_id);

        try {
            $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 3);
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML(
                view("stock/livraison/print_details")->with(['livraison' => $var[0], 'articles' => $var[1], 'total' => $var[2]])
            );
            $html2pdf->output('Livraison LIV-' . $item_id . '.pdf');
            return back()->with(["message" => "Impression faite"]);
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            return redirect('/stock/livraison/details/' . $item_id)->with(["error" => $formatter->getHtmlMessage()]);
        }
    }

    protected function livraison_details($id_livraison)
    {
        $livraison = Livraison::where('livraison.id_livraison', $id_livraison)
            ->leftJoin('mouvementstock', 'mouvementstock.id_livraison', '=', 'livraison.id_livraison')->get()[0];

        $livraison->fournisseur = Livraison::find($livraison->id_fournisseur);
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
            ->get();
        foreach ($articles as $article) {
            $article->designation_article = Article::find($article->id_article)->designation_article;
        }

        $total = 0;
        for ($i = 0; $i < count($articles); ++$i)
            $total += $articles[$i]->prix * $articles[$i]->quantite_mouvement;

        return [$livraison, $articles, $total];
    }

    /**
     * Afficher le formulaire d'enregistrement d'un commande.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create_update()
    {
        // Affichage
        $id_cmd = $_GET['id_commande'];
        $articles = DB::table('articlecommande')
            ->leftJoin('article', 'articlecommande.id_article', '=', 'article.id_article')
            ->where('id_commande', '=', intval($id_cmd))
            ->get(['article.id_article', 'designation_article', 'quantite_commande', 'prix_achat']);
        $fournisseurs = Fournisseur::all();
        return view(
            'stock.livraison.create_update',
            [
                'fournisseurs' => $fournisseurs,
                'articles' => $articles
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
        $postData = $request->all();

        $livraison = new Livraison;
        $mouvement = new MouvementStock();

        $livraison->date_livraison = date("Y-m-d H:i:s");
        $livraison->id_commande = $postData["id_commande"];
        $livraison->num_bordereau = $postData["num_bordereau"];
        $livraison->num_facture = $postData["num_facture"];

        if ($livraison->save()) {
            $mouvement->id_fournisseur = $postData["id_fournisseur"];
            $mouvement->id_livraison = $livraison->id_livraison;
            $mouvement->id_type_mouvement_stock = 1;
            $mouvement->date_mouvement = $livraison->date_livraison;
            $mouvement->save();

            $postDataKeys = array_keys($postData);
            for ($i = 0; $i < count($postDataKeys); $i++) {
                if (strstr($postDataKeys[$i], "id_article-") !== false) {
                    if ($postData[$postDataKeys[$i + 1]] != 0) {
                        $am = new ArticleMouvement();
                        $am->id_article = $postData[$postDataKeys[$i]];
                        $am->id_mouvement = $mouvement->id_mouvement_stock;
                        $am->quantite_mouvement = $postData[$postDataKeys[$i + 1]];
                        $am->prix = $postData[$postDataKeys[$i + 2]];
                        $am->date_peremption = $postData[$postDataKeys[$i + 3]];
                        $am->date_fabrication = $postData[$postDataKeys[$i + 4]];
                        $am->save();

                        $article = Article::find($am->id_article);
                        $article->quantite_stock += $am->quantite_mouvement;
                        $article->save();
                    }
                }
            }

            $commande = Commande::find($postData["id_commande"]);
            $commande->livre = true;
            $commande->save();

            return redirect("/stock/livraison/list")->with(["message" => "Votre livraison a été enregistrée !"]);
        }
        return back()->with(["error" => "Une erreur inattendue est survenue, veuillez réessayer !"]);
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
        if (count($deliveredArr) > 0) {
            for ($i = 0; $i < count($deliveredArr); $i++) {
                for ($j = 0; $j < count($articlesArr); $j++) {
                    if ($deliveredArr[$i]->id_article == $articlesArr[$j]->id_article) {
                        $flag = intval($articlesArr[$j]->quantite_stock - $deliveredArr[$i]->quantite_mouvement);
                        if ($flag >= 1) {
                            return false;
                        }
                    }
                }
            }
            return true;
        }
        return false;
    }
}
