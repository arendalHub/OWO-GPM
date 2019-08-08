<?php

namespace App\Http\Controllers\Personnel;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Zone;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function afficher($status=null)
    {
        $zones = Zone::where(['supprime'=>0])->get();
    	$sections = Section::join('zones', 'zones.id_zone', '=', 'sections.id_zone')->where(['sections.supprime'=>0])
            ->get();

    	return view('personnel.section.list')->with(['sections'=>$sections])->with(['zones'=>$zones]);
    }

    public function ajouter(Request $request)
    {
        $section = new Section;
        $section->nom_section = $request->input('nom');
        $section->id_zone= $request->input('zone');
        $section->save();

        return redirect('/personnel/section/list');
    }

    public function modifier(Request $request)
    {
        $section = Section::where(['id_section'=>$request->input('id'), 'supprime'=>0])->first();
        $section->nom_section = $request->input('nom');
        $section->id_zone= $request->input('zone');

        $section->save();

        return redirect('/personnel/section/list');
    }

    public function supprimer(Request $request)
    {
        $section = Section::where(['id_section'=>$request->input('id'), 'supprime'=>0])->first();
        $section->supprime = 1;

        return redirect('/personnel/section/list');
    }

    public function formulaire($id=null)
    {
        $zones = Zone::where(['supprime'=>0])->get();
    	if (!is_null($id))
        {
            $section = Section::join('zones', 'zones.id_zone', '=', 'sections.id_zone')->where
            (['sections.supprime'=>0])->first();
            return view('personnel.section.create_update')->with(['section'=>$section])->with(['zones'=>$zones]);
        }else
            return view('personnel.section.create_update')->with(['zones'=>$zones]);
    }

}
