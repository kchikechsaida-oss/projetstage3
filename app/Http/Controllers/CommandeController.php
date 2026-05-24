<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class CommandeController extends Controller
{
    public function index()
    {
        $panier = Session::get('panier', []);

        if(empty($panier)){
            return redirect('/panier');
        }

        if(!session('client_id')){
            return redirect('/login');
        }

        $client = DB::table('clients')
                    ->where('idClient', session('client_id'))
                    ->first();

        $total = 0;
        foreach($panier as $item){
            $total += $item['prix'] * $item['quantite'];
        }

        return view('livraison', compact('panier', 'client', 'total'));
    }

    public function store(Request $request)
    {
        if(!session('client_id')){
            return redirect('/login');
        }

        $request->validate([
            'adresse'    => 'required',
            'telephone'  => 'required',
            'ville'      => 'required',
            'code_postal'=> 'required'
        ]);

        $clientId = session('client_id');

        $panier = Session::get('panier', []);

        if(empty($panier)){
            return redirect('/catalogue')->with('error', 'Panier vide');
        }

        $total = 0;
        foreach($panier as $item){
            $total += $item['prix'] * $item['quantite'];
        }

        $commandeId = DB::table('commandes')->insertGetId([
            'idClient'    => $clientId,
            'dateCommande'=> now(),
            'adresse'     => $request->adresse,
            'telephone'   => $request->telephone,
            'ville'       => $request->ville,
            'code_postal' => $request->code_postal,
            'total'       => $total,
            'statut'      => 'en attente',
            'paiement'    => 'cash',
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        foreach($panier as $item){
            DB::table('commande_produits')->insert([
                'idCommande' => $commandeId,
                'idProduit'  => $item['idProduit'],
                'quantite'   => $item['quantite'],
                'prix'       => $item['prix'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $pointsGagnes = floor($total / 10);

        DB::table('achats')->insert([
            'idClient'        => $clientId,
            'montant'         => $total,
            'points_gagnes'   => $pointsGagnes,
            'points_utilises' => 0,
            'created_at'      => now(),
            'updated_at'      => now()
        ]);

        Session::forget('panier');

        return redirect('/merci?commande=' . $commandeId . '&points=' . $pointsGagnes);
    }

    public function facture($id)
{
    if(!session('client_id')){
        return redirect('/login');
    }

    $commande = DB::table('commandes')->where('idCommande', $id)->first();

    $produits = DB::table('commande_produits')
                ->join('produits', 'commande_produits.idProduit', '=', 'produits.idProduit')
                ->where('commande_produits.idCommande', $id)
                ->select('produits.nomP', 'commande_produits.quantite', 'commande_produits.prix')
                ->get();

    $client = DB::table('clients')
                ->where('idClient', session('client_id'))
                ->first();

    $user = $client; // ← هادا هو الحل

    $pointsGagnes = floor($commande->total / 10);

    $pdf = Pdf::loadView('facture', compact('commande', 'produits', 'pointsGagnes', 'client', 'user'));

    return $pdf->download('facture-' . $id . '.pdf');
}
    public function historique()
    {
        if(!session('client_id')){
            return redirect('/login');
        }

        $commandes = DB::table('commandes')
                    ->where('idClient', session('client_id'))
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('historique', compact('commandes'));
    }
}