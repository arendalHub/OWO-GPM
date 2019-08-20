<?php

namespace App\Http\Controllers\Parametre;

use App\Http\Controllers\Controller;
use App\Models\Droit;
use Illuminate\Http\Request;

class DroitController extends Controller
{

    public function afficher($status=null)
    {
    	$droits = Droit::where(['supprime'=>0])->get();

    	return view('parametre.droit.list')->with(['droits'=>$droits]);
    }

    public function ajouter(Request $request)
    {
        $droit = new Droit;
        $droit->libelle_droit = $request->input('libelle');
        $droit->save();

        return redirect('/parametre/droit/list');
    }

    public function modifier(Request $request)
    {
        $droit = Droit::where(['id_droit'=>$request->input('id'), 'supprime'=>0])->get();
        $droit->libelle_droit = $request->input('libelle');
        $droit->save();

        return redirect('/parametre/droit/list');
    }

    public function supprimer(Request $request)
    {
        $droit = Droit::where(['id_droit'=>$request->input('id'), 'supprime'=>0])->get();
        $droit->supprime = 1;
        $droit->save();

        return redirect('/parametre/droit/list');
    }

    public function formulaire($id=null)
    {
    	if (!is_null($id))
        {
            $droit = Droit::where(['supprime'=>0])->get();
            return view('parametre.droit.create_update')->with(['droit'=>$droit]);
        }else
            return view('parametre.droit.create_update');

    }

}
