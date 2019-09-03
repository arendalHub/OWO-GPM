<?php

namespace App\Http\Controllers\Personnel;

use App\Models\Dossier;
use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Section;
use App\Models\Site;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Spipu\Html2Pdf\Html2pdf;


class EmployeController extends Controller
{

    public function afficher($status=null)
    {
    	$dossiers = Dossier::where(['supprime'=>0])->get();
        $employes = Employe::where(['supprime'=>0])->get();

        session(['employes' => $employes]);

    	return view('personnel.employe.list')->with(['employes'=>$employes])->with(['dossiers' => $dossiers]);
    }


    public function ajouter(Request $request)
    {
        $matricNum = Employe::max('id_employe') + 1;

        $employe = new Employe;
        $employe->matricule_employe = $request->input('nom') . $request->input('num_piece');
        $employe->matricule_employe = strtoupper(substr($request->input('nom'), 0, 2)) . "-" . $matricNum;
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

        $employe = Employe::where(['id_employe' => Employe::max('id_employe'), 'supprime' => 0])->first();

        $nbDossiers = Dossier::count();

        $dossier = new Dossier();
        $dossier->num_dossier = $nbDossiers.$employe->matricule_employe;
        
        $dossier->photo = (!is_null($request->file('photo')) && $request->file('photo')!='') ? $request->file('photo')->store('dossiers_employes/'.$employe->id_employe): null;

        $dossier->naissance = (!is_null($request->file('naissance')) && $request->file('naissance')!='') ? $request->file('naissance')->store('dossiers_employes/' . $employe->id_employe) : null;

        $dossier->nationalite = (!is_null($request->file('nationalite')) && $request->file('nationalite')!='') ? $request->file('nationalite')->store('dossiers_employes/'.$employe->id_employe) : null;

        $dossier->cni = (!is_null($request->file('cni')) && $request->file('cni')!='') ? $request->file('cni')->store('dossiers_employes/'.$employe->id_employe) : null;

        $dossier->passport = (!is_null($request->file('passport')) && $request->file('passport')!='') ? $request->file('passport')->store('dossiers_employes/'.$employe->id_employe) : null;

        $dossier->diplome1 = (!is_null($request->file('diplome1')) && $request->file('diplome1')!='') ? $request->file('diplome1')->store('dossiers_employes/'.$employe->id_employe) : null;

        $dossier->diplome2 = (!is_null($request->file('diplome2')) && $request->file('diplome2')!='') ? $request->file('diplome2')->store('dossiers_employes/'.$employe->id_employe) : null;

        $dossier->diplome3 = (!is_null($request->file('diplome3')) && $request->file('diplome3')!='') ? $request->file('diplome3')->store('dossiers_employes/'.$employe->id_employe) : null;

        $dossier->attestation1 = (!is_null($request->file('attestation1')) && $request->file('attestation1')!='') ? $request->file('attestation1')->store('dossiers_employes/'.$employe->id_employe) : null;

        $dossier->attestation2 = (!is_null($request->file('attestation2')) && $request->file('attestation2')!='') ? $request->file('attestation2')->store('dossiers_employes/'.$employe->id_employe) : null;

        $dossier->attestation3 = (!is_null($request->file('attestation3')) && $request->file('attestation3')!='') ? $request->file('attestation3')->store('dossiers_employes/'.$employe->id_employe) : null;

        $dossier->save();

        $dossier = Dossier::where(['id_dossier' => Dossier::max('id_dossier'), 'supprime' => 0, ])->first();
        $employe->id_dossier = $dossier->id_dossier;

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

        $dossier = Dossier::where(['id_dossier' => $employe->id_dossier, 'supprime' => 0])->first();

        $dossier->photo = (!is_null($request->file('photo')) && $request->file('photo') != '') ? $request->file('photo')->store('dossiers_employes/' . $employe->id_employe) : $dossier->photo;

        $dossier->naissance = (!is_null($request->file('naissance')) && $request->file('naissance') != '') ? $request->file('naissance')->store('dossiers_employes/' . $employe->id_employe) : $dossier->naissance;

        $dossier->nationalite = (!is_null($request->file('nationalite')) && $request->file('nationalite') != '') ? $request->file('nationalite')->store('dossiers_employes/' . $employe->id_employe) : $dossier->nationalite;

        $dossier->cni = (!is_null($request->file('cni')) && $request->file('cni') != '') ? $request->file('cni')->store('dossiers_employes/' . $employe->id_employe) : $dossier->cni;

        $dossier->passport = (!is_null($request->file('passport')) && $request->file('passport') != '') ? $request->file('passport')->store('dossiers_employes/' . $employe->id_employe) : $dossier->passport;

        $dossier->diplome1 = (!is_null($request->file('diplome1')) && $request->file('diplome1') != '') ? $request->file('diplome1')->store('dossiers_employes/' . $employe->id_employe) : $dossier->diplome1;

        $dossier->diplome2 = (!is_null($request->file('diplome2')) && $request->file('diplome2') != '') ? $request->file('diplome2')->store('dossiers_employes/' . $employe->id_employe) : $dossier->diplome2;

        $dossier->diplome3 = (!is_null($request->file('diplome3')) && $request->file('diplome3') != '') ? $request->file('diplome3')->store('dossiers_employes/' . $employe->id_employe) : $dossier->diplome3;

        $dossier->attestation1 = (!is_null($request->file('attestation1')) && $request->file('attestation1') != '') ? $request->file('attestation1')->store('dossiers_employes/' . $employe->id_employe) : $dossier->attestation1;

        $dossier->attestation2 = (!is_null($request->file('attestation2')) && $request->file('attestation2') != '') ? $request->file('attestation2')->store('dossiers_employes/' . $employe->id_employe) : $dossier->attestation2;

        $dossier->attestation3 = (!is_null($request->file('attestation3')) && $request->file('attestation3') != '') ? $request->file('attestation3')->store('dossiers_employes/' . $employe->id_employe) : $dossier->attestation3;

        $dossier->save();

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
            $dossiers = Dossier::where(['supprime' => 0])->get();

            return view('personnel.employe.create_update')->with(['employe'=>$employe])->with(['dossiers' => $dossiers]);
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

    public function annuler_affecation(Request $request)
    {
        $employe = Employe::where(['id_employe' => $request->input('id'), 'supprime' => 0])->first();
        $employe->id_site = null;
        $employe->save();

        return redirect('/personnel/employe/affectation')->with(['message' => 'Affectation supprimée avec succès!']);
    }

    public function trier(Request $request)
    {
        if ($request->input()!=[]) {
            $clauses['supprime'] = 0;
            if (!is_null($request->input('contrat')) && $request->input('contrat')!='') {
                $clauses['contrat_employe'] = $request->input('contrat');
            }
            if (!is_null($request->input('sexe')) && $request->input('sexe') != '') {
                $clauses['sexe_employe'] = ($request->input('sexe') == 'M') ? 'M' : 'F';
            }

            if (!is_null($request->input('num_cnss')) && $request->input('num_cnss') != '') {
                
                if ($request->input('num_cnss') == 1) {
                    $whereRaw ="num_cnss_employe IS NOT NULL AND num_cnss_employe <> ''";
                } else {
                    $whereRaw ="num_cnss_employe IS NULL OR num_cnss_employe = ''";
                }

                $dossiers = Dossier::where(['supprime' => 0])->get();
                $employes = Employe::whereRaw($whereRaw)->where($clauses)->get();

                session(['employes'=>$employes]);

                return view('personnel/employe/list')->with(['employes' => $employes])->with(['dossiers' => $dossiers]);
            }

            $dossiers = Dossier::where(['supprime' => 0])->get();
            $employes = Employe::where($clauses)->get();

            return view('personnel/employe/list')->with(['employes' => $employes])->with(['dossiers' => $dossiers]);
        }
        return $this->afficher();
    }

    public function print_list()
    {
        try {
            $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 3);
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML(view("personnel/employe/print_list")->with('employes', session('employes')));
            $html2pdf->output('Liste des employes.pdf');
            return back()->with(["message" => "Impression faite"]);
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            return redirect('personnel.employe.list')->with(["error" => $formatter->getHtmlMessage()]);
        }
    }

    public function print_details($id)
    {
        $employe = Employe::where(['id_employe' => $id, 'supprime' => 0])->first();
        $dossier = Dossier::where(['id_dossier' => $employe->id_dossier, 'supprime' => 0])->first();

        try {
            $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 3);
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML(view("personnel/employe/print_details")->with(['employe' => $employe])->with(['dossier' => $dossier]));
            $html2pdf->output('Détails de l\'employé '.$employe->nom_employe.' '. $employe->prenom_employe.'.pdf');
            return back()->with(["message" => "Impression faite"]);
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            return redirect('personnel/employe/list')->with(["error" => $formatter->getHtmlMessage()]);
        }
    }

}
