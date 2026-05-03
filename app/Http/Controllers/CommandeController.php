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
        if (!session('client')) {
            return redirect('/login');
        }

        $panier = Session::get('panier', []);
        $client = session('client');

        $total = 0;
        foreach($panier as $item) {
            $total += $item['prix'] * $item['quantite'];
        }

        return view('livraison', compact('panier', 'client', 'total'));
    }

    // public function store(Request $request)
    // {
    //     $client = session('client');

    //     DB::table('commandes')->insert([
    //         'idClient'   => $client->idClient,
    //         'dateCommande' => now()->toDateString(),
    //         'adresse'    => $request->adresse,
    //         'telephone'  => $request->telephone,
    //         'total'      => $request->total,
    //         'statut'     => 'en attente',
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);

    //     Session::forget('panier');

    //     return redirect('/CompteClient')->with('success', 'Commande passée avec succès!');
    // }

    public function store(Request $request)
{
    $client = session('client');
    $panier = Session::get('panier', []);
    $total  = $request->total;

    // سجل الcommande
    $commandeId = DB::table('commandes')->insertGetId([
        'idClient'     => $client->idClient,
        'dateCommande' => now()->toDateString(),
        'adresse'      => $request->adresse,
        'telephone'    => $request->telephone,
        'total'        => $total,
        'ville'        => $request->ville,
        'code_postal'  => $request->code_postal,
        'statut'       => 'en attente',
        'paiement'     => 'cash',
        'created_at'   => now(),
        'updated_at'   => now(),
    ]);

    // حساب points — كل 10 DH = 1 point
    $pointsGagnes = floor($total / 10);

    // update points ديال client
    DB::table('clients')
       ->where('idClient', $client->idClient)
       ->increment('points', $pointsGagnes);

    // سجل فـ achats
    DB::table('achats')->insert([
        'idClient'        => $client->idClient,
        'montant'         => $total,
        'points_gagnes'   => $pointsGagnes,
        'points_utilises' => 0,
        'created_at'      => now(),
        'updated_at'      => now(),
    ]);

    // فرغ الpanier
    Session::forget('panier');

    return redirect('/merci?commande=' . $commandeId . '&points=' . $pointsGagnes);
}

public function facture($id)
{
    $commande = DB::table('commandes')
                  ->join('clients', 'commandes.idClient', '=', 'clients.idClient')
                  ->where('commandes.idCommande', $id)
                  ->select('commandes.*', 'clients.nom', 'clients.prenom', 
                           'clients.email', 'clients.telephone')
                  ->first();

    $pointsGagnes = floor($commande->total / 10);

    $pdf = Pdf::loadView('facture', compact('commande', 'pointsGagnes'));
    return $pdf->download('facture-' . $id . '.pdf');
}
}