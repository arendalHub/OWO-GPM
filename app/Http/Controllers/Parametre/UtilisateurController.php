<?php

namespace App\Http\Controllers\Parametre;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Models\Utilisateur;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilisateurController extends Controller
{

    public function afficher($status=null)
    {
        $profils = Profil::where(['supprime'=>0])->get();
    	$utilisateurs = Utilisateur::join('profils', 'profils.id_profil', '=', 'utilisateurs.id_profil')->where
        (['utilisateurs.supprime'=>0])->get();

    	return view('parametre.utilisateur.list')->with(['utilisateurs'=>$utilisateurs])->with(['profils'=>$profils]);
    }

    public function ajouter(Request $request)
    {
        $this->validate($request, ['login'=>'unique:utilisateurs'], ['login.unique'=>'Le nom d\'utilisateur doit être unique']);

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

        return redirect('/parametre/utilisateur/list');
    }

    public function modifier(Request $request)
    {
        $utilisateur = Utilisateur::where(['id_utilisateur'=>$request->input('id'), 'supprime'=>0])->first();
        $utilisateur->nom_utilisateur = $request->input('nom');
        $utilisateur->prenom_utilisateur = $request->input('prenom');
        // $utilisateur->login = $request->input('login');
        $utilisateur->service_utilisateur = $request->input('service');
        $utilisateur->poste_utilisateur = $request->input('poste');
        $utilisateur->password = bcrypt($request->input('login'));
//        $utilisateur->password_utilisateur = $request->input('login');
        // $utilisateur->id_profil= $request->input('profil');
        $utilisateur->profil_temporaire= $request->input('profil_temporaire');
        $utilisateur->save();

        return redirect('/parametre/utilisateur/list');
    }

    public function supprimer(Request $request)
    {
        $utilisateur = Utilisateur::where(['id_utilisateur'=>$request->input('id'), 'supprime'=>0])->first();
        $utilisateur->supprime = 1;

        return redirect('/parametre/utilisateur/list');
    }

    public function formulaire($id=null)
    {
        $profils = Profil::where(['supprime'=>0])->get();
    	if (!is_null($id))
        {
            $utilisateur = Utilisateur::join('profils', 'profils.id_profil', '=', 'utilisateurs.id_profil')->where
        (['id_utilisateur'=>$id, 'utilisateurs.supprime'=>0])->first();
            return view('parametre.utilisateur.create_update')->with(['utilisateur'=>$utilisateur])->with(['profils'=>$profils]);
        }else
            return view('parametre.utilisateur.create_update')->with(['profils'=>$profils]);
    }

    public function connexion(Request $request)
    {
        if(Auth::attempt(['login'=>$request['login'], 'password'=>$request['password']]))
        {
            return redirect('/menu_modulaire');
        }
        return redirect()->back()->with(['message'=>'Nom d\'utilisateur et/ou Mot de passe incorrect(s).']);
    }

    public function deconnexion()
    {
        Auth::logout();
        return view('/connexion');
    }

}
