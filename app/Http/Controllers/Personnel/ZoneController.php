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
        $zone = new Zone;
        $zone->nom_zone = $request->input('nom');
        $zone->save();

        return redirect('/personnel/zone/list');
    }

    public function modifier(Request $request)
    {
        $zone = Zone::where(['id_zone'=>$request->input('id'), 'supprime'=>0])->first();
        $zone->nom_zone = $request->input('nom');
        $zone->save();

        return redirect('/personnel/zone/list');
    }

    public function supprimer(Request $request)
    {
        $zone = Zone::where(['id_zone'=>$request->input('id'), 'supprime'=>0])->first();
        $zone->supprime = 1;

        return redirect('/personnel/zone/list');
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
