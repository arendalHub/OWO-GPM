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
Route::get('/stock/article', function () {
    return view('stock.article.list');
});
Route::get('/stock/article/list', function () {
    return view('stock.article.list');
});
Route::get('/stock/article/create_update', function () {
    return view('stock.article.create_update');
});
Route::get('/stock/fournisseur/list', function () {
    return view('stock.fournisseur.list');
});
Route::get('/stock/fournisseur/list', function () {
    return view('stock.fournisseur.list');
});
Route::get('/stock/fournisseur/create_update', function () {
    return view('stock.fournisseur.create_update');
});
Route::get('/stock/commande/create_update', function () {
    return view('stock.commande.create_update');
});
Route::get('/stock/commande/list', function () {
    return view('stock.commande.list');
});

Route::get('/stock/commande/details/{id}', function () {
    return view('stock.commande.details');
});

Route::get('/stock/livraison/create_update', function () {
    return view('stock.livraison.create_update');
});
Route::get('/stock/livraison/list', function () {
    return view('stock.livraison.list');
});
Route::get('/stock/livraison/details/{id}', function () {
    return view('stock.livraison.details');
});


// Gestion des operations du personnel
Route::get('/personnel', function () {
    return view('personnel.accueil');
});

// Parametrage
Route::get('/Parametre', function () {
    return view('Parametre.accueil');
});
Route::get('/Parametre/utilisateur', function () {
    return view('Parametre.utilisateur.list');
});
Route::get('/Parametre/utilisateur/list', function () {
    return view('Parametre.utilisateur.list');
});
Route::get('/Parametre/utilisateur/create_update', function () {
    return view('Parametre.utilisateur.create_update');
});
Route::get('/Parametre/profil', function () {
    return view('Parametre.profil.list');
});
Route::get('/Parametre/profil/list', function () {
    return view('Parametre.profil.list');
});
Route::get('/Parametre/profil/create_update', function () {
    return view('Parametre.profil.create_update');
});


// Tests
Route::get('/test', function () {
    return view('test');
});
