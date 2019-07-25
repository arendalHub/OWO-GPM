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


// AUTHENTIFICATION
Route::get('/', function () {
    return view('connexion');
});
Route::get('/accueil', function () {
    return view('accueil');
});
Route::get('/menu_modulaire', function () {
    return view('menu_modulaire');
});

Route::post('connexion', 'ConnexionController@connexion');
Route::get('/deconnexion', 'ConnexionController@deconnexion');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


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


// PERSONNEL
Route::get('/personnel', function () {
    return view('personnel.accueil');
});

//Employes
Route::get('/personnel/employe', 'Personnel\EmployeController@afficher');
Route::get('/personnel/employe/list', 'Personnel\EmployeController@afficher');
Route::get('/personnel/employe/create_update', 'Personnel\EmployeController@formulaire');
Route::get('/personnel/employe/create_update/{id}', 'Personnel\EmployeController@formulaire');
Route::post('add_employe', 'Personnel\EmployeController@ajouter');
Route::post('update_employe', 'Personnel\EmployeController@modifier');
Route::post('delete_employe', 'Personnel\EmployeController@supprimer');

//Zones
Route::get('/personnel/zone', 'Personnel\ZoneController@afficher');
Route::get('/personnel/zone/list', 'Personnel\ZoneController@afficher');
Route::get('/personnel/zone/create_update', 'Personnel\ZoneController@formulaire');
Route::get('/personnel/zone/create_update/{id}', 'Personnel\ZoneController@formulaire');
Route::post('add_zone', 'Personnel\ZoneController@ajouter');
Route::post('update_zone', 'Personnel\ZoneController@modifier');
Route::post('delete_zone', 'Personnel\ZoneController@supprimer');

//Sites
Route::get('/personnel/site', 'Personnel\SiteController@afficher');
Route::get('/personnel/site/list', 'Personnel\SiteController@afficher');
Route::get('/personnel/site/create_update', 'Personnel\SiteController@formulaire');
Route::get('/personnel/site/create_update/{id}', 'Personnel\SiteController@formulaire');
Route::post('add_site', 'Personnel\SiteController@ajouter');
Route::post('update_site', 'Personnel\SiteController@modifier');
Route::post('delete_site', 'Personnel\SiteController@supprimer');

//Sections
Route::get('/personnel/section', 'Personnel\SectionController@afficher');
Route::get('/personnel/section/list', 'Personnel\SectionController@afficher');
Route::get('/personnel/section/create_update', 'Personnel\SectionController@formulaire');
Route::get('/personnel/section/create_update/{id}', 'Personnel\SectionController@formulaire');
Route::post('add_section', 'Personnel\SectionController@ajouter');
Route::post('update_section', 'Personnel\SectionController@modifier');
Route::post('delete_section', 'Personnel\SectionController@supprimer');


// PARAMETRAGE
Route::get('/parametre', function () {
    return view('parametre.accueil');
});

//Profils
Route::get('/parametre/profil', 'Parametre\ProfilController@afficher');
Route::get('/parametre/profil/list', 'Parametre\ProfilController@afficher');
Route::get('/parametre/profil/create_update', 'Parametre\ProfilController@formulaire');
Route::get('/parametre/profil/create_update/{id}', 'Parametre\ProfilController@formulaire');
Route::post('add_profil', 'Parametre\ProfilController@ajouter');
Route::post('update_profil', 'Parametre\ProfilController@modifier');
Route::post('delete_profil', 'Parametre\ProfilController@supprimer');

//Utilisateurs
Route::get('/parametre/utilisateur', 'Parametre\UtilisateurController@afficher');
Route::get('/parametre/utilisateur/list', 'Parametre\UtilisateurController@afficher');
Route::get('/parametre/utilisateur/create_update', 'Parametre\UtilisateurController@formulaire');
Route::get('/parametre/utilisateur/create_update/{id}', 'Parametre\UtilisateurController@formulaire');
Route::post('add_utilisateur', 'Parametre\UtilisateurController@ajouter');
Route::post('update_utilisateur', 'Parametre\UtilisateurController@modifier');
Route::post('delete_utilisateur', 'Parametre\UtilisateurController@supprimer');

//Droits
Route::get('/parametre/droit', 'Parametre\DroitController@afficher');
Route::get('/parametre/droit/list', 'Parametre\DroitController@afficher');
Route::get('/parametre/droit/create_update', 'Parametre\DroitController@formulaire');
Route::get('/parametre/droit/create_update/{id}', 'Parametre\DroitController@formulaire');
Route::post('add_droit', 'Parametre\DroitController@ajouter');
Route::post('update_droit', 'Parametre\DroitController@modifier');
Route::post('delete_droit', 'Parametre\DroitController@supprimer');



//TESTS
Route::get('/test', function () {
    return view('test');
});


