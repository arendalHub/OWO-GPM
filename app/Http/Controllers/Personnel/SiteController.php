<?php

namespace App\Http\Controllers\Personnel;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Site;
use App\Models\Zone;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function afficher($status=null)
    {
        $zones = Zone::where(['supprime'=>0])->get();
        $sections = Section::where(['supprime'=>0])->get();
    	$sites = Site::join('sections', 'sections.id_section', '=', 'sites.id_section')->join('zones', 'zones.id_zone', '=', 'sections.id_zone')->where(['sites.supprime'=>0])
            ->get();

    	return view('personnel.site.list')->with(['sites'=>$sites])->with(['sections'=>$sections])->with
        (['zones'=>$zones]);
    }

    public function ajouter(Request $request)
    {
        $site = new Site;
        $site->nom_site = $request->input('nom');
        $site->adresse_site = $request->input('adresse');
        $site->longitude_site = $request->input('longitude');
        $site->lattitude_site = $request->input('lattitude');
        $site->date_deb_travaux_site = $request->input('date_debut_travaux');
        $site->date_fin_travaux_site = $request->input('date_fin_travaux');
        $site->duree_travaux_site = $request->input('duree_travaux');
        $site->id_section = $request->input('section');
        $site->save();

        return redirect('/personnel/site/list');
    }

    public function modifier(Request $request)
    {
        $site = Site::where(['id_site'=>$request->input('id'), 'supprime'=>0])->first();
        $site->nom_site = $request->input('nom');
        $site->adresse_site = $request->input('adresse');
        $site->longitude_site = $request->input('longitude');
        $site->lattitude_site = $request->input('lattitude');
        $site->date_deb_travaux_site = $request->input('date_debut_travaux');
        $site->date_fin_travaux_site = $request->input('date_fin_travaux');
        $site->duree_travaux_site = $request->input('duree_travaux');
        $site->id_section = $request->input('section');

        $site->save();

        return redirect('/personnel/site/list');
    }

    public function supprimer(Request $request)
    {
        echo 'toto';
        $site = Site::where(['id_site'=>$request->input('id'), 'supprime'=>0])->get();
        $site->supprime = 1;

        return redirect('/personnel/site/list');
    }

    public function formulaire($id=null)
    {
        $sections = Section::where(['supprime'=>0])->get();
    	if (!is_null($id))
        {
            $site = Site::join('sections', 'sections.id_section', '=', 'sites.id_section')->where(['sections.supprime'=>0])->first();
            return view('personnel.site.create_update')->with(['site'=>$site])->with(['sections'=>$sections]);
        }else
            return view('personnel.site.create_update')->with(['sections'=>$sections]);
    }

}
