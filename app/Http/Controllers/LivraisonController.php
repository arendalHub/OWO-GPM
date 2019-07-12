<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Livraison;
use Illuminate\Support\Facades\DB;

class LivraisonController extends Controller
{
    public function list(string $num_page= null)
    {
        $livraisons = Livraison::orderBy('id_livraison', 'desc')->paginate() ;
        return view("stock/livraison/list")->with(['livraisons'=>$livraisons]) ;
    }
}