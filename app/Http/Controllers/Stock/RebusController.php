<?php

namespace App\Http\Controllers\Stock;

use App\Models\Article;
use App\Models\MouvementStock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/**
 * Ce controller est responsable de toute les actions sur la mise en rebus des articles.
 * @author fatigba72@gmail.com
 */
class RebusController extends Controller
{
    public function list(string $page_num = null)
    {
        $rebus = DB::table("MouvementStock")
            ->leftJoin("Article", "Article.id_article", "=", "MouvementStock.id_article")
            ->where("id_type_mouvement_stock", "=", 2)->paginate() ;
        return view('stock.rebus.list', ["rebus"=>$rebus]);
    }

    /**
     * Cette fonction affiche le formulaire de mise en rebus d'un article.
     * Une vérification de disponibilité du stock est faite avant d'afficher les produits.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create_update()
    {
        // Les articles
        $articles = Article::where("supprime", "=", false)->get() ;
        $articlesPourMiseEnRebus = [] ;
        if(count($articles) > 0)
        {
            for($i = 0; $i<count($articles); $i++)
            {
                $deliveredQuantity = DB::table("ArticleLivraison")
                    ->leftJoin("Article", "Article.id_article","=", "ArticleLivraison.id_article")
                    ->groupBy("ArticleLivraison.id_article")
                    ->where("ArticleLivraison.id_article", "=", $articles[$i]->id_article)
                    ->sum("quantite") ;
                $destroyedQuantity = DB::table("MouvementStock")
                    ->groupBy("MouvementStock.id_article")
                    ->where("MouvementStock.id_article", "=", $articles[$i]->id_article)
                    ->where("MouvementStock.id_type_mouvement_stock", "=", 2)
                    ->sum("quantite_mouvement") ;
                if(($deliveredQuantity - $destroyedQuantity) >= 1)
                {
                    array_push($articlesPourMiseEnRebus, ["article_item"=>$articles[$i], "article_quantity"=>($deliveredQuantity - $destroyedQuantity)]) ;
                }
            }
        }

        return view("stock.rebus.create_update", ["articles"=>$articlesPourMiseEnRebus]) ;
    }

    /**
     * Cette fonction traite le formulaire de mise en rebus d'un article.
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function do_create_update(Request $req)
    {
        $postData = $req->post() ;

        if(count($postData) < 0)
        {
            return back()->with("error", "Veuillez reéssayer !") ;
        }

        $mouvementStock = new MouvementStock() ;
        $mouvementStock->id_type_mouvement_stock = 2 ;
        $mouvementStock->id_article	= explode(";", $postData["id_article"])[0];
        $mouvementStock->quantite_mouvement = $postData["quantite_mouvement"]	;
        $mouvementStock->date_mouvement = date("d-m-Y H:i:s") ;

        if($mouvementStock->save())
        {
            return redirect("/stock/rebus/list")->with("message", "{$postData["quantite_mouvement"]} articles ont(a) été mis en rebus") ;
        }
        return back()->withInput()->with("error", "Oops une erreur s'est produite") ;
    }
}
