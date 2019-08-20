<?php

namespace App\Http\Controllers\Stock;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Box;
use App\Models\Etagere;
use App\Models\Rangee;

class EmplacementController extends Controller
{
    public function list(string $num_page = null)
    {
        $boxes = Box::all();
        $etageres = Etagere::all();
        $rangees = Rangee::all();
        return view("stock/emplacement/list", ["boxes" => $boxes, "etageres" => $etageres, "rangees" => $rangees]);
    }

    public function add_box(Request $req) {
        $postData = $req->post();

        $box = new Box();
        $box->lib_box = $postData['box'];
        $box->save();

        return redirect('/stock/emplacement/list')->with("message", "Le nouveau box a été bien engistré !") ;
    }

    public function add_etagere(Request $req) {
        $postData = $req->post();

        $etagere = new Etagere();
        $etagere->lib_etagere = $postData['etagere'];
        $etagere->save();

        return redirect('/stock/emplacement/list')->with("message", "La nouvelle étagère a été bien engistrée !") ;
    }

    public function add_rangee(Request $req) {
        $postData = $req->post();

        $rangee = new Rangee();
        $rangee->lib_rangee = $postData['rangee'];
        $rangee->save();

        return redirect('/stock/emplacement/list')->with("message", "La nouvelle rangée a été bien engistrée !") ;
    }
}
