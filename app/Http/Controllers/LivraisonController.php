<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Livraison;
use Illuminate\Support\Facades\DB;

class LivraisonController extends Controller
{
    public function list(string $num_page= null)
    {
        $livraisons = Livraison::orderBy('id_livraison', 'desc')->paginate() ;
        return view("stock/livraison/list")->with(['livraisons'=>$livraisons]) ;
    }

    public function create_update()
    {
        $commandes = Commande::all() ;
        return view('stock.livraison.create_update', ['commandes'=>$commandes]) ;
    }

    public function getItemsPart(string $id_commande)
    {
        $articles = DB::table('Article')
            ->leftJoin('ArticleCommande', 'ArticleCommande.id_article', '=', 'Article.id_article')
            ->where('ArticleCommande.id_commande', '=', intval($id_commande))
            ->get(['Article.id_article', 'designation_article', 'quantite']);
        return view('stock.livraison.itemspart', ['articles'=>$articles, 'id'=>uniqid()]) ;
    }
}