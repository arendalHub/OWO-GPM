<?php

namespace App\Http\Controllers\Stock;

use App\Models\Article;
use App\Models\ArticleMouvement;
use App\Models\MouvementStock;
use Spipu\Html2Pdf\HTML2PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RebusController extends Controller
{
    public function list()
    {
        $articles = Article::orderBy('designation_article', 'asc')->where('supprime', false)->get();

        if ( isset($_GET['id_article']) || isset($_GET['quantite_min'])|| isset($_GET['date_deb'])) {
            $sql = "SELECT * FROM articlemouvement LEFT JOIN article ON article.id_article = articlemouvement.id_article LEFT JOIN mouvementstock ON mouvementstock.id_mouvement_stock = articlemouvement.id_mouvement WHERE id_type_mouvement_stock = 3";

            if ($_GET['id_article'] != "*") {
                $sql .= " AND articlemouvement.id_article = " . $_GET['id_article'];
            }

            if ($_GET['quantite_min'] != null ) {

                if ($_GET['quantite_max'] == null )
                    $sql .= " AND quantite_mouvement = " . $_GET['quantite_min'];
                else
                    $sql .= " AND quantite_mouvement BETWEEN " . $_GET['quantite_min'] . " AND " . $_GET['quantite_max'];
            }

            if ($_GET['date_deb'] != null ) {

                if ($_GET['date_fin'] == null )
                    $sql .= " AND date_format(articlemouvement.created_at, '%d %m %Y') = date_format('" . $_GET['date_deb'] . "', '%d %m %Y')";
                else
                    $sql .= " AND date_format(articlemouvement.created_at, '%d %m %Y') BETWEEN date_format('" . $_GET['date_deb'] . "', '%d %m %Y') AND date_format('" . $_GET['date_fin'] . "', '%d %m %Y')";
            }

            $rebus = DB::select($sql);

        } else {
            $rebus = DB::table("articlemouvement")
                ->leftJoin("article", "article.id_article", "=", "articlemouvement.id_article")
                ->leftJoin("mouvementstock", "mouvementstock.id_mouvement_stock", "=", "articlemouvement.id_mouvement")
                ->where("id_type_mouvement_stock", "=", 3)
                ->get();
        }

        return view('stock.rebus.list', [
            "rebus" => $rebus,
            "articles" => $articles
        ]);
    }

    public function create_update()
    {
        // Les articles
        $articles = DB::table("Article")
            ->select(DB::raw('*'))
            ->where('supprime', false)
            ->where('quantite_stock', '>', 0)
            ->get();

        return view("stock.rebus.create_update", ["articles" => $articles]);
    }

    /**
     * Cette fonction traite le formulaire de mise en rebus d'un article.
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function do_create_update(Request $req)
    {
        $postData = $req->post();

        if (count($postData) < 0) {
            return back()->with("error", "Veuillez reéssayer !");
        }

        $mouvementStock = new MouvementStock();
        $am = new ArticleMouvement();
        $am->id_article = explode(";", $postData["id_article"])[0];
        $am->quantite_mouvement = $postData["quantite_mouvement"];
        $mouvementStock->id_type_mouvement_stock = 3;
        $mouvementStock->date_mouvement = date("Y-m-d H:i:s");
        $mouvementStock->motif_mouvement = $postData["motif_mouvement"];

        if ($mouvementStock->save()) {
            $am->id_mouvement = $mouvementStock->id_mouvement_stock;
            $am->save();

            $article = Article::find($am->id_article);
            $article->quantite_stock -= $am->quantite_mouvement;
            $article->save();

            return redirect("/stock/rebus/list")->with("message", "{$postData["quantite_mouvement"]} articles ont(a) été mis en rebus");
        }

        return back()->withInput()->with("error", "OK");
    }

    public function print_list()
    {
        if ( isset($_GET['id_article']) || isset($_GET['quantite_min'])|| isset($_GET['date_deb'])) {
            $sql = "SELECT * FROM articlemouvement LEFT JOIN article ON article.id_article = articlemouvement.id_article LEFT JOIN mouvementstock ON mouvementstock.id_mouvement_stock = articlemouvement.id_mouvement WHERE id_type_mouvement_stock = 3";

            if ($_GET['id_article'] != "*") {
                $sql .= " AND articlemouvement.id_article = " . $_GET['id_article'];
            }

            if ($_GET['quantite_min'] != null ) {

                if ($_GET['quantite_max'] == null )
                    $sql .= " AND quantite_mouvement = " . $_GET['quantite_min'];
                else
                    $sql .= " AND quantite_mouvement BETWEEN " . $_GET['quantite_min'] . " AND " . $_GET['quantite_max'];
            }

            if ($_GET['date_deb'] != null ) {

                if ($_GET['date_fin'] == null )
                    $sql .= " AND date_format(articlemouvement.created_at, '%d %m %Y') = date_format('" . $_GET['date_deb'] . "', '%d %m %Y')";
                else
                    $sql .= " AND date_format(articlemouvement.created_at, '%d %m %Y') BETWEEN date_format('" . $_GET['date_deb'] . "', '%d %m %Y') AND date_format('" . $_GET['date_fin'] . "', '%d %m %Y')";
            }

            $rebus = DB::select($sql);

        } else {
            $rebus = DB::table("articlemouvement")
                ->leftJoin("article", "article.id_article", "=", "articlemouvement.id_article")
                ->leftJoin("mouvementstock", "mouvementstock.id_mouvement_stock", "=", "articlemouvement.id_mouvement")
                ->where("id_type_mouvement_stock", "=", 3)
                ->get();
        }

        try {
            $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 3);
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML(
                view("stock/rebus/print_list")->with('rebus', $rebus)
            );
            $html2pdf->output('Liste des mises au rebus.pdf');
            return back()->with(["message" => "Impression faite"]);
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            return redirect('stock.rebus.list')->with(["error" => $formatter->getHtmlMessage()]);
        }
    }
}
