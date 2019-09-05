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

//Connexion
Route::post('connexion', 'Parametre\UtilisateurController@connexion');

//Deconnexion
Route::get('/',  'Parametre\UtilisateurController@deconnexion');
Route::get('/deconnexion', 'Parametre\UtilisateurController@deconnexion')->middleware(VerifieConnexion::class);

//Stock

Route::get('/menu_modulaire', function () {
    return view('menu_modulaire');
})->middleware(VerifieConnexion::class);

Route::get('/stock', 'StockController@accueil')->middleware(VerifieConnexion::class);
Route::get('/stock/alert', 'StockController@alert')->middleware(VerifieConnexion::class);
Route::get('/stock/critique', 'StockController@critique')->middleware(VerifieConnexion::class);
Route::get('/stock/rupture', 'StockController@rupture')->middleware(VerifieConnexion::class);

Route::get('/stock/affectation/create_update/{id_commande?}', 'Stock\AffectationController@create_update')->middleware(VerifieConnexion::class);
Route::post('/stock/affectation/do_create_update', 'Stock\AffectationController@do_create_update')->middleware(VerifieConnexion::class);
Route::get('/stock/affectation/list/{num_page?}', 'Stock\AffectationController@list')->middleware(VerifieConnexion::class);
Route::get('/stock/affectation/details/{id_affectation}', 'Stock\AffectationController@details')->middleware(VerifieConnexion::class);
Route::get('/stock/affectation/itemspart', 'Stock\AffectationController@getItemsPart')->middleware(VerifieConnexion::class);
Route::get('/stock/affectation/print_list', 'CommandeController@print_list')->middleware(VerifieConnexion::class);
Route::get('/stock/affectation/print_details/{id}', 'CommandeController@print_details')->middleware(VerifieConnexion::class);

Route::get('/stock/article/list/{req?}', 'ArticleController@list')->middleware(VerifieConnexion::class);
Route::get('/stock/article/details/{item_id}', 'ArticleController@details')->middleware(VerifieConnexion::class);
Route::get('/stock/article/delete/{item_id}', 'ArticleController@softDelete')->middleware(VerifieConnexion::class);
Route::get('/stock/article/create_update/{id_article?}', 'ArticleController@create_update')->middleware(VerifieConnexion::class);
Route::post('/stock/article/do_create_update', 'ArticleController@do_create_update')->middleware(VerifieConnexion::class);
Route::get('/stock/article/print_list', 'ArticleController@print_list')->middleware(VerifieConnexion::class);
Route::get('/stock/article/print_details/{id_art}', 'ArticleController@print_details')->middleware(VerifieConnexion::class);

Route::get('/stock/commande/create_update/{id_commande?}', 'CommandeController@create_update')->middleware(VerifieConnexion::class);
Route::get('/stock/commande/list/{num_page?}', 'CommandeController@list')->middleware(VerifieConnexion::class);
Route::get('/stock/commande/details/{id}', 'CommandeController@details')->middleware(VerifieConnexion::class);
Route::get('/stock/commande/delete/{id}', 'CommandeController@delete')->middleware(VerifieConnexion::class);
Route::get('/stock/commande/itemspart', 'CommandeController@getItemsPart')->middleware(VerifieConnexion::class);
Route::post('/stock/commande/do_create_update', 'CommandeController@do_create_update')->middleware(VerifieConnexion::class);
Route::get('/stock/commande/print_list', 'CommandeController@print_list')->middleware(VerifieConnexion::class);
Route::get('/stock/commande/print_details/{id}', 'CommandeController@print_details')->middleware(VerifieConnexion::class);

Route::get('/stock/emplacement/list/', 'Stock\EmplacementController@list')->middleware(VerifieConnexion::class);
Route::get('/stock/emplacement/add_box', 'Stock\EmplacementController@add_box')->middleware(VerifieConnexion::class);
Route::get('/stock/emplacement/add_etagere', 'Stock\EmplacementController@add_etagere')->middleware(VerifieConnexion::class);
Route::get('/stock/emplacement/add_rangee', 'Stock\EmplacementController@add_rangee')->middleware(VerifieConnexion::class);

