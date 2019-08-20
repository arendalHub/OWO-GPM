<?php

namespace App\Http\Controllers\Stock;

use App\Models\Article;
use App\Models\ArticleMouvement;
use App\Models\Emplacement;
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
        $rebus = DB::table("articlemouvement")
            ->leftJoin("article", "article.id_article", "=", "articlemouvement.id_article")
            ->leftJoin("mouvementstock", "articlemouvement.id_mouvement", "=", "mouvementstock.id_mouvement_stock")
            ->where("id_type_mouvement_stock", "=", 3)->paginate();

        foreach ($rebus->items() as $rebu) {
            $rebu->emplacement_stock = Emplacement::where('id_article', $rebu->id_article)
                ->leftJoin("etagere", "etagere.id_etagere", "=", "emplacement.id_etagere")
                ->leftJoin("rangee", "rangee.id_rangee", "=", "emplacement.id_rangee")
                ->leftJoin("box", "box.id_box", "=", "emplacement.id_box")
                ->first();
        }
        return view('stock.rebus.list', ["rebus" => $rebus]);
    }

    /**
     * Cette fonction affiche le formulaire de mise en rebus d'un article.
     * Une vérification de disponibilité du stock est faite avant d'afficher les produits.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create_update()
    {
        // Les articles
        $articles = DB::table("Article")
            ->select(DB::raw('*'))
            ->where('supprime', false)
            ->where('quantite_stock', '>', 0)
            ->paginate();

        // $articlesPourMiseEnRebus = [];
        // if (count($articles) > 0) {
        //     for ($i = 0; $i < count($articles); $i++) {
        //         $deliveredQuantity = DB::table("articlemouvement")
        //             ->leftJoin("article", "article.id_article", "=", "articlemouvement.id_article")
        //             ->groupBy("articlemouvement.id_article")
        //             ->where("articlemouvement.id_article", "=", $articles[$i]->id_article)
        //             ->sum("quantite_mouvement");
        //         $destroyedQuantity = DB::table("articlemouvement")
        //             ->groupBy("articlemouvement.id_article")
        //             ->leftJoin('mouvementstock', 'mouvementstock.id_mouvement_stock', '=', 'articlemouvement.id_mouvement')
        //             ->where("articlemouvement.id_article", "=", $articles[$i]->id_article)
        //             ->where("mouvementstock.id_type_mouvement_stock", "=", 3)
        //             ->sum("articlemouvement.id_article");
        //         if (($deliveredQuantity - $destroyedQuantity) >= 1) {
        //             array_push($articlesPourMiseEnRebus, ["article_item" => $articles[$i], "article_quantity" => ($deliveredQuantity - $destroyedQuantity)]);
        //         }
        //     }
        // }

        return view("stock.rebus.create_update", ["articles" => $articles]);
    }

    /**
     * Cette fonction traite le formulaire de mise en rebus d'un article.
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function do_create_update(Request $req)
    {
        // $postData = $req->post();

        // if (count($postData) < 0) {
        //     return back()->with("error", "Veuillez reéssayer !");
        // }

        // $mouvementStock = new MouvementStock();
        // $am = new ArticleMouvement();
        // $am->id_article = explode(";", $postData["id_article"])[0];
        // $am->quantite_mouvement = $postData["quantite_mouvement"];
        // $mouvementStock->id_type_mouvement_stock = 3;
        // $mouvementStock->date_mouvement = date("d-m-Y H:i:s");
        // $mouvementStock->motif_mouvement = $postData["motif_mouvement"];

        // if ($mouvementStock->save()) {
        //     $am->id_mouvement = $mouvementStock->id_mouvement_stock;
        //     $am->save();

        //     $article = Article::find($am->id_article);
        //     $article->quantite_stock = $article->quantite_stock - $am->quantite_mouvement;
        //     $article->save();

        //     return redirect("/stock/rebus/list")->with("message", "{$postData["quantite_mouvement"]} articles ont(a) été mis en rebus");
        // }
        return back()->withInput()->with("error", "OK");
    }
}
