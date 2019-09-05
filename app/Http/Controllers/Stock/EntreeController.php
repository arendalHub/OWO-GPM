<?php

namespace App\Http\Controllers\Stock;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\ArticleMouvement;
use App\Models\EntreeFacture;
use App\Models\Fournisseur;
use App\Models\MouvementStock;
use Spipu\Html2Pdf\HTML2PDF;

class EntreeController extends Controller
{
    public function list()
    {
        $fournisseurs = Fournisseur::orderBy('designation_fournisseur', 'asc')->get();

        if ( isset($_GET['id_fournisseur']) || isset($_GET['date_deb'])) {
            $sql = "SELECT * FROM mouvementstock LEFT JOIN fournisseur ON fournisseur.id_fournisseur = mouvementstock.id_fournisseur WHERE id_type_mouvement_stock = 1 AND id_livraison = null";

            if ($_GET['id_fournisseur'] != "*") {
                $sql .= " AND mouvementstock.id_fournisseur = " . $_GET['id_fournisseur'];
            }

            if ($_GET['date_deb'] != null ) {

                if ($_GET['date_fin'] == null )
                    $sql .= " AND date_format(mouvementstock.date_mouvement, '%d %m %Y') = date_format('" . $_GET['date_deb'] . "', '%d %m %Y')";
                else
                    $sql .= " AND date_format(mouvementstock.date_mouvement, '%d %m %Y') BETWEEN date_format('" . $_GET['date_deb'] . "', '%d %m %Y') AND date_format('" . $_GET['date_fin'] . "', '%d %m %Y')";
            }

            $entrees = DB::select($sql);

        } else {
            $entrees = MouvementStock::join('Fournisseur', 'MouvementStock.id_fournisseur', '=', 'Fournisseur.id_fournisseur')
                ->select('MouvementStock.*', 'Fournisseur.designation_fournisseur')
                ->where([
                    ['id_type_mouvement_stock', 1],
                    ['id_livraison', null]
                ])
                ->orderBy("id_mouvement_stock", "desc")
                ->get();
        }

        return view("stock/entreesimple/list", [
            "entrees" => $entrees,
            "fournisseurs" => $fournisseurs
            ]);
    }

    public function details(string $id_mouvement_stock)
    {
        $mouvement = MouvementStock::find($id_mouvement_stock);
        $fournisseur = Fournisseur::where('id_fournisseur', '=', $mouvement->id_fournisseur)->first();
        $entreefacture = EntreeFacture::where('id_mouvement', '=', $id_mouvement_stock)->first();
        $articles = DB::table("Article")
            ->select(["Article.id_article as id", "Article.designation_article as design", 'ArticleMouvement.quantite_mouvement as qtt', 'Article.prix_achat as prix'])
            ->leftJoin('ArticleMouvement', 'ArticleMouvement.id_article', '=', 'Article.id_article')
            ->where('ArticleMouvement.id_mouvement', '=', $mouvement->id_mouvement_stock)
            ->get();

        return view('/stock/entreesimple/details')->with(
            [
                "mouvement" => $mouvement,
                "fournisseur" => $fournisseur,
                "entreefacture" => $entreefacture,
                "articles" => $articles
            ]
        );
    }

    public function create_update(string $id_commande = null)
    {
        $fournisseurs = Fournisseur::all();
        return view('stock.entreesimple.create_update')->with(['update' => false, 'fournisseurs' => $fournisseurs]);
    }

