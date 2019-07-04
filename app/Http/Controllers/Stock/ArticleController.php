<?php

namespace App\Http\Controllers;

use App\Models\Article;

/**
 * Ce controller est responsable de toute les actions sur les articles.
 * @author fatigba72@gmail.con
 */
class ArticleController extends Controller
{
    public function list(int $num_page)
    {
        $items = Article::orderBy('id', 'asc')->paginate($num_page) ;
        return view('stock.list')->with('items', $items) ;
    }

    public function create_update(int $num_page = null)
    {

    }
}