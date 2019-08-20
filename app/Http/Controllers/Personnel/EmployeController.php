<?php

namespace App\Http\Controllers\Personnel;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Section;
use App\Models\Site;
use App\Models\Zone;
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
        // dd($request);
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
        $employe->type_piece_employe = $request->input('type_piece');
        $employe->num_piece_employe = $request->input('num_piece');
        $employe->niveau_etudes_employe = $request->input('niveau_etudes');
        $employe->date_entree_employe = $request->input('date_entree');
        $employe->date_depart_employe = $request->input('date_depart');
        $employe->num_cnss_employe = $request->input('num_cnss');
        $employe->contrat_employe = $request->input('contrat');
        $employe->save();

        return redirect('/personnel/employe/list')->with(['message' => 'Enregistrement effectué avec succès!']);
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
        $employe->type_piece_employe = $request->input('type_piece');
        $employe->num_piece_employe = $request->input('num_piece');
        $employe->niveau_etudes_employe = $request->input('niveau_etudes');
        $employe->date_entree_employe = $request->input('date_entree');
        $employe->date_depart_employe = $request->input('date_depart');
        $employe->num_cnss_employe = $request->input('num_cnss');
        $employe->contrat_employe = $request->input('contrat');
        $employe->save();

        return redirect('/personnel/employe/list')->with(['message' => 'Modification effectuée avec succès!']);
    }

    public function supprimer(Request $request)
    {
        $employe = Employe::where(['id_employe'=>$request->input('id'), 'supprime'=>0])->first();
        $employe->supprime = 1;
        $employe->save();

        return redirect('/personnel/employe/list')->with(['message' => 'Suppression effectuée avec succès!']);
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

    public function affectation()
    {
        $employes = Employe::where(['supprime' => 0])->get();
        $sites = Site::where(['supprime' => 0])->get();
        $sections = Section::where(['supprime' => 0])->get();
        $zones = Zone::where(['supprime' => 0])->get();

        return view('personnel.employe.affectation')->with(['employes' => $employes])->with(['sites' => $sites])->with(['sections' => $sections])->with(['zones' => $zones]);
    }

    public function ajouter_affectation(Request $request)
    {
        $employe = Employe::where(['id_employe' => $request->input('id'), 'supprime' => 0])->first();
        $employe->id_site = $request->input('site');
        $employe->save();

        return redirect('/personnel/employe/affectation')->with(['message' => 'Affectation effectuée avec succès!']);
    }

    public function modifier_affecation(Request $request)
    {
        $employe = Employe::where(['id_employe' => $request->input('id'), 'supprime' => 0])->first();
        $employe->supprime = 1;
        $employe->save();

        return redirect('/personnel/employe/affectation')->with(['message' => 'Suppression effectuée avec succès!']);
    }




}
