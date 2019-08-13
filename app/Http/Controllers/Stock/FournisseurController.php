<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur ;
/**
 * Ce controller est responsable de toute les actions sur les Fournisseurs.
 * @author fatigba72@gmail.com
 */
class FournisseurController extends Controller
{
    /**
     * Affiche la page de listing des fournisseurs.
     * @author fatigba72gmail.com
     */
    public function list(string $num_page = "")
    {
        $fournisseurs = Fournisseur::orderBy('id_fournisseur', 'desc')
                                    ->where('supprime','=',false)
                                    ->paginate();
        return view("stock.fournisseur.list")->with(["fournisseurs"=>$fournisseurs]);
    }

    /**
     * Affiche la page de modification/d'ajout d'un fournisseur.
     * @author fatigba72gmail.com
     */
    public function create_update(string $id_fournisseur = null)
    {
        if($id_fournisseur != null)
        {
            $fournisseur = Fournisseur::find($id_fournisseur) ;
            return view('stock.fournisseur.create_update')->with(['fournisseur'=>$fournisseur, 'update'=>true]) ;
        }
        return view('stock.fournisseur.create_update')->with(['fournisseur'=>null, 'update'=>false]) ;
    }

    /**
     * Traite le formulaire d'ajout/de modification d'un fournisseur.
     * Elle redirige vers la page de listing en cas de succès sinon, vers
     * la page du formulaire.
     * @author fatigba72@gmail.com
     */
    public function do_create_update(Request $req)
    {
        $postData = $req->post() ;
        $fournisseur = null ;
        $creat_update_message = '' ;
        // C'est une mise a jour
        if(array_key_exists('update', $postData) && $postData['update'] != false)
        {
            $fournisseur = Fournisseur::find($postData['id_fournisseur']) ;
            $creat_update_message = "Le fournisseur {$fournisseur->designation_fournisseur} a été mis à jour !" ;
        }
        else
        {
            $fournisseur = new Fournisseur ;
            $creat_update_message = "Le fournisseur {$postData['designation_fournisseur']} a été enregistré !" ;
        }
        $fournisseur->raison_sociale = $postData['raison_sociale'] ;
        $fournisseur->designation_fournisseur = $postData['designation_fournisseur'] ;
        $fournisseur->nif_fournisseur = $postData['nif_fournisseur'] ;
        $fournisseur->personne_ressource = $postData['personne_ressource'] ;
        $fournisseur->email_fournisseur = $postData['email_fournisseur'] ;
        $fournisseur->contact_fournisseur = $postData['contact_fournisseur'] ;
        $fournisseur->bp_fournisseur = $postData['bp_fournisseur'] ;
        $fournisseur->adresse_fournisseur = $postData['adresse_fournisseur'] ;
        if($fournisseur->save()) {
            return redirect('/stock/fournisseur/list')->with(['message'=> $creat_update_message]) ;
        }
        return back()->withInput($postData)->with(['error'=>'Veuilles reprendre, une erreur inconnue s\'est produite !']) ;
    }

    public function delete(string $id_fournisseur = null)
    {
        if($id_fournisseur != null)
        {
            $fournisseur = Fournisseur::find($id_fournisseur) ;
            $fournisseur->supprime = true;
            if ($fournisseur->save()){
                $delete="Fournisseur supprimé avec succès!";
            }
            return redirect('/stock/fournisseur/list')->with(['message'=> $delete]) ;
        }
    }
}
