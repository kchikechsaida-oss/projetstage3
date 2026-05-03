<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{


// public function index(){
//     $produits = DB::table('produits')->get();
//     return view('admin.produits.index', compact('produits'));
// }

// public function create(){
//     return view('admin.produits.create');
// }

// public function store(Request $request){
//     DB::table('produits')->insert([
//         'nom' => $request->nom,
//         'prix' => $request->prix
//     ]);

//     return redirect('/admin/produits');
// }

// public function edit($id){
//     $produit = DB::table('produits')->where('id', $id)->first();
//     return view('admin.produits.edit', compact('produit'));
// }

// public function update(Request $request, $id){
//     DB::table('produits')->where('id', $id)->update([
//         'nom' => $request->nom,
//         'prix' => $request->prix
//     ]);

//     return redirect('/admin/produits');
// }

//     public function delete($id){
//     DB::table('produits')->where('id', $id)->delete();
//     return redirect('/admin/produits');
// }

    // عرض login admin
    public function loginForm()
    {
        return view('Admin.login');
    }

    // traiter login
    public function login(Request $request)
    {
        $admin = DB::table('admins')
                    ->where('email', $request->email)
                    ->where('password', $request->password)
                    ->first();

        if ($admin) {
            session(['admin' => $admin]);
            return redirect('/admin/gstionP');
        }
        return back()->with('error', 'Email ou mot de passe incorrect');
    }

    // dashboard
    public function dashboard()
    {
        if (!session('admin')) {
            return redirect('/admin/login');
        }

        $produits = DB::table('produits')->get();
        return view('Admin.gstionProduits', compact('produits'));
    }

    // logout
    public function logout()
    {
        session()->forget('admin');
        return redirect('/admin/login');
    }
    public function clients()
{
    if (!session('admin')) {
        return redirect('/admin/login');
    }
    $clients = DB::table('clients')->get();
    return view('Admin.clients', compact('clients'));
}

public function commandes()
{
    if (!session('admin')) {
        return redirect('/admin/login');
    }
    $commandes = DB::table('commandes')
                   ->join('clients', 'commandes.idClient', '=', 'clients.idClient')
                   ->select('commandes.*', 'clients.nom', 'clients.prenom', 'clients.telephone')
                   ->orderBy('commandes.created_at', 'desc')
                   ->get();
    return view('Admin.commandes', compact('commandes'));
}
public function promotions()
{
    if (!session('admin')) {
        return redirect('/admin/login');
    }

    $promotions = DB::table('promotions')
                    ->join('produits', 'promotions.idProduit', '=', 'produits.idProduit')
                    ->select('promotions.*', 'produits.nomP', 'produits.image')
                    ->get();

    $produits = DB::table('produits')->get();

    return view('Admin.promotions', compact('promotions', 'produits'));
}

public function ajouterPromotion(Request $request)
{
    if (!session('admin')) {
        return redirect('/admin/login');
    }

    // جيب prix ancien ديال المنتج
    $produit = DB::table('produits')
                 ->where('idProduit', $request->idProduit)
                 ->first();

    DB::table('promotions')->insert([
        'idProduit'   => $request->idProduit,
        'prix_ancien' => $produit->prix,
        'prix_promo'  => $request->prix_promo,
        'date_debut'  => $request->date_debut,
        'date_fin'    => $request->date_fin,
        'created_at'  => now(),
        'updated_at'  => now(),
    ]);

    return back()->with('success', 'Promotion ajoutée!');
}

public function supprimerPromotion($id)
{
    if (!session('admin')) {
        return redirect('/admin/login');
    }

    DB::table('promotions')->where('id', $id)->delete();
    return back()->with('success', 'Promotion supprimée!');
}
//promotion
public function promotionPublic()
{
    $promotions = DB::table('promotions')
                    ->join('produits', 'promotions.idProduit', '=', 'produits.idProduit')
                    ->select('promotions.*', 'produits.nomP', 'produits.description', 'produits.image as image_produit')
                    ->where('date_fin', '>=', now())
                    ->get();

    return view('Promotion', compact('promotions'));
}

}

