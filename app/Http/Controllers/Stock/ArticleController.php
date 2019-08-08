<?php

namespace App\Http\Controllers;

use App\FamilleArticle;
use App\Models\Article;
use App\Models\Magasin;
use foo\bar;
use Illuminate\Http\Request;

/**
 * Ce controller est responsable de toute les actions sur les articles.
 * @author fatigba72@gmail.com
 */
class ArticleController extends Controller
{
    public function list(string $num_page = '1')
    {
        $items = Article::orderBy('id_article', 'desc')
            ->leftJoin("FamilleArticle", "FamilleArticle.id_famille", "=", "Article.id_famille")
            ->leftJoin("Magasin", "Magasin.id_magasin", "=", "Article.id_magasin")
            ->where('Article.supprime', false)->paginate() ;
        return view('stock.article.list')->with('items', $items) ;
    }

    public function softDelete(string $item_id)
    {
        $article = Article::find($item_id) ;
        $article->supprime = true ;
        if($article->save()) {
            return redirect('/stock/article/list')->with("message", "L'article {$article->designation_article} a été supprimé !") ;
        }
        return back()->with("error", "Ooops, une erreur est survenue ! veuillez reprendre") ;
    }

    /**
     * Cette fonction affiche les informations détaillées d'un article.
     * @param string $item_id L'identifiant de l'article.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details(string $item_id)
    {
        $item = Article::where("id_article", $item_id)
            ->leftJoin("FamilleArticle", "FamilleArticle.id_famille", "=","Article.id_article")
            ->leftJoin("Magasin", "Magasin.id_magasin", "=", "Article.id_magasin")
            ->get()[0] ;

        return view("stock.article.details", ["article"=>$item]) ;
    }

    /**
     * Cette fonction affiche le formulaire de modification/ajout d'un article.
     */
    public function create_update(string $item_id = null)
    {
        $familles = FamilleArticle::orderBy('id_famille', 'asc')->get() ;
        $magasins = Magasin::orderBy('id_magasin', 'asc')->get() ;
        if($item_id != null)
        {
            $item = Article::find($item_id) ;
            return view('stock.article.create_update')->with(
                ['item'=>$item, 'update'=>true,
                    'familles'=>$familles,
                    'magasins'=>$magasins
                ]) ;
        }
        return view('stock.article.create_update')->with(['item'=>null, 'update'=>false,
            'familles'=>$familles,
            'magasins'=>$magasins
        ]) ;
    }

    /**
     * Cette fonction traite le formulaire d'ajout et de modification d'un produit.
     * Elle redirige vers la page de la liste en cas de succès ou sur la page
     * du formulaire en cas d'échec.
     * @todo ; test+data validation
     */
    public function do_create_update(Request $req)
    {
        $postData = $req->post() ;
        $item = null ;
        $creat_update_message = '' ;
        // C'est une mise a jour
        if(array_key_exists('update', $postData) && $postData['update'] != false)
        {
            $item = Article::find($postData['id_article']) ;
            $creat_update_message = "L'article {$item->designation_article} a été mis à jour !" ;
        }
        else
        {
            $item = new Article ;
            $creat_update_message = "L'article {$postData['designation_article']} a été enregistré !" ;
        }
        $item->designation_article = $postData['designation_article'] ;
        if(array_key_exists('emplacement_stock', $postData))
            $item->emplacement_stock = $postData['emplacement_stock'] ;

        $item->consommable = array_key_exists('consommable', $postData) ? true : false ;
        $item->id_famille = $postData['id_famille'] ;
        $item->id_magasin = $postData['id_magasin'] ;
        $item->prix_achat = $postData['prix_achat'] ;
        $item->prix_vente = $postData['prix_vente'] ;
        $item->stock_etagere = $postData['stock_etagere'] ;
        $item->stock_range = $postData['stock_range'] ;
        $item->stock_box = $postData['stock_box'] ;
        $item->code_article = $postData['code_article'] ;

        if($item->save()) {
            return redirect('/stock/article/list')->with(['message'=> $creat_update_message]) ;
        }
        return back()->withInput($postData)->with(['error'=>'Veuilles reprendre, une erreur inconnue s\'est produite !']) ;
    }
}