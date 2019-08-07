<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller ;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
	public function list(String $page_num = null)
	{
		$data = DB::table("ArticleLivraison")
            ->select(DB::raw("SUM(quantite) as qt, designation_article, code_article, description_famille, seuil_alert, seuil_critique"))
            ->leftJoin("Article", "Article.id_article","=", "ArticleLivraison.id_article")
            ->leftJoin("FamilleArticle", "FamilleArticle.id_famille","=", "Article.id_famille")
            ->groupBy("ArticleLivraison.id_article", "designation_article")
            ->paginate();
		return view("stock.stock.list", ["stocks"=>$data]) ;
	}
}