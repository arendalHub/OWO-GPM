<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use App\Models\ArticleCommande;
use App\Models\Article;
use App\Models\Commande;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Ce controlleur est responsable de toute les actions sur les commandes.
 * @author fatigba72@mail.com
 */
class CommandeController extends Controller
{
    public function list(string $num_page = null)
    {
        $commandes = Commande::join('Fournisseur', 'Commande.id_fournisseur', '=', 'Fournisseur.id_fournisseur')
            ->select('Commande.*', 'Fournisseur.designation_fournisseur')
            ->where('Commande.supprime', false)
            ->orderBy("id_commande", "desc")->paginate();
        return view("stock/commande/list", ["commandes" => $commandes]);
    }

    public function create_update(string $id_commande = null)
    {
        $fournisseurs = Fournisseur::all();
        return view('stock.commande.create_update')->with(['update' => false, 'fournisseurs' => $fournisseurs]);
    }

    public function delete(string $id_commande)
    {
        $commande = Commande::find($id_commande);
        $nLivraison = DB::table('Livraison')->where('id_commande', $id_commande)->count();
        $message = "";
        if ($nLivraison > 0) {
            $commande->livre = true;
            $message = "Votre commande ne recevra plus de livraison !";
        } else {
            $commande->supprime = true;
            $message = "Votre commande a été annulée !";
        }

        if ($commande->save())
            return back()->with("message", $message);

        return back()->with("error", "Une erreur s'est produite, veuillez recommencer !");
    }

    public function details(string $id_commande)
    {
        $commande = Commande::find($id_commande);
        $fournisseur = Fournisseur::where('id_fournisseur', '=', $commande->id_fournisseur)->get()[0];
        $articles = DB::table("Article")
            ->select(["Article.id_article as id", "Article.designation_article as design", 'ArticleCommande.quantite_commande as qtt', 'Article.prix_achat as prix'])
            ->leftJoin('ArticleCommande', 'ArticleCommande.id_article', '=', 'Article.id_article')
            ->where('ArticleCommande.id_commande', '=', $commande->id_commande)
            ->get();

        $livraisons = Livraison::where('id_commande', '=', $commande->id_commande)->get(['date_livraison', 'id_livraison']);

        return view('/stock/commande/details')->with(
            [
                "commande" => $commande,
                "fournisseur" => $fournisseur,
                "articles" => $articles,
                "livraisons" => $livraisons
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
        $commande = new Commande();
        $commande->id_fournisseur = $postData["id_fournisseur"];
        $commande->date_commande = date("d-m-Y H:i:s");
        if (!$commande->save()) {
            back()->with('error', 'Une erreur est survenue, veuillez rééssayer !');
        }

        $postDataKeys = array_keys($postData);
        for ($i = 0; $i < count($postDataKeys) - 1; $i++) {
            if (strstr($postDataKeys[$i], "id_article-item-row") !== false) {
                if (strstr($postDataKeys[$i + 1], "quantite-item-row") !== false) {
                    $cmd = new ArticleCommande();
                    $cmd->id_article = $postData[$postDataKeys[$i]];
                    $cmd->id_commande = $commande->id_commande;
                    $cmd->quantite_commande = $postData[$postDataKeys[$i + 1]];
                    $cmd->save();
                }
            }
        }

        return redirect('/stock/commande/list')->with("message", "La commande a été bien engistrée !");
    }

    public function getItemsPart()
    {
        $articles = Article::all();
        return view('stock.commande.itemspart', ['articles' => $articles, 'id' => uniqid()]);
    }
}
