<?php

namespace App\Http\Controllers\Stock;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\FamilleArticle;

class FamilleController extends Controller
{
    public function list(string $num_page = null)
    {
        $fams = FamilleArticle::all();
        return view("stock/famille/list", ["fams" => $fams]);
    }

    public function add_famille(Request $req) {
        $postData = $req->post();

        $famille = new FamilleArticle();
        $famille->description_famille = $postData['famille'];
        $famille->save();

        return redirect('/stock/famille/list')->with("message", "La nouvelle famille a été bien engistrée !") ;
    }
}
