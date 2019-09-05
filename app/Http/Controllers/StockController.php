<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\FamilleArticle;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Spipu\Html2Pdf\HTML2PDF;

class StockController extends Controller
{
    public function list(String $page_num = null)
    {
        $familles = FamilleArticle::orderBy('description_famille', 'asc')->get();

        if ( isset($_GET['id_famille']) || isset($_GET['quantite_min']) || isset($_GET['consommable']) || isset($_GET['date_deb'])) {
            $sql = "SELECT * FROM article LEFT JOIN famillearticle ON famillearticle.id_famille = article.id_famille WHERE article.supprime = false";

            if ($_GET['id_famille'] != "*") {
                $sql .= " AND article.id_famille = " . $_GET['id_famille'];
            }

            if ($_GET['consommable'] != "*") {

                if ($_GET['consommable'] != "0")
                    $sql .= " AND article.consommable = true";
                else
                    $sql .= " AND article.consommable = false";
            }

            if ($_GET['quantite_min'] != null ) {

                if ($_GET['quantite_max'] == null )
                    $sql .= " AND article.quantite_stock = " . $_GET['quantite_min'];
                else
                    $sql .= " AND article.quantite_stock BETWEEN " . $_GET['quantite_min'] . " AND " . $_GET['quantite_max'];
            }

            if ($_GET['date_deb'] != null ) {

                if ($_GET['date_fin'] == null )
                    $sql .= " AND date_format(article.created_at, '%d %m %Y') = date_format('" . $_GET['date_deb'] . "', '%d %m %Y')";
                else
                    $sql .= " AND date_format(article.created_at, '%d %m %Y') BETWEEN date_format('" . $_GET['date_deb'] . "', '%d %m %Y') AND date_format('" . $_GET['date_fin'] . "', '%d %m %Y')";
            }

            $data = DB::select($sql);

        } else {
            $data = DB::table("Article")
                ->select('*')
                ->leftJoin("FamilleArticle", "FamilleArticle.id_famille", "=", "Article.id_famille")
                ->where('article.supprime', false)
                ->get();
        }
        return view('stock.stock.list')->with([
            'stocks' => $data,
            'familles' => $familles
        ]);
    }

    public function print_list()
    {
        if ( isset($_GET['id_famille']) || isset($_GET['quantite_min']) || isset($_GET['consommable']) || isset($_GET['date_deb'])) {
            $sql = "SELECT *, article.quantite_stock as qt FROM article";
            $sql .= " LEFT JOIN famillearticle ON famillearticle.id_famille = article.id_famille WHERE article.supprime = false";

            if ($_GET['id_famille'] != "*") {
                $sql .= " AND article.id_famille = " . $_GET['id_famille'];
            }

            if ($_GET['consommable'] != "*") {

                if ($_GET['consommable'] != "0")
                    $sql .= " AND article.consommable = true";
                else
                    $sql .= " AND article.consommable = false";
            }

            if ($_GET['quantite_min'] != null ) {

                if ($_GET['quantite_max'] == null )
                    $sql .= " AND article.quantite_stock = " . $_GET['quantite_min'];
                else
                    $sql .= " AND article.quantite_stock BETWEEN " . $_GET['quantite_min'] . " AND " . $_GET['quantite_max'];
            }

            if ($_GET['date_deb'] != null ) {

                if ($_GET['date_fin'] == null )
                    $sql .= " AND date_format(article.created_at, '%d %m %Y') = date_format('" . $_GET['date_deb'] . "', '%d %m %Y')";
                else
                    $sql .= " AND date_format(article.created_at, '%d %m %Y') BETWEEN date_format('" . $_GET['date_deb'] . "', '%d %m %Y') AND date_format('" . $_GET['date_fin'] . "', '%d %m %Y')";
            }
            // dd($sql);

            $stocks = DB::select($sql);

        } else {
            $stocks = DB::table("Article")
                ->select('*', 'article.quantite_stock as qt')
                ->leftJoin("FamilleArticle", "FamilleArticle.id_famille", "=", "Article.id_famille")
                ->where('article.supprime', false)
                ->get();
        }

        try
        {
            $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 3);
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML(
                view("stock/stock/print_list")->with('stocks', $stocks)
            );
            $html2pdf->output('Etat du stock.pdf') ;
            return back()->with(["message"=>"Impression faite"]) ;
        }
        catch (Html2PdfException $e)
        {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            return redirect('stock.stock.list')->with(["error"=>$formatter->getHtmlMessage()]) ;
        }
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

        return view("stock.accueil", ["alert" => $alert, "crit" => $crit, "rupt" => $rupt, "emis" => $emis, "nbr" => $nbr]);
    }
}
