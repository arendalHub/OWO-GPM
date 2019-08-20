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

Route::middleware(['web'])->group(function () {

    //Connexion
    Route::post('connexion', 'Parametre\UtilisateurController@connexion');

    //Deconnexion
    Route::get('/',  'Parametre\UtilisateurController@deconnexion');
    Route::get('/deconnexion', 'Parametre\UtilisateurController@deconnexion');

    //Stock
    Route::middleware(['auth'])->group(function () {

        Route::get('/menu_modulaire', function () {
            return view('menu_modulaire');
        })/* ->middleware(VerifieConnexion::class) */;

        Route::get('/stock', 'StockController@accueil');
        Route::get('/stock/alert', 'StockController@alert');
        Route::get('/stock/critique', 'StockController@critique');
        Route::get('/stock/rupture', 'StockController@rupture');

        Route::get('/stock/affectation/create_update/{id_commande?}', 'Stock\AffectationController@create_update');
        Route::post('/stock/affectation/do_create_update', 'Stock\AffectationController@do_create_update');
        Route::get('/stock/affectation/list/{num_page?}', 'Stock\AffectationController@list');
        Route::get('/stock/affectation/details/{id_affectation}', 'Stock\AffectationController@details');
        Route::get('/stock/affectation/itemspart', 'Stock\AffectationController@getItemsPart');

        Route::get('/stock/article/list/{num_page?}', 'ArticleController@list');
        Route::get('/stock/article/details/{item_id}', 'ArticleController@details');
        Route::get('/stock/article/delete/{item_id}', 'ArticleController@softDelete');
        Route::get('/stock/article/create_update/{id_article?}', 'ArticleController@create_update');
        Route::post('/stock/article/do_create_update', 'ArticleController@do_create_update');
        Route::get('/stock/article/print_list', 'ArticleController@print_list');
        Route::get('/stock/article/print_details/{id_art}', 'ArticleController@print_details');

        Route::get('/stock/commande/create_update/{id_commande?}', 'CommandeController@create_update');
        Route::get('/stock/commande/list/{num_page?}', 'CommandeController@list');
        Route::get('/stock/commande/details/{id}', 'CommandeController@details');
        Route::get('/stock/commande/delete/{id}', 'CommandeController@delete');
        Route::get('/stock/commande/itemspart', 'CommandeController@getItemsPart');
        Route::post('/stock/commande/do_create_update', 'CommandeController@do_create_update');
        Route::get('/stock/commande/print_list', 'CommandeController@print_list');
        Route::get('/stock/commande/print_details/{id}', 'CommandeController@print_details');

        Route::get('/stock/emplacement/list/', 'Stock\EmplacementController@list');
        Route::get('/stock/emplacement/add_box', 'Stock\EmplacementController@add_box');
        Route::get('/stock/emplacement/add_etagere', 'Stock\EmplacementController@add_etagere');
        Route::get('/stock/emplacement/add_rangee', 'Stock\EmplacementController@add_rangee');

        Route::get('/stock/entree/create_update/', 'Stock\EntreeController@create_update');
        Route::get('/stock/entree/list/{page_num?}', 'Stock\EntreeController@list');
        Route::get('/stock/entree/details/{id}', 'Stock\EntreeController@details');
        Route::post('/stock/entree/do_create_update', 'Stock\EntreeController@do_create_update');

        Route::get('/stock/famille/list/', 'Stock\FamilleController@list');
        Route::get('/stock/famille/add_famille', 'Stock\FamilleController@add_famille');

        Route::get('/stock/fournisseur/list/{num_page?}', 'FournisseurController@list');
        Route::get('/stock/fournisseur/create_update/{id_fournisseur?}', 'FournisseurController@create_update');
        Route::post('/stock/fournisseur/do_create_update','FournisseurController@do_create_update');
        Route::match(['get','post'],'/stock/fournisseur/delete/{id_fournisseur?}','FournisseurController@delete');

        Route::get('/stock/livraison/create_update', 'LivraisonController@create_update');
        Route::get('/stock/livraison/list', 'LivraisonController@list');
        Route::get('/stock/livraison/items/{id}', 'LivraisonController@getItemsPart');
        Route::get('/stock/livraison/details/{id}', 'LivraisonController@details');
        Route::post('/stock/livraison/do_create_update', 'LivraisonController@do_create_update');
        Route::get('/stock/livraison/print_list', 'LivraisonController@print_list');
        Route::get('/stock/livraison/print_details/{id}', 'LivraisonController@print_details');

        Route::get('/stock/magasin/list/{num_page?}', 'Stock\MagasinController@list');
        Route::get('/stock/magasin/create_update/{id_fournisseur?}', 'Stock\MagasinController@create_update');
        Route::post('/stock/magasin/do_create_update','Stock\MagasinController@do_create_update');
        Route::match(['get','post'],'/stock/magasin/delete/{id_magasin?}','Stock\MagasinController@delete');

        Route::get('/stock/rebus/create_update', "Stock\RebusController@create_update");
        Route::get('/stock/rebus/list/{page_num?}', "Stock\RebusController@list");
        Route::post('/stock/rebus/do_create_update', "Stock\RebusController@do_create_update");

        Route::get('/stock/stock/create_update', function () {
            return view('stock.stock.create_update');
        });
        Route::get('/stock/stock/details/{id}', function () {
            return view('stock.stock.details');
        });
        Route::get('/stock/stock/list', 'StockController@list');
        Route::get('/stock/stock/print_list', 'StockController@print_list');
    });
});

// PERSONNEL
Route::get('/personnel', function () {
    return view('personnel.accueil');
})->middleware(VerifieConnexion::class);

//Employes
Route::get('/personnel/employe', 'Personnel\EmployeController@afficher')->middleware(VerifieConnexion::class);
Route::get('/personnel/employe/list', 'Personnel\EmployeController@afficher')->middleware(VerifieConnexion::class);
Route::get('/personnel/employe/affectation', 'Personnel\EmployeController@affectation')->middleware(VerifieConnexion::class);
Route::get('/personnel/employe/create_update', 'Personnel\EmployeController@formulaire')->middleware(VerifieConnexion::class);
Route::get('/personnel/employe/create_update/{id}', 'Personnel\EmployeController@formulaire')->middleware(VerifieConnexion::class);
Route::post('add_employe', 'Personnel\EmployeController@ajouter');
Route::post('update_employe', 'Personnel\EmployeController@modifier');
Route::post('delete_employe', 'Personnel\EmployeController@supprimer');
Route::post('add_affectation', 'Personnel\EmployeController@ajouter_affectation');
Route::post('update_affectation', 'Personnel\EmployeController@modifier_affectation');

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

