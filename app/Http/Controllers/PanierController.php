<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PanierController extends Controller
{
    public function index()
    {
        $panier = Session::get('panier', []);

        $total = array_sum(array_map(function($item) {
            return $item['prix'] * $item['quantite'];
        }, $panier));

        return view('panier', compact('panier', 'total'));
    }

    public function ajouter($id)
    {
        if(!session('client_id')){
            return redirect()->route('login')
                   ->with('error', 'Connectez-vous pour ajouter au panier !');
        }

        $produit = DB::table('produits')->where('idProduit', $id)->first();

        if(!$produit){
            return redirect('/catalogue')
                   ->with('error', 'Produit introuvable !');
        }

        $panier = Session::get('panier', []);

        if(isset($panier[$id])){
            $panier[$id]['quantite']++;
        } else {
            $panier[$id] = [
                'idProduit' => $id,
                'nom'       => $produit->nomP,
                'prix'      => $produit->prix,
                'image'     => $produit->image,
                'quantite'  => 1
            ];
        }

        Session::put('panier', $panier);

        return redirect()->route('livraison')->with('success', 'Produit ajouté !');
    }

    public function supprimer($id)
    {
        $panier = Session::get('panier', []);

        if(isset($panier[$id])){
            unset($panier[$id]);
            Session::put('panier', $panier);
        }

        return redirect('/panier')->with('success', 'Produit supprimé !');
    }

    public function augmenter($id)
    {
        $panier = Session::get('panier', []);

        if(isset($panier[$id])){
            $panier[$id]['quantite']++;
            Session::put('panier', $panier);
        }

        return redirect('/panier');
    }

    public function diminuer($id)
    {
        $panier = Session::get('panier', []);

        if(isset($panier[$id])){
            if($panier[$id]['quantite'] > 1){
                $panier[$id]['quantite']--;
            } else {
                unset($panier[$id]);
            }
            Session::put('panier', $panier);
        }

        return redirect('/panier');
    }

    public function vider()
    {
        Session::forget('panier');
        return redirect('/panier')->with('success', 'Panier vidé !');
    }

    public function count()
    {
        $panier = Session::get('panier', []);
        $count = array_sum(array_column($panier, 'quantite'));
        return response()->json(['count' => $count]);
    }
}