    public function do_create_update(Request $req)
    {
        $postData = $req->all();


        $mvt = new MouvementStock();
        $mvt->id_type_mouvement_stock = 1;
        $mvt->id_fournisseur = $postData['id_fournisseur'];
        $mvt->date_mouvement = date("Y-m-d H:i:s");
        $mvt->save();

        $postDataKeys = array_keys($postData);
        for ($i = 0; $i < count($postDataKeys) - 1; $i++) {
            if (strstr($postDataKeys[$i], "id_article-item-row") !== false) {
                if (strstr($postDataKeys[$i + 1], "quantite-item-row") !== false) {
                    $id_article = $postData[$postDataKeys[$i]];
                    $quantite = $postData[$postDataKeys[$i + 1]];

                    $nbr = DB::table("MouvementStock")
                        ->select(DB::raw("count(*) as nb"))
                        ->first();

                    $ent = new EntreeFacture();
                    $ent->id_mouvement = $nbr->nb;
                    $ent->num_bord_fact = $postData['num_b_f'];
                    $ent->save();

                    $artMvt = new ArticleMouvement();
                    $artMvt->id_mouvement = $nbr->nb;
                    $artMvt->id_article = $id_article;
                    $artMvt->quantite_mouvement = $quantite;
                    $artMvt->save();

                    $art = DB::table("Article")
                        ->select(['quantite_stock as nb'])
                        ->where('id_article', '=', $id_article)
                        ->first();

                    $quantite += $art->nb;

                    DB::table("Article")
                        ->where('id_article', $id_article)
                        ->update(['quantite_stock' => $quantite]);
                }
            }
        }

        return redirect('/stock/entree/list')->with("message", "La nouvelle entrée a été bien engistrée !");
    }

    public function print_list()
    {
        if ( isset($_GET['id_fournisseur']) || isset($_GET['date_deb'])) {
            $sql = "SELECT * FROM mouvementstock LEFT JOIN fournisseur ON fournisseur.id_fournisseur = mouvementstock.id_fournisseur WHERE id_type_mouvement_stock = 1 AND id_livraison = null";

            if ($_GET['id_fournisseur'] != "*") {
                $sql .= " AND mouvementstock.id_fournisseur = " . $_GET['id_fournisseur'];
            }

            if ($_GET['date_deb'] != null ) {

                if ($_GET['date_fin'] == null )
                    $sql .= " AND date_format(mouvementstock.date_mouvement, '%d %m %Y') = date_format('" . $_GET['date_deb'] . "', '%d %m %Y')";
                else
                    $sql .= " AND date_format(mouvementstock.date_mouvement, '%d %m %Y') BETWEEN date_format('" . $_GET['date_deb'] . "', '%d %m %Y') AND date_format('" . $_GET['date_fin'] . "', '%d %m %Y')";
            }

            $entrees = DB::select($sql);

        } else {
            $entrees = MouvementStock::join('Fournisseur', 'MouvementStock.id_fournisseur', '=', 'Fournisseur.id_fournisseur')
                ->select('MouvementStock.*', 'Fournisseur.designation_fournisseur')
                ->where([
                    ['id_type_mouvement_stock', 1],
                    ['id_livraison', null]
                ])
                ->orderBy("id_mouvement_stock", "desc")
                ->get();
        }

        try
        {
            $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 3);
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML(
                view("stock/entreesimple/print_list")->with(["entrees" => $entrees])
            );
            $html2pdf->output('Liste des entrées directs en stock.pdf') ;
            return back()->with(["message"=>"Impression faite"]) ;
        }
        catch (Html2PdfException $e)
        {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            return redirect('stock/entreesimple/list')->with(["error"=>$formatter->getHtmlMessage()]) ;
        }
    }

    public function print_details($id_ent)
    {
        $mouvement = MouvementStock::find($id_ent);
        $fournisseur = Fournisseur::where('id_fournisseur', '=', $mouvement->id_fournisseur)->first();
        $entreefacture = EntreeFacture::where('id_mouvement', '=', $id_ent)->first();
        $articles = DB::table("Article")
            ->select(["Article.id_article as id", "Article.designation_article as design", 'ArticleMouvement.quantite_mouvement as qtt', 'Article.prix_achat as prix'])
            ->leftJoin('ArticleMouvement', 'ArticleMouvement.id_article', '=', 'Article.id_article')
            ->where('ArticleMouvement.id_mouvement', '=', $mouvement->id_mouvement_stock)
            ->get();

        try
        {
            $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 3);
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML(
                view("stock/entreesimple/print_details")->with(["mouvement" => $mouvement, "fournisseur" => $fournisseur, "entreefacture" => $entreefacture, "articles" => $articles])
            );
            $html2pdf->output('Détails de l\'entrée direct en stock Ent-'.$mouvement->id_mouvement_stock.'.pdf') ;
            return back()->with(["message"=>"Impression faite"]) ;
        }
        catch (Html2PdfException $e)
        {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            return redirect('stock/entreesimple/details/'.$mouvement->id_mouvement_stock)->with(["error"=>$formatter->getHtmlMessage()]) ;
        }
    }
}