Route::get('/stock/entree/create_update/', 'Stock\EntreeController@create_update')->middleware(VerifieConnexion::class);
Route::get('/stock/entree/list/{page_num?}', 'Stock\EntreeController@list')->middleware(VerifieConnexion::class);
Route::get('/stock/entree/details/{id}', 'Stock\EntreeController@details')->middleware(VerifieConnexion::class);
Route::post('/stock/entree/do_create_update', 'Stock\EntreeController@do_create_update')->middleware(VerifieConnexion::class);
Route::get('/stock/entree/print_list', 'Stock\EntreeController@print_list')->middleware(VerifieConnexion::class);
Route::get('/stock/entree/print_details/{id}', 'Stock\EntreeController@print_details')->middleware(VerifieConnexion::class);

Route::get('/stock/famille/list/', 'Stock\FamilleController@list')->middleware(VerifieConnexion::class);
Route::get('/stock/famille/delete/{id}', 'Stock\FamilleController@delete')->middleware(VerifieConnexion::class);
Route::get('/stock/famille/add_famille', 'Stock\FamilleController@add_famille')->middleware(VerifieConnexion::class);
Route::get('/stock/famille/modif_famille/{id_famille}', 'Stock\FamilleController@modif_famille')->middleware(VerifieConnexion::class);

Route::get('/stock/fournisseur/list/{num_page?}', 'FournisseurController@list')->middleware(VerifieConnexion::class);
Route::get('/stock/fournisseur/create_update/{id_fournisseur?}', 'FournisseurController@create_update')->middleware(VerifieConnexion::class);
Route::post('/stock/fournisseur/do_create_update', 'FournisseurController@do_create_update')->middleware(VerifieConnexion::class);
Route::match(['get', 'post'], '/stock/fournisseur/delete/{id_fournisseur?}', 'FournisseurController@delete')->middleware(VerifieConnexion::class);
Route::get('/stock/fournisseur/print_list', 'FournisseurController@print_list')->middleware(VerifieConnexion::class);
Route::get('/stock/fournisseur/print_details/{id}', 'FournisseurController@print_details')->middleware(VerifieConnexion::class);

Route::get('/stock/livraison/create_update', 'LivraisonController@create_update')->middleware(VerifieConnexion::class);
Route::get('/stock/livraison/list', 'LivraisonController@list')->middleware(VerifieConnexion::class);
Route::get('/stock/livraison/items/{id}', 'LivraisonController@getItemsPart')->middleware(VerifieConnexion::class);
Route::get('/stock/livraison/details/{id}', 'LivraisonController@details')->middleware(VerifieConnexion::class);
Route::post('/stock/livraison/do_create_update', 'LivraisonController@do_create_update')->middleware(VerifieConnexion::class);
Route::get('/stock/livraison/print_list', 'LivraisonController@print_list')->middleware(VerifieConnexion::class);
Route::get('/stock/livraison/print_details/{id}', 'LivraisonController@print_details')->middleware(VerifieConnexion::class);

Route::get('/stock/magasin/list/{num_page?}', 'Stock\MagasinController@list')->middleware(VerifieConnexion::class);
Route::get('/stock/magasin/create_update/{id_fournisseur?}', 'Stock\MagasinController@create_update')->middleware(VerifieConnexion::class);
Route::post('/stock/magasin/do_create_update', 'Stock\MagasinController@do_create_update')->middleware(VerifieConnexion::class);
Route::match(['get', 'post'], '/stock/magasin/delete/{id_magasin?}', 'Stock\MagasinController@delete')->middleware(VerifieConnexion::class);
Route::get('/stock/magasin/print_list', 'CommandeController@print_list')->middleware(VerifieConnexion::class);
Route::get('/stock/magasin/print_details/{id}', 'CommandeController@print_details')->middleware(VerifieConnexion::class);

Route::get('/stock/rebus/create_update', "Stock\RebusController@create_update")->middleware(VerifieConnexion::class);
Route::get('/stock/rebus/list/{page_num?}', "Stock\RebusController@list")->middleware(VerifieConnexion::class);
Route::post('/stock/rebus/do_create_update', "Stock\RebusController@do_create_update")->middleware(VerifieConnexion::class);
Route::get('/stock/rebus/print_list', 'Stock\RebusController@print_list')->middleware(VerifieConnexion::class);

