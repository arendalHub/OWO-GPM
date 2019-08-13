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

use App\Http\Middleware\VerifieConnexion;

// AUTHENTIFICATION

//Deconnexion
Route::get('/',  'Parametre\UtilisateurController@deconnexion');
Route::get('/deconnexion', 'Parametre\UtilisateurController@deconnexion');

//Connexion
Route::post('connexion', 'Parametre\UtilisateurController@connexion');

//Menu
Route::get('/menu_modulaire', function () {
    return view('menu_modulaire');
})->middleware(VerifieConnexion::class);


// Gestion de stocks
Route::get('/stock', function () {
    return view('stock.accueil');
})->middleware(VerifieConnexion::class);
Route::get('/stock/article/list/{num_page?}', 'ArticleController@list');
Route::get('/stock/article/create_update/{id_article?}','ArticleController@create_update');
Route::post('/stock/article/do_create_update','ArticleController@do_create_update'); // Traitememt du formulaire d'ajout/modification de produit
Route::get('/stock/article/details/{item_id}','ArticleController@details');

Route::get('/stock/fournisseur/list/{num_page?}', 'FournisseurController@list');
Route::get('/stock/fournisseur/create_update/{id_fournisseur?}', 'FournisseurController@create_update');
Route::post('/stock/fournisseur/do_create_update','FournisseurController@do_create_update'); // Traitememt du formulaire d'ajout/modification des fournisseurs

Route::get('/stock/commande/create_update/{id_commande?}', 'CommandeController@create_update');
Route::post('/stock/commande/do_create_update', 'CommandeController@do_create_update');
Route::get('/stock/commande/list/{num_page?}', 'CommandeController@list');
Route::get('/stock/commande/details/{id}', 'CommandeController@details');
Route::get('/stock/commande/itemspart', 'CommandeController@getItemsPart');

Route::get('/stock/livraison/create_update', 'LivraisonController@create_update');
Route::post('/stock/livraison/do_create_update', 'LivraisonController@do_create_update');
Route::get('/stock/livraison/list','LivraisonController@list');
Route::get('/stock/livraison/items/{id}','LivraisonController@getItemsPart');

Route::get('/stock/livraison/details/{id}', 'LivraisonController@details');
Route::get('/stock/entree/create_update/', function () {
    return view('stock.entreesimple.create_update');
});
Route::get('/stock/stock/list/{page_num?}', 'StockController@list');
Route::get('/stock/stock/create_update', function () {
    return view('stock.stock.create_update');
});
Route::get('/stock/stock/details/{id}', function () {
    return view('stock.stock.details');
});
Route::get('/stock/rebus/create_update', "Stock\RebusController@create_update") ;
Route::post('/stock/rebus/do_create_update', "Stock\RebusController@do_create_update") ;
Route::get('/stock/rebus/list/{page_num?}', "Stock\RebusController@list") ;


// PERSONNEL
Route::get('/personnel', function () {
    return view('personnel.accueil');
})->middleware(VerifieConnexion::class);

//Employes
Route::get('/personnel/employe', 'Personnel\EmployeController@afficher')->middleware(VerifieConnexion::class);
Route::get('/personnel/employe/list', 'Personnel\EmployeController@afficher')->middleware(VerifieConnexion::class);
Route::get('/personnel/employe/create_update', 'Personnel\EmployeController@formulaire')->middleware(VerifieConnexion::class);
Route::get('/personnel/employe/create_update/{id}', 'Personnel\EmployeController@formulaire')->middleware(VerifieConnexion::class);
Route::post('add_employe', 'Personnel\EmployeController@ajouter');
Route::post('update_employe', 'Personnel\EmployeController@modifier');
Route::post('delete_employe', 'Personnel\EmployeController@supprimer');

//Zones
Route::get('/personnel/zone', 'Personnel\ZoneController@afficher')->middleware(VerifieConnexion::class);
Route::get('/personnel/zone/list', 'Personnel\ZoneController@afficher')->middleware(VerifieConnexion::class);
Route::get('/personnel/zone/create_update', 'Personnel\ZoneController@formulaire')->middleware(VerifieConnexion::class);
Route::get('/personnel/zone/create_update/{id}', 'Personnel\ZoneController@formulaire')->middleware(VerifieConnexion::class);
Route::post('add_zone', 'Personnel\ZoneController@ajouter');
Route::post('update_zone', 'Personnel\ZoneController@modifier');
Route::post('delete_zone', 'Personnel\ZoneController@supprimer');

