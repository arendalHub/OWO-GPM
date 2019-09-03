<?php

namespace App\Http\Controllers\Parametre;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Models\Utilisateur;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spipu\Html2Pdf\Html2Pdf;

class UtilisateurController extends Controller
{

    public function afficher($status=null)
    {
        $utilisateurs = Utilisateur::where(['supprime'=>0])->get();
        // $profils = Profil::where(['supprime'=>0])->get();
    	// $utilisateurs = Utilisateur::join('profils', 'profils.id_profil', '=', 'utilisateurs.id_profil')->where(['utilisateurs.supprime'=>0])->get();

    	return view('parametre.utilisateur.list')->with(['utilisateurs'=>$utilisateurs])/* ->with(['profils'=>$profils]) */;
    }

    public function ajouter(Request $request)
    {
        $this->validate($request,
            ['login'=>'unique:utilisateurs'],
            ['login.unique'=>'Le nom d\'utilisateur doit être unique']
        );

        $utilisateur = new Utilisateur;
        $utilisateur->nom_utilisateur = $request->input('nom');
        $utilisateur->prenom_utilisateur = $request->input('prenom');
        $utilisateur->login = $request->input('login');
        $utilisateur->service_utilisateur = $request->input('service');
        $utilisateur->poste_utilisateur = $request->input('poste');
        $utilisateur->password = bcrypt($request->input('login'));
        // $utilisateur->id_profil = $request->input('profil');
        $utilisateur->profil_temporaire = $request->input('profil_temporaire');
        $utilisateur->save();

        return redirect('/parametre/utilisateur/list')->with(['message' => 'Enregistrement effectué avec succès!']);
    }

    public function modifier(Request $request)
    {
        $utilisateur = Utilisateur::where(['id_utilisateur'=>$request->input('id'), 'supprime'=>0])->first();
        $utilisateur->nom_utilisateur = $request->input('nom');
        $utilisateur->prenom_utilisateur = $request->input('prenom');
        // $utilisateur->login = $request->input('login');
        $utilisateur->service_utilisateur = $request->input('service');
        $utilisateur->poste_utilisateur = $request->input('poste');
        // $utilisateur->password = bcrypt($request->input('login'));
//        $utilisateur->password_utilisateur = $request->input('login');
        // $utilisateur->id_profil= $request->input('profil');
        $utilisateur->profil_temporaire= $request->input('profil_temporaire');
        $utilisateur->save();

        return redirect('/parametre/utilisateur/list')->with(['message' => 'Modification effectuée avec succès!']);
    }

    public function supprimer(Request $request)
    {
        $utilisateur = Utilisateur::where(['id_utilisateur'=>$request->input('id'), 'supprime'=>0])->first();
        $utilisateur->supprime = 1;
        $utilisateur->save();

        return redirect('/parametre/utilisateur/list')->with(['message' => 'Suppression effectuée avec succès!']);
    }

    public function activer_desactiver(Request $request)
    {
        $utilisateur = Utilisateur::where(['id_utilisateur'=>$request->input('id'), 'supprime'=>0])->first();
        $utilisateur->actif = ($utilisateur->actif==1) ? 0 : 1 ;
        $utilisateur->save();

        return redirect('/parametre/utilisateur/list')->with(['message' => 'Statut modifié avec succès!']);
    }

    public function formulaire($id=null)
    {
        if (!is_null($id))
        {
            $utilisateur = Utilisateur::where(['id_utilisateur'=>$id, 'supprime'=>0])->first();
            return view('parametre.utilisateur.create_update')->with(['utilisateur'=>$utilisateur]);
        }else
            return view('parametre.utilisateur.create_update');
        
        // $profils = Profil::where(['supprime'=>0])->get();
    	// if (!is_null($id))
        // {
        //     $utilisateur = Utilisateur::join('profils', 'profils.id_profil', '=', 'utilisateurs.id_profil')->where
        // (['id_utilisateur'=>$id, 'utilisateurs.supprime'=>0])->first();
        //     return view('parametre.utilisateur.create_update')->with(['utilisateur'=>$utilisateur])->with(['profils'=>$profils]);
        // }else
        //     return view('parametre.utilisateur.create_update')->with(['profils'=>$profils]);
    }

    public function connexion(Request $request)
    {
        $message = 'Nom d\'utilisateur et/ou Mot de passe incorrect(s).';
        // dd(var_dump(Auth::attempt(['login' => $request['login'], 'password' => $request['password']])));
        if(Auth::attempt(['login'=>$request['login'], 'password'=>$request['password']]))
        {
            if (Auth::User()->actif==0) {
                Auth::logout();
                return redirect('/')->with(['message' => 'Compte désactivé. Contacter l\'administrateur.']);
            } elseif(Auth::User()->supprime == 1){
                Auth::logout();
                return redirect('/')->with(['message' => 'Compte supprimé. Contacter l\'administrateur.']);
            }
            
            $message = 'Bienveue '.Auth::User()->nom_utilisateur.' '. Auth::User()->prenom_utilisateur;
            return redirect('/menu_modulaire')->with(['message' => $message]);
        }
        // return redirect('/');
        return redirect('/')->with(['message'=>$message]);
    }

    public function deconnexion()
    {
        Auth::logout();
        // Session::flush();
        return view('/connexion');
    }

    public function print_list()
    {
        $utilisateurs = Utilisateur::where(['supprime' => 0])->get();
        // $utilisateurs = Utilisateur::where(['utilisateurs.supprime' => 0])->join('profils', 'utilisateurs.id_profil', 'profils.id_profil')->get();
        try {
            $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 3);
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML(view("parametre/utilisateur/print_list")->with('utilisateurs', $utilisateurs));
            $html2pdf->output('Liste des utilisateurs.pdf');
            return back()->with(["message" => "Impression faite"]);
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            return redirect('parametre.utilisateur.list')->with(["error" => $formatter->getHtmlMessage()]);
        }
    }
}
