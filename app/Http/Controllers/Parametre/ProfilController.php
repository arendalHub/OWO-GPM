<?php

namespace App\Http\Controllers\Parametre;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{

    public function afficher()
    {
    	$profils = Profil::where(['supprime'=>0])->get();

    	return view('parametre.profil.list')->with(['profils'=>$profils]);
    }

    public function ajouter(Request $request)
    {
        $profil = new Profil;
        $profil->libelle_profil = $request->input('libelle');
        $profil->save();

        return redirect('/parametre/profil/list')->with(['message'=>'Profil ajouté avec succès!']);
    }

    public function modifier(Request $request)
    {
        $profil = Profil::where(['id_profil'=>$request->input('id'), 'supprime'=>0])->first();
        $profil->libelle_profil = $request->input('libelle');
        $profil->save();

        return redirect('/parametre/profil/list')->with(['message'=>'Profil modifié avec succès!']);
    }

    public function supprimer(Request $request)
    {
        $profil = Profil::find($request->input('id'));
        $profil->supprime = 1;
        $profil->save();

        return redirect('/parametre/profil/list')->with(['message'=>'Profil supprimé avec succès!']);
    }

    public function formulaire($id=null)
    {
    	if (!is_null($id))
        {
            $profil = Profil::where(['id_profil'=>$id, 'supprime'=>0])->first();
//            dd(var_dump($profil));
            return view('parametre.profil.create_update')->with(['profil'=>$profil]);
        }else
    	    return view('parametre.profil.create_update');
    }

}
