<?php

namespace App\Http\Controllers\Parametre;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

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
        $utilisateur = new Utilisateur;
        $utilisateur->login_utilisateur = $request->input('login');
        $utilisateur->password_utilisateur = bcrypt($request->input('login'));
        $utilisateur->id_profil = $request->input('profil');
        $utilisateur->save();

        return redirect('/parametre/utilisateur/list');
    }

    public function modifier(Request $request)
    {
        $utilisateur = Utilisateur::where(['id_utilisateur'=>$request->input('id'), 'supprime'=>0])->first();
        $utilisateur->login_utilisateur = $request->input('login');
//        $utilisateur->password_utilisateur = $request->input('password');
        $utilisateur->id_profil= $request->input('profil');
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

}