Route::get('/stock/stock/create_update', function () {
    return view('stock.stock.create_update');
})->middleware(VerifieConnexion::class);
Route::get('/stock/stock/details/{id}', function () {
    return view('stock.stock.details');
})->middleware(VerifieConnexion::class);
Route::get('/stock/stock/list', 'StockController@list')->middleware(VerifieConnexion::class);
Route::get('/stock/stock/print_list', 'StockController@print_list')->middleware(VerifieConnexion::class);

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
//Etat
Route::get('/personnel/employe/print_list', 'Personnel\EmployeController@print_list')->middleware(VerifieConnexion::class);
Route::get('/personnel/employe/print_details/{id}', 'Personnel\EmployeController@print_details')->middleware(VerifieConnexion::class);
//Affectation
Route::get('/personnel/employe/affectation', 'Personnel\EmployeController@affectation')->middleware(VerifieConnexion::class);
Route::post('add_affectation', 'Personnel\EmployeController@ajouter_affectation');
Route::post('cancel_affectation', 'Personnel\EmployeController@annuler_affectation');
//Tri
Route::get('sort_employe', 'Personnel\EmployeController@afficher');
Route::post('sort_employe', 'Personnel\EmployeController@trier');

//Zones
Route::get('/personnel/zone', 'Personnel\ZoneController@afficher')->middleware(VerifieConnexion::class);
Route::get('/personnel/zone/list', 'Personnel\ZoneController@afficher')->middleware(VerifieConnexion::class);
Route::get('/personnel/zone/create_update', 'Personnel\ZoneController@formulaire')->middleware(VerifieConnexion::class);
Route::get('/personnel/zone/create_update/{id}', 'Personnel\ZoneController@formulaire')->middleware(VerifieConnexion::class);
Route::post('add_zone', 'Personnel\ZoneController@ajouter');
Route::post('update_zone', 'Personnel\ZoneController@modifier');
Route::post('delete_zone', 'Personnel\ZoneController@supprimer');
//Etat
Route::get('/personnel/zone/print_list', 'Personnel\ZoneController@print_list')->middleware(VerifieConnexion::class);

//Sections
Route::get('/personnel/section', 'Personnel\SectionController@afficher')->middleware(VerifieConnexion::class);
Route::get('/personnel/section/list', 'Personnel\SectionController@afficher')->middleware(VerifieConnexion::class);
Route::get('/personnel/section/create_update', 'Personnel\SectionController@formulaire')->middleware(VerifieConnexion::class);
Route::get('/personnel/section/create_update/{id}', 'Personnel\SectionController@formulaire')->middleware(VerifieConnexion::class);
Route::post('add_section', 'Personnel\SectionController@ajouter');
Route::post('update_section', 'Personnel\SectionController@modifier');
Route::post('delete_section', 'Personnel\SectionController@supprimer');
//Etat
Route::get('/personnel/section/print_list', 'Personnel\SectionController@print_list')->middleware(VerifieConnexion::class);

//Sites
Route::get('/personnel/site', 'Personnel\SiteController@afficher')->middleware(VerifieConnexion::class);
Route::get('/personnel/site/list', 'Personnel\SiteController@afficher')->middleware(VerifieConnexion::class);
Route::get('/personnel/site/create_update', 'Personnel\SiteController@formulaire')->middleware(VerifieConnexion::class);
Route::get('/personnel/site/create_update/{id}', 'Personnel\SiteController@formulaire')->middleware(VerifieConnexion::class);
Route::post('add_site', 'Personnel\SiteController@ajouter');
Route::post('update_site', 'Personnel\SiteController@modifier');
Route::post('delete_site', 'Personnel\SiteController@supprimer');
//Etat
Route::get('/personnel/site/print_list', 'Personnel\SiteController@print_list')->middleware(VerifieConnexion::class);


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
//Etat
Route::get('/parametre/profil/print_list', 'Parametre\ProfilController@print_list')->middleware(VerifieConnexion::class);

//Utilisateurs
Route::get('/parametre/utilisateur', 'Parametre\UtilisateurController@afficher')->middleware(VerifieConnexion::class);
Route::get('/parametre/utilisateur/list', 'Parametre\UtilisateurController@afficher')->middleware(VerifieConnexion::class);
Route::get('/parametre/utilisateur/create_update', 'Parametre\UtilisateurController@formulaire')->middleware(VerifieConnexion::class);
Route::get('/parametre/utilisateur/create_update/{id}', 'Parametre\UtilisateurController@formulaire')->middleware(VerifieConnexion::class);
Route::post('add_utilisateur', 'Parametre\UtilisateurController@ajouter');
Route::post('update_utilisateur', 'Parametre\UtilisateurController@modifier');
Route::post('delete_utilisateur', 'Parametre\UtilisateurController@supprimer');
Route::post('enable_disable_utilisateur', 'Parametre\UtilisateurController@activer_desactiver');
//Etat
Route::get('/parametre/utilisateur/print_list', 'Parametre\UtilisateurController@print_list')->middleware(VerifieConnexion::class);

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

