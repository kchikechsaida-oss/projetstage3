<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchatController extends Controller
{
    // Règles points
    const POINTS_PAR_DH = 0.1;
    const VALEUR_POINT = 1;

    // Acheter avec points
    public function acheter(Request $request)
    {
        if (!session('client_id')) {
            return redirect('/login');
        }

        $request->validate([
            'montant' => 'required|numeric|min:1',
            'utiliser_points' => 'nullable|integer|min:0',
        ]);

        $client = DB::table('clients')
                    ->where(
                        'idClient',
                        session('client_id')
                    )
                    ->first();

        $montant = $request->montant;
        $points_utilises =
        $request->utiliser_points ?? 0;

        // Vérifier points
        if($points_utilises >
            ($client->points ?? 0))
        {
            return back()->with(
                'error',
                'Pas assez de points'
            );
        }

        // Calcul remise
        $remise =
        $points_utilises
        *
        self::VALEUR_POINT;

        $montant_final =
        max(
            0,
            $montant-$remise
        );

        // Points gagnés
        $points_gagnes =
        floor(
            $montant_final
            *
            self::POINTS_PAR_DH
        );

        // Mise à jour points client
        $nouveaux_points =
        ($client->points ?? 0)
        -
        $points_utilises
        +
        $points_gagnes;

        DB::table('clients')
        ->where(
            'idClient',
            session('client_id')
        )
        ->update([

            'points'=>$nouveaux_points,
            'updated_at'=>now()

        ]);

        // Enregistrer achat
        DB::table('achats')
        ->insert([

            'idClient'=>
            session('client_id'),

            'montant'=>
            $montant_final,

            'points_gagnes'=>
            $points_gagnes,

            'points_utilises'=>
            $points_utilises,

            'created_at'=>now(),
            'updated_at'=>now()

        ]);

        return redirect('/CompteClient')
        ->with(
            'success',
            "Achat enregistré ! +{$points_gagnes} points"
        );
    }

    // Compte client
    public function compte()
    {
        if(!session('client_id')){
            return redirect('/login');
        }

        $client=
        DB::table('clients')
        ->where(
            'idClient',
            session('client_id')
        )
        ->first();

        $achats=
        DB::table('achats')
        ->where(
            'idClient',
            session('client_id')
        )
        ->orderBy(
            'created_at',
            'desc'
        )
        ->get();

        $remise_disponible=
        ($client->points ?? 0)
        *
        self::VALEUR_POINT;

        return view(
            'Clients.CompteClient',
            compact(
                'client',
                'achats',
                'remise_disponible'
            )
        );
    }

    // Historique Admin
    public function historique()
    {
        $achats=
        DB::table('achats')
        ->join(
            'clients',
            'achats.idClient',
            '=',
            'clients.idClient'
        )
        ->select(
            'achats.*',
            'clients.nom',
            'clients.prenom'
        )
        ->orderBy(
            'achats.created_at',
            'desc'
        )
        ->get();

        return view(
            'Admin.historique',
            compact('achats')
        );
    }

    // Points client
    public function points($id)
    {
        $client=
        DB::table('clients')
        ->where(
            'idClient',
            $id
        )
        ->first();

        if(!$client){
            return back()->with(
                'error',
                'Client introuvable'
            );
        }

        $achats=
        DB::table('achats')
        ->where(
            'idClient',
            $id
        )
        ->orderBy(
            'created_at',
            'desc'
        )
        ->get();

        $remise_disponible=
        ($client->points ?? 0)
        *
        self::VALEUR_POINT;

        return view(
            'Admin.points',
            compact(
                'client',
                'achats',
                'remise_disponible'
            )
        );
    }
}