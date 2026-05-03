  <?php

// use Illuminate\Support\Facades\Route;
// use Illuminate\View\View;
// use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\CommandeController;
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/footer', function () {
//     return view('Master.footer');
// });

// Route::get('/menu', function () {
//     return view('Master.menu');
// });




// Route::get('/contact', [RegisterController::class,'index']);
// Route::post('/contact', [RegisterController::class,'store'])->name('contact.store');

// // Route::post('/login', [RegisterController::class,'login'])->name('login');

// Route::get('/catalogue', function () {
//     return view('catalogue');
// });
 

// Route::get('/Promotion',function(){
//     return view('Promotion');
// });


// Route::get('/contact',function(){
//     return view('contact');
// });

// //produit
 

// // Route::get('/catalogue', ['App\Http\Controllers\ProduitController'::class, 'index']);

// // Route::get('/ajouter', ['App\Http\Controllers\ProduitController'::class, 'create']);
// // Route::post('/ajouter', ['App\Http\Controllers\ProduitController'::class, 'store']);

// // Route::get('/supprimer/{id}', ['App\Http\Controllers\ProduitController'::class, 'delete']);

// // Route::get('/modifier/{id}', ['App\Http\Controllers\ProduitController'::class, 'edit']); // afficher form
// // Route::put('/modifier/{id}', ['App\Http\Controllers\ProduitController'::class, 'update']); // update

// //client
// Route::get('/catalogueC', [App\Http\Controllers\clientController::class, 'index']);
// Route::get('/ajouterC', [App\Http\Controllers\clientController::class, 'create']);
// Route::post('/ajouterC', [App\Http\Controllers\clientController::class, 'store']);
// Route::get('/supprimerC/{id}', [App\Http\Controllers\clientController::class, 'delete']);
// Route::get('/modifierC/{id}', [App\Http\Controllers\clientController::class, 'edit']);
// Route::put('/modifierC/{id}', [App\Http\Controllers\clientController::class, 'update']);

// // Route::get('/modifier/{id}', ['App\Http\Controllers\ProduitController'::class, 'edit']); // afficher form
// // Route::put('/modifier/{id}', ['App\Http\Controllers\ProduitController'::class, 'update']); // update

// // //administrateur

// // Route::get('/admin', ['App\Http\Controllers\AdminController'::class, 'index']);
// // Route::get('/admin/produits', ['App\Http\Controllers\ProduitController'::class, 'index']);
// // Route::get('/admin/produits/create', ['App\Http\Controllers\ProduitController'::class, 'create']);
// // Route::post('/admin/produits/store', ['App\Http\Controllers\ProduitController'::class, 'store']);
// // Route::get('/admin/produits/edit/{id}', ['App\Http\Controllers\ProduitController'::class, 'edit']);
// // Route::post('/admin/produits/update/{id}', ['App\Http\Controllers\ProduitController'::class, 'update']);
// // Route::get('/admin/produits/delete/{id}', ['App\Http\Controllers\ProduitController'::class, 'delete']);



// // //panier
// Route::get('/panier', function () {
//     return view('panier');
// });


// // //categorie(filter)
// // Route::get('/categorie', ['App\Http\Controllers\ProduitController'::class, 'index']);
// // Route::get('/produit/{id}', ['App\Http\Controllers\ProduitController'::class, 'show']);










// use App\Http\Controllers\ProduitController;
// use App\Http\Controllers\clientController;
// use App\Http\Controllers\AdminController;
// // Produits
// Route::get('/catalogueP', [ProduitController::class, 'index']);
// Route::get('/produit/{id}', [ProduitController::class, 'show']);

// // Ajouter / Modifier / Supprimer (public)
// Route::get('/ajouter', [ProduitController::class, 'create']);
// Route::post('/ajouter', [ProduitController::class, 'store']);
// // web.php
// Route::get('/modifier/{id}',  [ProduitController::class, 'edit']);
// Route::put('/modifier/{id}',  [ProduitController::class, 'update']); 

// Route::get('/supprimer/{id}', [ProduitController::class, 'delete']);

// // // Admin
// // Route::get('/admin', [AdminController::class, 'index']);
// // Route::get('/admin/produits', [ProduitController::class, 'index']);
// // Route::get('/admin/produits/create', [ProduitController::class, 'create']);
// // Route::post('/admin/produits/store', [ProduitController::class, 'store']);
// // Route::get('/admin/produits/edit/{id}', [ProduitController::class, 'edit']);
// // Route::post('/admin/produits/update/{id}', [ProduitController::class, 'update']);
// // Route::get('/admin/produits/delete/{id}', [ProduitController::class, 'delete']);


// // Route::get('/produits/{id}/edit', [ProduitController::class, 'edit']);
// // Route::put('/produits/{id}',      [ProduitController::class, 'update']);
// // // Clients
// // Route::get('/clients', [clientController::class, 'index']);
// // Route::get('/ajouterClient', [clientController::class, 'create']);
// // Route::post('/ajouterClient', [clientController::class, 'store']);
// // Route::get('/supprimerClient/{id}', [clientController::class, 'delete']);

// // // Panier
// // Route::get('/panier', function () {
// //     return view('panier');
// // });



