<?php

namespace App\Http\Controllers;

use App\Models\ArticleCommande;
use App\Models\Article;
use App\Models\Commande ;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

/**
 * Ce controlleur est responsable de toute les actions sur les commandes.
 * @todo migration Commande et ArticleCommande.
 * @author fatigba72@mail.com
 */
class CommandeController extends Controller
{
    public function list(string $num_page = null)
    {
        $commandes = Commande::orderBy("id_commande", "desc")->paginate() ;
        return view("stock/commande/list", ["commandes"=>$commandes]) ;
    }

    public function create_update(string $id_commande = null)
    {
        $fournisseurs = Fournisseur::all() ;
        return view('stock.commande.create_update')->with(['update'=>false, 'fournisseurs'=>$fournisseurs]) ;
    }

    /**
     * Cette fonction traite le formulaire d'ajout de produit.
     * @todo data validation
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function do_create_update(Request $req)
    {
        $postData = $req->all() ;
        $commande = new Commande() ;
        $commande->id_fournisseur = $postData["id_fournisseur"] ;
        $commande->date_commande = date("d-m-Y H:i:s") ;
        $commande->emplacement_stock = $postData["emplacement_stock"] ;
        if(!$commande->save()) {
            back()->with('error', 'Une erreur est survenue, veuillez rééssayer !') ;
        }

        $postDataKeys = array_keys($postData) ;
        for($i=0; $i<count($postDataKeys)-1; $i++)
        {
            if(strstr($postDataKeys[$i], "id_article-item-row") !== false)
            {
                if(strstr($postDataKeys[$i+1], "quantite-item-row") !== false)
                {
                    $cmd = new ArticleCommande() ;
                    $cmd->id_article = $postData[$postDataKeys[$i]] ;
                    $cmd->id_commande = $commande->id_commande ;
                    $cmd->quantite = $postData[$postDataKeys[$i+1]] ;
                    $cmd->save() ;
                }
            }
        }

        return redirect('/stock/commande/list')->with("message", "La commande a été bien engistrée !") ;
    }

    public function getItemsPart()
    {
        $articles = Article::all() ;
        return view('stock.commande.itemspart', ['articles'=>$articles, 'id'=>uniqid()]) ;
    }
}
