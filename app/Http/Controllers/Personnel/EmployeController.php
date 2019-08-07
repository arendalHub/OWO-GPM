<?php

namespace App\Http\Controllers\Personnel;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{

    public function afficher($status=null)
    {
    	$employes = Employe::where(['supprime'=>0])->get();

    	return view('personnel.employe.list')->with(['employes'=>$employes]);
    }

    public function ajouter(Request $request)
    {
        $employe = new Employe;
        $employe->matricule_employe = $request->input('nom').$request->input('num_identite');
        $employe->nom_employe = $request->input('nom');
        $employe->prenom_employe = $request->input('prenom');
        $employe->date_naiss_employe = $request->input('date_naiss');
        $employe->lieu_naiss_employe = $request->input('lieu_naiss');
        $employe->sexe_employe = $request->input('sexe');
        $employe->num_tel_employe = $request->input('num_tel');
        $employe->adresse_employe = $request->input('adresse');
        $employe->pere_employe = $request->input('pere');
        $employe->mere_employe = $request->input('mere');
        $employe->num_tel_urgence_employe = $request->input('num_tel_urgence');
        $employe->situation_mat_employe = $request->input('situation_mat');
        $employe->nb_enfant_employe = $request->input('nb_enfant');
        $employe->num_identite_employe = $request->input('num_identite');
        $employe->niveau_etudes_employe = $request->input('niveau_etudes');
        $employe->date_entree_employe = $request->input('date_entree');
        $employe->date_depart_employe = $request->input('date_depart');
//        $employe->date_sortie_employe = date('Y-m-d');
        $employe->num_cnss_employe = $request->input('num_cnss');
        $employe->contrat_employe = $request->input('contrat');
        $employe->save();

        return redirect('/personnel/employe/list');
    }

    public function modifier(Request $request)
    {
        $employe = Employe::where(['id_employe'=>$request->input('id'), 'supprime'=>0])->first();
        $employe->matricule_employe = $request->input('nom').$request->input('num_identite');
        $employe->nom_employe = $request->input('nom');
        $employe->prenom_employe = $request->input('prenom');
        $employe->date_naiss_employe = $request->input('date_naiss');
        $employe->lieu_naiss_employe = $request->input('lieu_naiss');
        $employe->sexe_employe = $request->input('sexe');
        $employe->num_tel_employe = $request->input('num_tel');
        $employe->adresse_employe = $request->input('adresse');
        $employe->pere_employe = $request->input('pere');
        $employe->mere_employe = $request->input('mere');
        $employe->num_tel_urgence_employe = $request->input('num_tel_urgence');
        $employe->situation_mat_employe = $request->input('situation_mat');
        $employe->nb_enfant_employe = $request->input('nb_enfant');
        $employe->num_identite_employe = $request->input('num_identite');
        $employe->niveau_etudes_employe = $request->input('niveau_etudes');
        $employe->date_entree_employe = $request->input('date_entree');
        $employe->date_depart_employe = $request->input('date_depart');
//        $employe->date_sortie_employe = date('Y-m-d');
        $employe->num_cnss_employe = $request->input('num_cnss');
        $employe->contrat_employe = $request->input('contrat');
        $employe->save();

        return redirect('/personnel/employe/list');
    }

    public function supprimer(Request $request)
    {
        $employe = Employe::where(['id_employe'=>$request->input('id'), 'supprime'=>0])->first();
        $employe->supprime = 1;

        return redirect('/personnel/employe/list');
    }

    public function formulaire($id=null)
    {
    	if (!is_null($id))
        {
            $employe = Employe::where(['id_employe'=>$id, 'supprime'=>0])->first();
            return view('personnel.employe.create_update')->with(['employe'=>$employe]);
        }else
            return view('personnel.employe.create_update');
    }

}
