<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Authentification
Route::get('/', function () {
    return view('login');
});
Route::get('/accueil', function () {
    return view('accueil');
});
Route::get('/menu_modulaire', function () {
    return view('menu_modulaire');
});

// Gestion de stocks
Route::get('/stock', function () {
    return view('stock.accueil');
});
Route::get('/stock/article/list/{num_page?}', 'ArticleController@list');
Route::get('/stock/article/create_update/{id_article?}','ArticleController@create_update');
Route::post('/stock/article/do_create_update','ArticleController@do_create_update'); // Traitememt du formulaire d'ajout/modification de produit

Route::get('/stock/fournisseur/list/{num_page?}', 'FournisseurController@list');
Route::get('/stock/fournisseur/create_update/{id_fournisseur?}', 'FournisseurController@create_update');
Route::post('/stock/fournisseur/do_create_update','FournisseurController@do_create_update'); // Traitememt du formulaire d'ajout/modification des fournisseurs

Route::get('/stock/commande/create_update/{id_commande?}', 'CommandeController@create_update');
Route::post('/stock/commande/do_create_update', 'CommandeController@do_create_update');
Route::get('/stock/commande/list/{num_page?}', 'CommandeController@list');
Route::get('/stock/commande/details/{id}', 'CommandeController@details');
Route::get('/stock/commande/itemspart', 'CommandeController@getItemsPart');

Route::get('/stock/livraison/create_update', function () {
    return view('stock.livraison.create_update');
});
Route::get('/stock/livraison/list', function () {
    return view('stock.livraison.list');
});
Route::get('/stock/livraison/details/{id}', function () {
    return view('stock.livraison.details');
});
Route::get('/stock/entree/create_update/', function () {
    return view('stock.entreesimple.create_update');
});
Route::get('/stock/stock/list', function () {
    return view('stock.stock.list');
});
Route::get('/stock/stock/create_update', function () {
    return view('stock.stock.create_update');
});
Route::get('/stock/stock/details/{id}', function () {
    return view('stock.stock.details');
});
Route::get('/stock/rebus/create_update', function () {
    return view('stock.rebus.create_update');
});
Route::get('/stock/rebus/list', function () {
    return view('stock.rebus.list');
});

// Gestion des operations du personnel
Route::get('/personnel', function () {
    return view('personnel.accueil');
});

// Parametrage
Route::get('/parametre', function () {
    return view('parametre.accueil');
});
Route::get('/parametre/utilisateur', function () {
    return view('parametre.utilisateur.list');
});
Route::get('/parametre/utilisateur/list', function () {
    return view('parametre.utilisateur.list');
});
Route::get('/parametre/utilisateur/create_update', function () {
    return view('parametre.utilisateur.create_update');
});
Route::get('/parametre/profil', function () {
    return view('parametre.profil.list');
});
Route::get('/parametre/profil/list', function () {
    return view('parametre.profil.list');
});
Route::get('/parametre/profil/create_update', function () {
    return view('parametre.profil.create_update');
});

// Tests
Route::get('/test', function () {
    return view('test');
});


Route::get('/page', function () {
    return view('page');
});

Route::get('/default', function () {
    return view('layouts.default');
});

Route::get('/blocks', function () {
    return view('layouts.blocks');
});

Route::get('/login', function () {
    return view('layouts.login');
});
