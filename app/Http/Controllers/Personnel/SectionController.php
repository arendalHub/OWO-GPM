<?php

namespace App\Http\Controllers\Personnel;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function afficher($status=null)
    {
    	$sections = Section::where(['supprime'=>0])->get();

    	return view('personnel.section.list')->with(['sections'=>$sections]);
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
        $section = Section::where(['id_section'=>$request->input('id'), 'supprime'=>0])->get();
        $section->nom_section = $request->input('nom');
        $section->id_zone= $request->input('zone');

        $section->save();

        return redirect('/personnel/section/list');
    }

    public function supprimer(Request $request)
    {
        $section = Section::where(['id_section'=>$request->input('id'), 'supprime'=>0])->get();
        $section->supprime = 1;

        return redirect('/personnel/section/list');
    }

    public function formulaire($id=null)
    {
    	if (!is_null($id))
        {
            $section = Section::where(['supprime'=>0])->first();
            return view('personnel.section.create_update')->with(['section'=>$section]);
        }else
            return view('personnel.section.create_update');
    }

}
