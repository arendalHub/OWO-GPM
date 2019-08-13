<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function list(String $page_num = null)
    {
        $data = DB::table("Article")
            ->select(DB::raw("quantite_stock as qt, designation_article, code_article, description_famille, seuil_alert, seuil_critique"))
            ->leftJoin("FamilleArticle", "FamilleArticle.id_famille", "=", "Article.id_famille")
            ->paginate();
        return view("stock.stock.list", ["stocks" => $data]);
    }

    public function alert(string $num_page = '1')
    {
        $items = Article::orderBy('Article.id_article', 'desc')
            ->leftJoin("FamilleArticle", "FamilleArticle.id_famille", "=", "Article.id_famille")
            ->leftJoin("Emplacement", "Emplacement.id_article", "=", "Article.id_article")
            ->leftJoin("Etagere", "Etagere.id_etagere", "=", "Emplacement.id_etagere")
            ->leftJoin("Rangee", "Rangee.id_rangee", "=", "Emplacement.id_rangee")
            ->leftJoin("Box", "Box.id_box", "=", "Emplacement.id_box")
            ->where('Article.supprime', false)
            ->whereColumn("quantite_stock", "<=", "seuil_alert")
            ->whereColumn("quantite_stock", ">", "seuil_critique")
            ->paginate();
        return view('stock.alert')->with('items', $items);
    }

    public function critique(string $num_page = '1')
    {
        $items = Article::orderBy('Article.id_article', 'desc')
            ->leftJoin("FamilleArticle", "FamilleArticle.id_famille", "=", "Article.id_famille")
            ->leftJoin("Emplacement", "Emplacement.id_article", "=", "Article.id_article")
            ->leftJoin("Etagere", "Etagere.id_etagere", "=", "Emplacement.id_etagere")
            ->leftJoin("Rangee", "Rangee.id_rangee", "=", "Emplacement.id_rangee")
            ->leftJoin("Box", "Box.id_box", "=", "Emplacement.id_box")
            ->where('Article.supprime', false)
            ->whereColumn("Article.quantite_stock", "<=", "Article.seuil_critique")
            ->where("Article.quantite_stock", ">", 0)
            ->paginate();
        return view('stock.critique')->with('items', $items);
    }

    public function rupture(string $num_page = '1')
    {
        $items = Article::orderBy('Article.id_article', 'desc')
            ->leftJoin("FamilleArticle", "FamilleArticle.id_famille", "=", "Article.id_famille")
            ->leftJoin("Emplacement", "Emplacement.id_article", "=", "Article.id_article")
            ->leftJoin("Etagere", "Etagere.id_etagere", "=", "Emplacement.id_etagere")
            ->leftJoin("Rangee", "Rangee.id_rangee", "=", "Emplacement.id_rangee")
            ->leftJoin("Box", "Box.id_box", "=", "Emplacement.id_box")
            ->where('Article.supprime', false)
            ->where("quantite_stock", "=", 0)
            ->paginate();
        return view('stock.rupture')->with('items', $items);
    }

    public function accueil()
    {
        $alert = DB::table("Article")
            ->select(DB::raw("count(*) as nb"))
            ->where("supprime", false)
            ->whereColumn("quantite_stock", "<=", "seuil_alert")
            ->whereColumn("quantite_stock", ">", "seuil_critique")
            ->first();

        $crit = DB::table("Article")
            ->select(DB::raw("count(*) as nb"))
            ->where("supprime", false)
            ->whereColumn("quantite_stock", "<=", "seuil_critique")
            ->where("quantite_stock", ">", 0)
            ->first();

        $rupt = DB::table("Article")
            ->select(DB::raw("count(*) as nb"))
            ->where("supprime", false)
            ->where("quantite_stock", "=", 0)
            ->first();

        $nbr = DB::table("Article")
            ->select(DB::raw("sum(quantite_stock) as nb"))
            ->where("supprime", false)
            ->first();

        $emis = DB::table("Commande")
            ->select(DB::raw("count(*) as nb"))
            ->where("livre", "=", false)
            ->first();

        return view("stock.accueil" , ["alert"=>$alert, "crit"=>$crit, "rupt"=>$rupt, "emis"=>$emis, "nbr"=>$nbr]);
    }
}
