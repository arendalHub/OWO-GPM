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
        $this->validate(
            $request,
            ['nom_site' => 'unique:sites'],
            ['nom_site.unique' => 'Le nom de la site doit être unique']
        );
        $site = new Site;
        $site->nom_site = $request->input('nom_site');
        $site->adresse_site = $request->input('adresse');
        $site->longitude_site = $request->input('longitude');
        $site->lattitude_site = $request->input('lattitude');
        $site->date_debut_travaux_site = $request->input('date_debut_travaux');
        $site->date_fin_travaux_site = $request->input('date_fin_travaux');
        $site->duree_travaux_site = $request->input('duree_travaux');
        $site->id_section = $request->input('section');
        $site->save();

        return redirect('/personnel/site/list')->with(['message' => 'Enregistrement effectué avec succès!']);
    }

    public function modifier(Request $request)
    {
        $site = Site::where(['id_site'=>$request->input('id'), 'supprime'=>0])->first();
        $this->validate(
            $request,
            ['nom_site' => 'unique:sites,nom_site,' . $request->input('id') . ',id_site'],
            ['nom_site.unique' => 'Le nom de la site doit être unique']
        );
        $site->nom_site = $request->input('nom_site');
        $site->adresse_site = $request->input('adresse');
        $site->longitude_site = $request->input('longitude');
        $site->lattitude_site = $request->input('lattitude');
        $site->date_debut_travaux_site = $request->input('date_debut_travaux');
        $site->date_fin_travaux_site = $request->input('date_fin_travaux');
        $site->duree_travaux_site = $request->input('duree_travaux');
        $site->id_section = $request->input('section');

        $site->save();

        return redirect('/personnel/site/list')->with(['message' => 'Modification effectuée avec succès!']);
    }

    public function supprimer(Request $request)
    {
        echo 'toto';
        $site = Site::where(['id_site'=>$request->input('id'), 'supprime'=>0])->get();
        $site->supprime = 1;
        $site->save();

        return redirect('/personnel/site/list')->with(['message' => 'Suppression effectuée avec succès!']);
    }

    public function formulaire($id=null)
    {
        $sections = Section::where(['supprime'=>0])->get();
    	if (!is_null($id))
        {
            $site = Site::join('sections', 'sections.id_section', '=', 'sites.id_section')->where(['id_site' => $id, 'sites.supprime'=>0])->first();
            return view('personnel.site.create_update')->with(['site'=>$site])->with(['sections'=>$sections]);
        }else
            return view('personnel.site.create_update')->with(['sections'=>$sections]);
    }

}
