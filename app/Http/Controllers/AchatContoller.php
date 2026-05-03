<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AchatContoller extends Controller
{ 
    // Règle: kol 10 DH = 1 point
    const POINTS_PAR_DH = 0.1;
    // Règle: 1 point = 1 DH remise
    const VALEUR_POINT = 1;

    // Client kaychri — katحسب points
    public function acheter(Request $request, $idClient)
    {
        $request->validate([
            'montant' => 'required|numeric|min:1',
            'utiliser_points' => 'nullable|integer|min:0',
        ]);

        $client = DB::table('clients')->where('idClient', $idClient)->first();
        $montant = $request->montant;
        $points_utilises = $request->utiliser_points ?? 0;

        // ✅ Wach 3ando bzzaf points?
        if ($points_utilises > $client->points) {
            return back()->with('error', 'Ma 3andokch bzzaf points!');
        }

        // Hisab remise
        $remise = $points_utilises * self::VALEUR_POINT;
        $montant_final = max(0, $montant - $remise);

        // Points lli rbah men had l-achat
        $points_gagnes = floor($montant_final * self::POINTS_PAR_DH);

        // Update points dyal client
        $nouveaux_points = $client->points - $points_utilises + $points_gagnes;

        DB::table('clients')->where('idClient', $idClient)->update([
            'points' => $nouveaux_points
        ]);

        //  Sjiل l-achat
        DB::table('achats')->insert([
            'idClient'      => $idClient,
            'montant'        => $montant_final,
            'points_gagnes'  => $points_gagnes,
            'points_utilises'=> $points_utilises,
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        return redirect('/catalogueC')
            ->with('success', "Achat enregistré! +{$points_gagnes} points gagnés.");
    }

    // Afficher points + historique dyal client
    public function compte($idClient)
    {
        $client  = DB::table('clients')->where('idClient', $idClient)->first();
        $achats  = DB::table('achats')
                     ->where('idClient', $idClient)
                     ->orderBy('created_at', 'desc')
                     ->get();

        return view('Clients.CompteClient', compact('client', 'achats'));
    }
}
