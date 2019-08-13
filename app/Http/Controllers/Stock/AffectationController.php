<?php

namespace App\Http\Controllers\Stock;

use App\Models\MouvementStock;
use App\Models\Magasin;
use App\Models\ArticleMouvement;
use App\Models\Article;
use App\Models\Commande;
use App\Models\Fournisseur;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Ce controlleur est responsable de toute les actions sur les commandes.
 * @author fatigba72@mail.com
 */
class AffectationController extends Controller
{
    public function list(string $num_page = null)
    {
        $affectations = MouvementStock::join('Magasin', 'Magasin.id_magasin', '=', 'MouvementStock.id_magasin')
            ->select('MouvementStock.*', 'Magasin.libelle_magasin')
            ->where([
                ['MouvementStock.id_magasin','!=', null]
                ])
            ->orderBy("id_mouvement_stock", "desc")->paginate();
        return view("stock/affectation/list", ["affectations" => $affectations]);
    }

    public function create_update(string $id_mouvement_stock = null)
    {
        $magasins= Magasin::where('supprime','=',false)->paginate();
        return view('stock.affectation.create_update')->with(['update' => false, 'magasins' => $magasins]);
    }

    public function details(string $id_affectation)
    {
        $mouvement_stock = MouvementStock::where('MouvementStock.id_mouvement_stock','=',$id_affectation)
                                            ->leftJoin('Magasin', 'Magasin.id_magasin','=','MouvementStock.id_magasin')
                                            ->first();

        /* dd($mouvement_stock); */
        $articles = DB::table("Article")
            ->select(["Article.id_article", "Article.designation_article", "ArticleMouvement.quantite_mouvement"])
            ->leftJoin('ArticleMouvement', 'ArticleMouvement.id_article', '=', 'Article.id_article')
            ->where('ArticleMouvement.id_mouvement', '=', $mouvement_stock->id_mouvement_stock)
            ->get();
        /* dd($articles); */
        return view('/stock/affectation/details')->with(
            [
                "mouvement_stock" => $mouvement_stock,
                "articles" => $articles,
            ]
        );
    }

    /**
     * Cette fonction traite le formulaire d'ajout de produit.
     * @todo data validation
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function do_create_update(Request $req)
    {
        $postData = $req->all();
        $mouvement_stock = new MouvementStock();
        $mouvement_stock->id_type_mouvement_stock = 2;
        $mouvement_stock->id_magasin = $postData["id_magasin"];
        $mouvement_stock->date_mouvement = date("d-m-Y H:i:s");
        if (!$mouvement_stock->save()) {
            back()->with('error', 'Une erreur est survenue, veuillez rééssayer !');
        }

        $postDataKeys = array_keys($postData);
        for ($i = 0; $i < count($postDataKeys) - 1; $i++) {
            if (strstr($postDataKeys[$i], "id_article-item-row") !== false) {
                if (strstr($postDataKeys[$i + 1], "quantite-item-row") !== false) {
                    $mvt_art = new ArticleMouvement();
                    $mvt_art->id_article = $postData[$postDataKeys[$i]];
                    $mvt_art->id_mouvement = $mouvement_stock->id_mouvement_stock;
                    $mvt_art->quantite_mouvement = $postData[$postDataKeys[$i + 1]];
                    $mvt_art->save();

                    $article = Article::find($mvt_art->id_article) ;
                    $article->quantite_stock -= $mvt_art->quantite_mouvement ;
                    $article->save() ;
                }
            }
        }

        return redirect('/stock/affectation/list')->with("message", "L'affectation a été bien engistrée !");
    }

    public function getItemsPart()
    {
        $articles = Article::all();
        return view('stock.affectation.itemspart', ['articles' => $articles, 'id' => uniqid()]);
    }
}
