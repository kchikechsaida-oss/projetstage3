<?php

// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Panier;          
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Session;
// class PanierController extends Controller
// {
   

//    public function index()
//     {
//         $panier = Panier::all();
//         return view('panier', compact('panier'));
//     }

// public function ajouter($id)
// {
//     $produit = DB::table('produits')
//         ->where('idProduit', $id)
//         ->first();

//     $panier = Session::get('panier', []);

//     if(isset($panier[$id])){
//         $panier[$id]['quantite']++;
//     } else {
//         $panier[$id] = [
//             "nom" => $produit->nomP,
//             "prix" => $produit->prix,
//             "image" => $produit->image,
//             "quantite" => 1
//         ];
//     }

//     Session::put('panier', $panier);

//     return back()->with('success', 'Produit ajouté');
// }
// }




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PanierController extends Controller
{
    // عرض الpanier
    public function index()
    {
        $panier = Session::get('panier', []);
        return view('panier', compact('panier'));
    }

    // إضافة للpanier
   //  public function ajouter($id)
   //  {
   //      // واش connecté?
   //      if (!session('client')) {
   //          return redirect('/login');
   //      }

      //   $produit = DB::table('produits')
      //       ->where('idProduit', $id)
      //       ->first();

      //   $panier = Session::get('panier', []);

      //   if(isset($panier[$id])){
      //       $panier[$id]['quantite']++;
      //   } else {
      //       $panier[$id] = [
      //           "idProduit" => $id,
      //           "nom"       => $produit->nomP,
      //           "prix"      => $produit->prix,
      //           "image"     => $produit->image,
      //           "quantite"  => 1
      //       ];
      //   }

   //      Session::put('panier', $panier);
   //      return redirect('/panier');
   //  }

    // حذف من panier
    public function supprimer($id)
    {
        $panier = Session::get('panier', []);
        unset($panier[$id]);
        Session::put('panier', $panier);
        return redirect('/panier');
    }

    public function ajouter($id)
{
    if (!session('client')) {
        session(['redirect_after_login' => '/livraison']);
        return redirect('/login');
    }

    $produit = DB::table('produits')->where('idProduit', $id)->first();
    $panier = Session::get('panier', []);

    if(isset($panier[$id])){
        $panier[$id]['quantite']++;
    } else {
        $panier[$id] = [
            "idProduit" => $id,
            "nom"       => $produit->nomP,
            "prix"      => $produit->prix,
            "image"     => $produit->image,
            "quantite"  => 1
        ];
    }

    Session::put('panier', $panier);
    return redirect('/panier');
}
}