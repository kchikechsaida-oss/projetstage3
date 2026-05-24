<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\AchatContoller;
use App\Http\Controllers\PanierController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', [ProduitController::class,'index'])
    ->name('home');

/*
|--------------------------------------------------------------------------
| CLIENT
|--------------------------------------------------------------------------
*/

Route::get('/login',[clientController::class,'showLogin'])
    ->name('login');

Route::post('/login',
    [clientController::class,'login']);

Route::get('/register',
    [clientController::class,'showRegister'])
    ->name('register');

Route::post('/register',
    [clientController::class,'register']);

Route::post('/logout',
    [clientController::class,'logout'])
    ->name('logout');

Route::get('/CompteClient',
    [clientController::class,'compte'])
    ->name('client.compte');


/*
|--------------------------------------------------------------------------
| PRODUITS
|--------------------------------------------------------------------------
*/

Route::get('/catalogue',
    [ProduitController::class,'index'])
    ->name('catalogue');

Route::get('/produit/{id}',
    [ProduitController::class,'show'])
    ->name('produit.show');

Route::get('/categorie',
    [ProduitController::class,'parCategorie'])
    ->name('categorie');

Route::get('/search',
    [ProduitController::class,'search'])
    ->name('produit.search');

Route::get('/produits',
    [ProduitController::class,'index'])
    ->name('produits.index');


/*
|--------------------------------------------------------------------------
| PANIER
|--------------------------------------------------------------------------
*/

Route::get('/panier',
    [PanierController::class,'index'])
    ->name('panier');

Route::get('/panier/ajouter/{id}',
    [PanierController::class,'ajouter'])
    ->name('panier.ajouter');

Route::get('/panier/supprimer/{id}',
    [PanierController::class,'supprimer'])
    ->name('panier.supprimer');

Route::get('/panier/vider',
    [PanierController::class,'vider'])
    ->name('panier.vider');


/*
|--------------------------------------------------------------------------
| COMMANDES
|--------------------------------------------------------------------------
*/

Route::get('/livraison',
    [CommandeController::class,'index'])
    ->name('livraison');

Route::post('/commande/store',
    [CommandeController::class,'store'])
    ->name('commande.store');

Route::get('/historique',
    [CommandeController::class,'historique'])
    ->name('historique');

Route::get('/facture/{id}',
    [CommandeController::class,'facture'])
    ->name('facture');


/*
|--------------------------------------------------------------------------
| ACHATS
|--------------------------------------------------------------------------
*/

// Route::post('/acheter',
//     [AchatContoller::class,'acheter']);

// Route::get('/points/{id}',
//     [AchatContoller::class,'points']);

// Route::get('/historique-achats',
//     [AchatContoller::class,'historique']);


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/dashboard',
    [AdminController::class,'dashboard'])
    ->name('dashboard');

Route::get('/admin/clients',
    [AdminController::class,'clients']);

Route::get('/admin/commandes',
    [AdminController::class,'commandes']);

Route::post('/admin/statut/{id}',
    [AdminController::class,'updateStatut']);

Route::get('/admin/promotions',
    [AdminController::class,'promotions']);

Route::post('/admin/promotion',
    [AdminController::class,'ajouterPromotion']);

Route::delete('/admin/promotion/{id}',
    [AdminController::class,'supprimerPromotion']);

Route::get('/promotion',
    [AdminController::class,'promotionPublic'])
    ->name('promotion');

Route::get('/admin/logout',
    [AdminController::class,'logout']);


/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/

Route::view('/contact','contact')
    ->name('contact');

    Route::get('/catalogue',
    [ProduitController::class,'index'])
    ->name('catalogue');

Route::get('/promotion',
    [AdminController::class,'promotionPublic'])
    ->name('promotion');

    Route::post('/compte/modifier',
    [clientController::class,'modifierProfil'])
    ->name('client.modifierProfil');

    Route::get('/merci', function() {
    return view('merci');
})->name('merci');

Route::get('/facture/{id}',
    [CommandeController::class,'facture'])
    ->name('facture');

    // قبل
Route::get('/facture/{id}',
    [CommandeController::class,'facture'])
    ->name('facture');

// بعد
Route::get('/facture/{id}',
    [CommandeController::class,'facture'])
    ->name('commande.facture');

    Route::get('/admin/login', [AdminController::class,'showLogin']);
Route::post('/admin/login', [AdminController::class,'login']);

// قبل
Route::get('/dashboard',
    [AdminController::class,'dashboard'])
    ->name('dashboard');

Route::get('/admin/clients',
    [AdminController::class,'clients']);

Route::get('/admin/commandes',
    [AdminController::class,'commandes']);

Route::post('/admin/statut/{id}',
    [AdminController::class,'updateStatut']);

Route::get('/admin/promotions',
    [AdminController::class,'promotions']);

Route::post('/admin/promotion',
    [AdminController::class,'ajouterPromotion']);

Route::delete('/admin/promotion/{id}',
    [AdminController::class,'supprimerPromotion']);

Route::get('/admin/logout',
    [AdminController::class,'logout']);

// بعد
Route::get('/dashboard',
    [AdminController::class,'dashboard'])
    ->name('admin.dashboard');

Route::get('/admin/clients',
    [AdminController::class,'clients'])
    ->name('admin.clients');

Route::get('/admin/commandes',
    [AdminController::class,'commandes'])
    ->name('admin.commandes');

// Route::post('/admin/statut/{id}',
//     [AdminController::class,'updateStatut'])
//     ->name('admin.statut');

Route::get('/admin/promotions',
    [AdminController::class,'promotions'])
    ->name('admin.promotions');

Route::post('/admin/promotion',
    [AdminController::class,'ajouterPromotion'])
    ->name('admin.promotion');

Route::delete('/admin/promotion/{id}',
    [AdminController::class,'supprimerPromotion'])
    ->name('admin.promotion.delete');

Route::get('/admin/logout',
    [AdminController::class,'logout'])
    ->name('admin.logout');
    Route::get('/admin/achats',
    [AdminController::class,'achats'])
    ->name('admin.achats');

    Route::post('/admin/statut/{id}',
    [AdminController::class,'updateStatut'])
    ->name('admin.commandes.statut');

    Route::get('/admin/clients/{id}/edit',
    [AdminController::class,'editClient'])
    ->name('admin.clients.edit');

Route::post('/admin/clients/{id}/update',
    [AdminController::class,'updateClient'])
    ->name('admin.clients.update');

Route::get('/admin/clients/{id}/destroy',
    [AdminController::class,'destroyClient'])
    ->name('admin.clients.destroy');

    Route::post('/admin/promotion',
    [AdminController::class,'ajouterPromotion'])
    ->name('admin.promotions.ajouter');

Route::delete('/admin/promotion/{id}',
    [AdminController::class,'supprimerPromotion'])
    ->name('admin.promotions.delete');

    Route::get('/admin/promotion/{id}/supprimer',
    [AdminController::class,'supprimerPromotion'])
    ->name('admin.promotions.supprimer');