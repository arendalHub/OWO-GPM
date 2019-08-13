<?php

namespace App\Http\Controllers\Personnel;

use App\Http\Controllers\Controller;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{

    public function afficher($status=null)
    {
    	$zones = Zone::where(['supprime'=>0])->get();

    	return view('personnel.zone.list')->with(['zones'=>$zones]);
    }

    public function ajouter(Request $request)
    {
        $this->validate(
            $request,
            ['nom_zone' => 'unique:zones'],
            ['nom_zone.unique' => 'Le nom de la zone doit être unique']
        );
        $zone = new Zone;
        $zone->nom_zone = $request->input('nom_zone');
        $zone->situation_geo_zone = $request->input('situation_geo_zone');
        $zone->save();

        return redirect('/personnel/zone/list')->with(['message'=>'Enregistrement effectué avec succès!']);
    }

    public function modifier(Request $request)
    {
        $zone = Zone::where(['id_zone'=>$request->input('id'), 'supprime'=>0])->first();
        $this->validate(
            $request,
            ['nom_zone' => 'unique:zones,nom_zone,'. $request->input('id'). ',id_zone'],
            ['nom_zone.unique' => 'Le nom de la zone doit être unique']
        );
        $zone->nom_zone = $request->input('nom_zone');
        $zone->situation_geo_zone = $request->input('situation_geo_zone');
        $zone->save();

        return redirect('/personnel/zone/list')->with(['message' => 'Modification effectuée avec succès!']);
    }

    public function supprimer(Request $request)
    {
        $zone = Zone::where(['id_zone'=>$request->input('id'), 'supprime'=>0])->first();
        $zone->supprime = 1;
        $zone->save();

        return redirect('/personnel/zone/list')->with(['message' => 'Suppression effectuée avec succès!']);
    }

    public function formulaire($id=null)
    {
    	if (!is_null($id))
        {
            $zone = Zone::where(['id_zone'=>$id, 'supprime'=>0])->first();
            return view('personnel.zone.create_update')->with(['zone'=>$zone]);
        }else
            return view('personnel.zone.create_update');
    }

}