// // Route::get('/facture/{id}', [CommandeController::class, 'facture']);



//  use App\Http\Controllers\AchatContoller;

// Route::get('/produits', [ProduitController::class, 'index']);

// //contact
// // Route::post('/login', [clientController::class, 'login']);
// Route::post('/register', [clientController::class, 'register']);



// //panier et compte
// use App\Http\Controllers\PanierController;

// // panier
// //Route::get('/panier', [PanierController::class, 'index']);

// // compte client
// // Route::get('/login', [clientController::class, 'compte']);
// Route::get('/clients/{id}/compte', [AchatContoller::class, 'compte']);
// Route::post('/clients/{id}/acheter', [AchatContoller::class, 'acheter']);


// // Route::get('/login', function() {
// //     return view('Clients.CompteClient '); // ta vue de connexion
// // });

// Route::get('/CompteClient', [clientController::class, 'compte']);


// Route::get('/login', function() {
//     return view('contact'); // vue formulaire login
// });

// // POST login = traiter la connexion
// Route::post('/login', [clientController::class, 'login']);


// //recherch
// Route::get('/search', [ProduitController::class, 'search']);


// // produit
// Route::get('/produit/{id}', [ProduitController::class, 'show']);

// // panier
// Route::get('/panier', [PanierController::class, 'index']);
// Route::post('/panier/ajouter/{id}', [PanierController::class, 'ajouter']);
// Route::get('/panier/supprimer/{id}', [PanierController::class, 'supprimer']);


// Route::get('/livraison', [CommandeController::class, 'index']);
// Route::post('/livraison', [CommandeController::class, 'store']); -->





use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AchatContoller;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;

// Welcome
Route::get('/', fn() => view('welcome'));
Route::get('/footer', fn() => view('Master.footer'));
Route::get('/menu', fn() => view('Master.menu'));
// Route::get('/Promotion', fn() => view('Promotion'));
Route::get('/catalogue', fn() => view('catalogue'));
 
// Contact
Route::get('/contact', [RegisterController::class, 'index']);
Route::post('/contact', [RegisterController::class, 'store'])->name('contact.store');

// Login / Register
Route::get('/login', fn() => view('contact'));
Route::post('/login', [ClientController::class, 'login']);
Route::post('/register', [ClientController::class, 'register']);

// Compte client
Route::get('/CompteClient', [ClientController::class, 'compte']);

// Clients
Route::get('/catalogueC', [ClientController::class, 'index']);
Route::get('/ajouterC', [ClientController::class, 'create']);
Route::post('/ajouterC', [ClientController::class, 'store']);
Route::get('/supprimerC/{id}', [ClientController::class, 'destroy']);
Route::get('/modifierC/{id}', [ClientController::class, 'edit']);
Route::put('/modifierC/{id}', [ClientController::class, 'update']);

// Produits
Route::get('/produits', [ProduitController::class, 'index']);
Route::get('/catalogueP', [ProduitController::class, 'index']);
Route::get('/produit/{id}', [ProduitController::class, 'show']);
Route::get('/ajouter', [ProduitController::class, 'create']);
Route::post('/ajouter', [ProduitController::class, 'store']);
Route::get('/modifier/{id}', [ProduitController::class, 'edit']);
Route::put('/modifier/{id}', [ProduitController::class, 'update']);
Route::get('/supprimer/{id}', [ProduitController::class, 'delete']);
Route::get('/search', [ProduitController::class, 'search']);

// Panier
Route::get('/panier', [PanierController::class, 'index']);
Route::post('/panier/ajouter/{id}', [PanierController::class, 'ajouter']);
Route::get('/panier/supprimer/{id}', [PanierController::class, 'supprimer']);

// Achat / Compte points
Route::get('/clients/{id}/compte', [AchatContoller::class, 'compte']);
Route::post('/clients/{id}/acheter', [AchatContoller::class, 'acheter']);

// Livraison
Route::get('/livraison', [CommandeController::class, 'index']);
Route::post('/livraison', [CommandeController::class, 'store']);

//admin
use App\Http\Controllers\AdminController;

Route::get('/admin/login', [AdminController::class, 'loginForm']);
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/gstionP', [AdminController::class, 'dashboard']);
Route::get('/admin/logout', [AdminController::class, 'logout']);

Route::get('/admin/clients', [AdminController::class, 'clients']);
Route::get('/admin/commandes', [AdminController::class, 'commandes']);

//facture
Route::get('/merci/facture/{id}', [CommandeController::class, 'facture']);
Route::get('/merci', function() {
    return view('merci');
});

//promotion
Route::get('/admin/promotions', [AdminController::class, 'promotions']);
Route::post('/admin/promotions/ajouter', [AdminController::class, 'ajouterPromotion']);
Route::get('/admin/promotions/supprimer/{id}', [AdminController::class, 'supprimerPromotion']);
//comentaire
Route::post('/produit/{id}/commenter', [ProduitController::class, 'commenter']);
//produit
Route::get('/produits', [ProduitController::class, 'parCategorie'])->name('categorie');

//promotion
Route::get('/Promotion', [AdminController::class, 'promotionPublic']);

//deconnection
Route::get('/admin/logout', [AdminController::class, 'logout']);

 
 

 