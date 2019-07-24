<?php

namespace App\Http\Controllers\Stock;

use App\Models\Article;
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
                    ->sum("quantite_mouvement") ;
                if(($deliveredQuantity - $destroyedQuantity) >= 1)
                {
                    array_push($articlesPourMiseEnRebus, ["article_item"=>$articles[$i], "article_quantity"=>($deliveredQuantity - $destroyedQuantity)]) ;
                }
            }
        }
//        dd($articlesPourMiseEnRebus);

        return view("stock.rebus.create_update", ["articles"=>$articlesPourMiseEnRebus]) ;
    }
}
