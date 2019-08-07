<?php

namespace App\Http\Controllers\Parametre;

use App\Http\Controllers\Controller;
use App\Models\Societe;
use Illuminate\Http\Request;


class SocieteController extends Controller
{
    public function editer(Request $request)
    {
        $societe = Societe::first();
        if (is_null($societe) || $societe=='')
            $societe = new Societe;

        $societe->raison_sociale_societe = $request->input('raison_sociale');
        $societe->activites_societe = $request->input('activites');
        $societe->adresse_societe = $request->input('adresse');
        $societe->bp_societe = $request->input('bp');
        $societe->telephone1_societe = $request->input('telephone1');
        $societe->telephone2_societe = $request->input('telephone2');
        $societe->nif_societe = $request->input('nif');
        $societe->num_cfe_societe = $request->input('num_cfe');
        $societe->email_societe = $request->input('email');
        $societe->site_web_societe = $request->input('site_web');
        $societe->autres_infos_societe = $request->input('autres_infos');
        $societe->save();

        return redirect('/parametre/societe');
    }

    public function formulaire($action=null)
    {
        $societe = Societe::first();
        if (!is_null($societe) || $societe!='')
        {
            if (!is_null($action) && $action=1)
                return view('parametre.societe.edit')->with(['societe'=>$societe, 'todo'=>1]);
            return view('parametre.societe.edit')->with(['societe'=>$societe]);
        }
        return view('parametre.societe.edit');
    }
}
