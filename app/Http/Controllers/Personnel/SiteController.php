<?php

namespace App\Http\Controllers\Personnel;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function afficher($status=null)
    {
    	$sites = Site::where(['supprime'=>0])->get();

    	return view('personnel.site.list')->with(['sites'=>$sites]);
    }

    public function ajouter(Request $request)
    {
        $site = new Site;
        $site->nom_site = $request->input('nom');
        $site->save();

        return redirect('/personnel/site/list');
    }

    public function modifier(Request $request)
    {
        $site = Site::where(['id_site'=>$request->input('id'), 'supprime'=>0])->get();
        $site->nom_site = $request->input('nom');
        $site->save();

        return redirect('/personnel/site/list');
    }

    public function supprimer(Request $request)
    {
        $site = Site::where(['id_site'=>$request->input('id'), 'supprime'=>0])->get();
        $site->supprime = 1;

        return redirect('/personnel/site/list');
    }

    public function formulaire($id=null)
    {
    	if (!is_null($id))
        {
            $section = Section::where(['supprime'=>0])->first();
            $site = Site::where(['supprime'=>0])->first();
            return view('personnel.site.create_update')->with(['site'=>$site]);
        }else
            return view('personnel.site.create_update');
    }

}
