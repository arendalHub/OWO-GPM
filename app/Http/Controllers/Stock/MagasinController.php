<?php

namespace App\Http\Controllers\Stock;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Magasin ;
/**
 * Ce controller est responsable de toute les actions sur les Magasins.
 * @author fatigba72@gmail.com
 */
class MagasinController extends Controller
{
    /**
     * Affiche la page de listing des fournisseurs.
     * @author fatigba72gmail.com
     */
    public function list(string $num_page = "")
    {
        $magasins = Magasin::orderBy('id_magasin', 'desc')
                                    ->where('supprime','=',false)
                                    ->paginate();
        return view("stock.magasin.list")->with(["magasins"=>$magasins]);
    }

    /**
     * Affiche la page de modification/d'ajout d'un fournisseur.
     * @author fatigba72gmail.com
     */
    public function create_update(string $id_magasin = null)
    {
        if($id_magasin != null)
        {
            $magasin = Magasin::find($id_magasin) ;
            return view('stock.magasin.create_update')->with(['magasin'=>$magasin, 'update'=>true]) ;
        }
        return view('stock.magasin.create_update')->with(['magasin'=>null, 'update'=>false]) ;
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
        $magasin = null ;
        $creat_update_message = '' ;
        // C'est une mise a jour
        if(array_key_exists('update', $postData) && $postData['update'] != false)
        {
            $magasin = Magasin::find($postData['id_magasin']) ;
            $creat_update_message = "Le magasin {$magasin->libelle_magasin} a été mis à jour !" ;
        }
        else
        {
            $magasin = new Magasin ;
            $creat_update_message = "Le magasin {$postData['libelle_magasin']} a été enregistré !" ;
        }
        $magasin->libelle_magasin = $postData['libelle_magasin'] ;
        $magasin->adresse_magasin = $postData['adresse_magasin'] ;
        if($magasin->save()) {
            return redirect('/stock/magasin/list')->with(['message'=> $creat_update_message]) ;
        }
        return back()->withInput($postData)->with(['error'=>'Veuillez reprendre, une erreur inconnue s\'est produite !']) ;
    }

    public function delete(string $id_magasin = null)
    {
        if($id_magasin != null)
        {
            $magasin = Magasin::find($id_magasin) ;
            $magasin->supprime = true;
            if ($magasin->save()){
                $delete="Magasin supprimé avec succès!";
            }
            return redirect('/stock/magasin/list')->with(['message'=> $delete]) ;
        }
    }
}
