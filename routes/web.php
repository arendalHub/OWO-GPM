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
Route::get('/stock/article/list', function () {
    return view('stock.article.list');
});
Route::get('/stock/article/create_update', function () {
    return view('stock.article.create_update');
});
Route::get('/stock/fournisseur/list', function () {
    return view('stock.fournisseur.list');
});
Route::get('/stock/fournisseur/create_update', function () {
    return view('stock.fournisseur.create_update');
});

// Gestion des operations du personnel
Route::get('/personnel', function () {
    return view('personnel.accueil');
});

// Parametrage
Route::get('/parametre', function () {
    return view('parametre.accueil');
});
Route::get('parametre/utilisateur/list', function () {
    return view('parametre.utilisateur.list');
});
Route::get('parametre/utilisateur/create_update', function () {
    return view('parametre.utilisateur.create_update');
});
Route::get('parametre/profil/list', function () {
    return view('parametre.profil.list');
});
Route::get('parametre/profil/create_update', function () {
    return view('parametre.profil.create_update');
});