//Sections
Route::get('/personnel/section', 'Personnel\SectionController@afficher')->middleware(VerifieConnexion::class);
Route::get('/personnel/section/list', 'Personnel\SectionController@afficher')->middleware(VerifieConnexion::class);
Route::get('/personnel/section/create_update', 'Personnel\SectionController@formulaire')->middleware(VerifieConnexion::class);
Route::get('/personnel/section/create_update/{id}', 'Personnel\SectionController@formulaire')->middleware(VerifieConnexion::class);
Route::post('add_section', 'Personnel\SectionController@ajouter');
Route::post('update_section', 'Personnel\SectionController@modifier');
Route::post('delete_section', 'Personnel\SectionController@supprimer');

//Sites
Route::get('/personnel/site', 'Personnel\SiteController@afficher')->middleware(VerifieConnexion::class);
Route::get('/personnel/site/list', 'Personnel\SiteController@afficher')->middleware(VerifieConnexion::class);
Route::get('/personnel/site/create_update', 'Personnel\SiteController@formulaire')->middleware(VerifieConnexion::class);
Route::get('/personnel/site/create_update/{id}', 'Personnel\SiteController@formulaire')->middleware(VerifieConnexion::class);
Route::post('add_site', 'Personnel\SiteController@ajouter');
Route::post('update_site', 'Personnel\SiteController@modifier');
Route::post('delete_site', 'Personnel\SiteController@supprimer');


// PARAMETRAGE
Route::get('/parametre', function () {
    return view('parametre.accueil');
})->middleware(VerifieConnexion::class);

//Profils
Route::get('/parametre/profil', 'Parametre\ProfilController@afficher')->middleware(VerifieConnexion::class);
Route::get('/parametre/profil/list', 'Parametre\ProfilController@afficher')->middleware(VerifieConnexion::class);
Route::get('/parametre/profil/create_update', 'Parametre\ProfilController@formulaire')->middleware(VerifieConnexion::class);
Route::get('/parametre/profil/create_update/{id}', 'Parametre\ProfilController@formulaire')->middleware(VerifieConnexion::class);
Route::post('add_profil', 'Parametre\ProfilController@ajouter');
Route::post('update_profil', 'Parametre\ProfilController@modifier');
Route::post('delete_profil', 'Parametre\ProfilController@supprimer');

//Utilisateurs
Route::get('/parametre/utilisateur', 'Parametre\UtilisateurController@afficher')->middleware(VerifieConnexion::class);
Route::get('/parametre/utilisateur/list', 'Parametre\UtilisateurController@afficher')->middleware(VerifieConnexion::class);
Route::get('/parametre/utilisateur/create_update', 'Parametre\UtilisateurController@formulaire')->middleware(VerifieConnexion::class);
Route::get('/parametre/utilisateur/create_update/{id}', 'Parametre\UtilisateurController@formulaire')->middleware(VerifieConnexion::class);
Route::post('add_utilisateur', 'Parametre\UtilisateurController@ajouter');
Route::post('update_utilisateur', 'Parametre\UtilisateurController@modifier');
Route::post('delete_utilisateur', 'Parametre\UtilisateurController@supprimer');

//Droits
Route::get('/parametre/droit', 'Parametre\DroitController@afficher')->middleware(VerifieConnexion::class);
Route::get('/parametre/droit/list', 'Parametre\DroitController@afficher')->middleware(VerifieConnexion::class);
Route::get('/parametre/droit/create_update', 'Parametre\DroitController@formulaire')->middleware(VerifieConnexion::class);
Route::get('/parametre/droit/create_update/{id}', 'Parametre\DroitController@formulaire')->middleware(VerifieConnexion::class);
Route::post('add_droit', 'Parametre\DroitController@ajouter');
Route::post('update_droit', 'Parametre\DroitController@modifier');
Route::post('delete_droit', 'Parametre\DroitController@supprimer');

//Societe
Route::get('/parametre/societe', 'Parametre\SocieteController@formulaire')->middleware(VerifieConnexion::class);
Route::get('/parametre/societe/edit', 'Parametre\SocieteController@formulaire')->middleware(VerifieConnexion::class);
Route::get('/parametre/societe/edit/{id}', 'Parametre\SocieteController@formulaire')->middleware(VerifieConnexion::class);
Route::post('edit_societe', 'Parametre\SocieteController@editer');


//TESTS
Route::get('/test', function () {
    return view('test');
});

