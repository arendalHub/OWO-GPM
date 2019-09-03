<?php

namespace App\Http\Controllers;

use App\Models\FamilleArticle;
use App\Models\Article;
use App\Models\Emplacement;
use App\Models\Box;
use App\Models\Etagere;
use App\Models\Rangee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spipu\Html2Pdf\HTML2PDF;
use App\Http\Controllers\Stock\EmplacementController;

/**
 * Ce controller est responsable de toute les actions sur les articles.
 * @author fatigba72@gmail.com
 */
class ArticleController extends Controller
{
    public function list(string $num_page = '1')
    {
        $familles = FamilleArticle::orderBy('description_famille', 'asc')->get();

        if ( isset($_GET['id_famille']) || isset($_GET['retire']) || isset($_GET['consommable']) || isset($_GET['date_deb'])) {
            $sql = "SELECT * FROM article";
            $sql .= " LEFT JOIN famillearticle ON famillearticle.id_famille = article.id_famille LEFT JOIN emplacement ON emplacement.id_article = article.id_article LEFT JOIN etagere ON etagere.id_etagere = emplacement.id_etagere LEFT JOIN rangee ON rangee.id_rangee = emplacement.id_rangee LEFT JOIN box ON box.id_box = emplacement.id_box";
            $w = 0;
            if ($_GET['id_famille'] != "*") {
                $sql .= " WHERE article.id_famille = " . $_GET['id_famille'];
                $w = 1;
            }

            if (isset($_GET['retire']) && $_GET['retire'] == "on") {
                if($w == 0) {
                    $sql .= " WHERE";
                    $w = 1;
                }
                else
                    $sql .= " AND";

                $sql .= " article.supprime = true";
            }

            if (isset($_GET['consommable']) && $_GET['consommable'] == "on") {
                if($w == 0) {
                    $sql .= " WHERE";
                    $w = 1;
                }
                else
                    $sql .= " AND";

                $sql .= " article.consommable = true";
            }

            if ($_GET['date_deb'] != null ) {
                if($w == 0) {
                    $sql .= " WHERE";
                    $w = 1;
                }
                else
                    $sql .= " AND";

                if ($_GET['date_fin'] == null )
                    $sql .= " date_format(article.created_at, '%d %m %Y') = date_format('" . $_GET['date_deb'] . "', '%d %m %Y')";
                else
                    $sql .= " date_format(article.created_at, '%d %m %Y') BETWEEN date_format('" . $_GET['date_deb'] . "', '%d %m %Y') AND date_format('" . $_GET['date_fin'] . "', '%d %m %Y')";
            }
            // dd($sql);

            $items = DB::select($sql);

            $s = 1;

        } else {
            $items = Article::orderBy('Article.id_article', 'desc')
                ->leftJoin("FamilleArticle", "FamilleArticle.id_famille", "=", "Article.id_famille")
                ->leftJoin("Emplacement", "Emplacement.id_article", "=", "Article.id_article")
                ->leftJoin("Etagere", "Etagere.id_etagere", "=", "Emplacement.id_etagere")
                ->leftJoin("Rangee", "Rangee.id_rangee", "=", "Emplacement.id_rangee")
                ->leftJoin("Box", "Box.id_box", "=", "Emplacement.id_box")
                ->paginate();

                $s = 0;
        }
        return view('stock.article.list')->with([
            'items' => $items,
            'familles' => $familles,
            'sql' => $s
        ]);
    }

    /**
     * Cette fonction affiche les informations détaillées d'un article.
     * @param string $item_id L'identifiant de l'article.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details(string $item_id)
    {
        $item = Article::where("id_article", $item_id)
            ->leftJoin("FamilleArticle", "FamilleArticle.id_famille", "=", "Article.id_famille")
            ->get()[0];

        $emplacement = Emplacement::where('id_article', $item_id)
            ->leftJoin("Etagere", "Etagere.id_etagere", "=", "Emplacement.id_etagere")
            ->leftJoin("Rangee", "Rangee.id_rangee", "=", "Emplacement.id_rangee")
            ->leftJoin("Box", "Box.id_box", "=", "Emplacement.id_box")
            ->first();

        return view("stock.article.details", ["article" => $item, "emplacement" => $emplacement]);
    }

    public function softDelete(string $item_id)
    {
        $article = Article::find($item_id);
        $article->supprime = true;
        if ($article->save()) {

            DB::table("Emplacement")
                ->where('id_article', $item_id)
                ->update(['supprime' => true]);

            return redirect('/stock/article/list')->with("message", "L'article {$article->designation_article} a été supprimé !");
        }
        return back()->with("error", "Ooops, une erreur est survenue ! veuillez reprendre");
    }

    /**
     * Cette fonction affiche le formulaire de modification/ajout d'un article.
     */
    public function create_update(string $item_id = null)
    {
        $familles = FamilleArticle::orderBy('description_famille', 'asc')->get();
        $boxes = Box::all();
        $etageres = Etagere::all();
        $rangees = Rangee::all();
        if ($item_id != null) {
            // $item = Article::find($item_id);
            $item = DB::table("Article")
                ->select("*")
                ->leftJoin("Emplacement", "Emplacement.id_article", "=", "Article.id_article")
                ->leftJoin("Etagere", "Etagere.id_etagere", "=", "Emplacement.id_etagere")
                ->leftJoin("Rangee", "Rangee.id_rangee", "=", "Emplacement.id_rangee")
                ->leftJoin("Box", "Box.id_box", "=", "Emplacement.id_box")
                ->where('Article.id_article', $item_id)
                ->first();

            return view('stock.article.create_update')->with(
                [
                    'item' => $item,
                    'update' => true,
                    'familles' => $familles,
                    'boxes' => $boxes,
                    'etageres' => $etageres,
                    'rangees' => $rangees
                ]
            );
        }
        return view('stock.article.create_update')->with([
            'item' => null, 'update' => false,
            'familles' => $familles,
            'boxes' => $boxes,
            'etageres' => $etageres,
            'rangees' => $rangees
        ]);
    }

