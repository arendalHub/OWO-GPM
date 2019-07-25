<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ConnexionController extends Controller
{

    public function connexion(Request $request)
    {
        $resulat = Utilisateur::where(['login_utilisateur'=>$request->login,
            'password_utilisateur'=>$request->password])->first();
//        dd($resulat);

        if ($resulat)
        {
            if ($resulat->supprime==1)
            {
                $message = "COMPTE D'UTILISATEUR SUPPRIMÉ!";
                return redirect('/')->with(['message'=>$message]);
            }
            else
            {
                return redirect('menu_modulaire');
            }
        }
        else
        {
            $message = "Nom d'utilisateur ou/et Mot de passe incorrect !";
            return redirect('/')->with(['message'=>$message]);
        }
    }

    public function deconnexion()
    {
        return redirect('/');
    }


}


