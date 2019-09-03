<?php

namespace App\Http\Controllers\Parametre;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;

class ProfilController extends Controller
{

    public function afficher()
    {
    	$profils = Profil::where(['supprime'=>0])->get();

    	return view('parametre.profil.list')->with(['profils'=>$profils]);
    }

    public function ajouter(Request $request)
    {
        $this->validate(
            $request,
            ['libelle_profil' => 'unique:profils'],
            ['libelle_profil.unique' => 'Le libelle du profil doit être unique']
        );
        $profil = new Profil;
        $profil->libelle_profil = $request->input('libelle');
        $profil->save();

        return redirect('/parametre/profil/list')->with(['message' => 'Enregistrement effectué avec succès!']);
    }

    public function modifier(Request $request)
    {
        $this->validate(
            $request,
            ['libelle_profil' => 'unique:profils,libelle_profil,' . $request->input('id') . ',id_profil'],
            ['libelle_profil.unique' => 'Le libelle du profil doit être unique']
        );
        $profil = Profil::where(['id_profil'=>$request->input('id'), 'supprime'=>0])->first();
        $profil->libelle_profil = $request->input('libelle');
        $profil->save();

        return redirect('/parametre/profil/list')->with(['message' => 'Modification effectuée avec succès!']);
    }

    public function supprimer(Request $request)
    {
        $profil = Profil::find($request->input('id'));
        $profil->supprime = 1;
        $profil->save();

        return redirect('/parametre/profil/list')->with(['message' => 'Suppression effectuée avec succès!']);
    }

    public function formulaire($id=null)
    {
    	if (!is_null($id))
        {
            $profil = Profil::where(['id_profil'=>$id, 'supprime'=>0])->first();
//            dd(var_dump($profil));
            return view('parametre.profil.create_update')->with(['profil'=>$profil]);
        }else
    	    return view('parametre.profil.create_update');
    }

    public function print_list()
    {
        $profils = Profil::where(['supprime' => 0])->get();
        try {
            $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 3);
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML(view("parametre/profil/print_list")->with('profils', $profils));
            $html2pdf->output('Liste des profils.pdf');
            return back()->with(["message" => "Impression faite"]);
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            return redirect('parametre.profil.list')->with(["error" => $formatter->getHtmlMessage()]);
        }
    }

}