    /**
     * Cette fonction traite le formulaire d'ajout et de modification d'un produit.
     * Elle redirige vers la page de la liste en cas de succès ou sur la page
     * du formulaire en cas d'échec.
     * @todo ; test+data validation
     */
    public function do_create_update(Request $req)
    {
        $postData = $req->post();
        // dd($postData);
        $item = null;
        $creat_update_message = '';

        $nbr = DB::table("Article")
            ->select(DB::raw("count(*) as nb"))
            ->first();

        $nbr->nb += 1;

        if (array_key_exists('update', $postData) && $postData['update'] != false) {
            $item = Article::find($postData['id_article']);
            $emplacement = Emplacement::find($postData['id_emplacement']);
            $creat_update_message = "L'article {$item->designation_article} a été mis à jour !";
        } else {
            $item = new Article;
            $emplacement = new Emplacement;
            $item->code_article = strtoupper(substr($postData['designation_article'], 0, 3)) . "-" . $nbr->nb;
            $item->designation_article = $postData['designation_article'];
            $creat_update_message = "L'article {$postData['designation_article']} a été enregistré !";
        }

        $item->consommable = array_key_exists('consommable', $postData) ? true : false;
        $item->id_famille = $postData['id_famille'];
        $item->prix_achat = $postData['prix_achat'];
        $item->prix_vente = $postData['prix_vente'];
        $item->seuil_alert = $postData['seuil_alert'];
        $item->seuil_critique = $postData['seuil_critique'];

        if ($item->save()) {
            $emplacement->id_article = DB::table('article')->max('id_article');
            $emplacement->id_etagere = $postData['id_etagere'];
            $emplacement->id_rangee = $postData['id_rangee'];
            $emplacement->id_box = $postData['id_box'];
            $emplacement->save();

            return redirect('/stock/article/list')->with(['message' => $creat_update_message]);
        }
        return back()->withInput($postData)->with(['error' => 'Veuillez reprendre, une erreur inconnue s\'est produite !']);
    }

    public function print_list()
    {
        $items = Article::orderBy('Article.id_article', 'desc')
            ->leftJoin("FamilleArticle", "FamilleArticle.id_famille", "=", "Article.id_famille")
            ->leftJoin("Emplacement", "Emplacement.id_article", "=", "Article.id_article")
            ->leftJoin("Etagere", "Etagere.id_etagere", "=", "Emplacement.id_etagere")
            ->leftJoin("Rangee", "Rangee.id_rangee", "=", "Emplacement.id_rangee")
            ->leftJoin("Box", "Box.id_box", "=", "Emplacement.id_box")
            ->paginate();

        try {
            $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 3);
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML(
                view("stock/article/print_list")->with('items', $items)
            );
            $html2pdf->output('Liste des articles.pdf');
            return back()->with(["message" => "Impression faite"]);
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            return redirect('stock.article.list')->with(["error" => $formatter->getHtmlMessage()]);
        }
    }

    public function print_details($id_art)
    {
        $article = Article::where("id_article", $id_art)
            ->leftJoin("FamilleArticle", "FamilleArticle.id_famille", "=", "Article.id_famille")
            ->get()[0];

        $emplacement = Emplacement::where('id_article', $id_art)
            ->leftJoin("Etagere", "Etagere.id_etagere", "=", "Emplacement.id_etagere")
            ->leftJoin("Rangee", "Rangee.id_rangee", "=", "Emplacement.id_rangee")
            ->leftJoin("Box", "Box.id_box", "=", "Emplacement.id_box")
            ->first();

        try {
            $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 3);
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML(
                view("stock/article/print_details")->with(["article" => $article, "emplacement" => $emplacement])
            );
            $html2pdf->output('Détails de l\'article ' . $article->designation_article . '.pdf');
            return back()->with(["message" => "Impression faite"]);
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            return redirect('stock/article/details/' . $article->id_article)->with(["error" => $formatter->getHtmlMessage()]);
        }
    }
}
