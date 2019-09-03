<?php

namespace App\Http\Controllers\Personnel;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Zone;
use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;

class SectionController extends Controller
{

    public function afficher($status=null)
    {
        $zones = Zone::where(['supprime'=>0])->get();
    	$sections = Section::join('zones', 'zones.id_zone', '=', 'sections.id_zone')->where(['sections.supprime'=>0])->get();

    	return view('personnel.section.list')->with(['sections'=>$sections])->with(['zones'=>$zones]);
    }

    public function ajouter(Request $request)
    {
        $this->validate(
            $request,
            ['nom_section' => 'unique:sections'],
            ['nom_section.unique' => 'Le nom de la section doit être unique']
        );
        $section = new Section;
        $section->nom_section = $request->input('nom_section');
        $section->id_zone= $request->input('zone');
        $section->save();

        return redirect('/personnel/section/list')->with(['message' => 'Enregistrement effectué avec succès!']);
    }

    public function modifier(Request $request)
    {
        $section = Section::where(['id_section'=>$request->input('id'), 'supprime'=>0])->first();
        $this->validate(
            $request,
            ['nom_section' => 'unique:sections,nom_section,' . $request->input('id') . ',id_section'],
            ['nom_section.unique' => 'Le nom de la section doit être unique']
        );
        $section->nom_section = $request->input('nom_section');
        $section->id_zone= $request->input('zone');
        $section->save();

        return redirect('/personnel/section/list')->with(['message' => 'Modification effectuée avec succès!']);
    }

    public function supprimer(Request $request)
    {
        $section = Section::where(['id_section'=>$request->input('id'), 'supprime'=>0])->first();
        $section->supprime = 1;
        $section->save();

        return redirect('/personnel/section/list')->with(['message' => 'Suppression effectuée avec succès!']);
    }

    public function formulaire($id=null)
    {
        $zones = Zone::where(['supprime'=>0])->get();
    	if (!is_null($id))
        {
            $section = Section::join('zones', 'zones.id_zone', '=', 'sections.id_zone')->where
            (['id_section' => $id, 'sections.supprime'=>0])->first();
            return view('personnel.section.create_update')->with(['section'=>$section])->with(['zones'=>$zones]);
        }else
            return view('personnel.section.create_update')->with(['zones'=>$zones]);
    }

    public function print_list()
    {
        $sections = Section::where(['sections.supprime' => 0])->join('zones', 'sections.id_zone', 'zones.id_zone')->get();
        try {
            $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 3);
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML(view("personnel/section/print_list")->with('sections', $sections));
            $html2pdf->output('Liste des sections.pdf');
            return back()->with(["message" => "Impression faite"]);
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            return redirect('personnel.section.list')->with(["error" => $formatter->getHtmlMessage()]);
        }
    }


}
