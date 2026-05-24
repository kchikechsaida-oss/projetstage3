<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function showLogin()
    {
        if(Session::get('client_id')){
            return redirect('/CompteClient');
        }
        return view('auth.login');
    }

    public function showRegister()
    {
        if(Session::get('client_id')){
            return redirect('/CompteClient');
        }
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $client = DB::table('clients')
                    ->where('email', $request->email)
                    ->first();

        if($client && Hash::check($request->password, $client->password)){
            Session::put('client_id',    $client->idClient);
            Session::put('client_nom',   $client->nom);
            Session::put('client_prenom',$client->prenom);
            Session::put('client_email', $client->email);

            return redirect('/CompteClient')->with('success', 'Connexion réussie');
        }

        return back()->with('error', 'Email ou mot de passe incorrect');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nom'      => 'required',
            'prenom'   => 'required',
            'email'    => 'required|email|unique:clients,email',
            'telephone'=> 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        DB::table('clients')->insert([
            'nom'       => $request->nom,
            'prenom'    => $request->prenom,
            'email'     => $request->email,
            'telephone' => $request->telephone,
            'password'  => Hash::make($request->password),
            'points'    => 0,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);

        return redirect('/login')->with('success', 'Compte créé avec succès');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login')->with('success', 'Déconnexion réussie');
    }

    public function compte()
    {
        if(!Session::get('client_id')){
            return redirect('/login');
        }

        $client = DB::table('clients')
                    ->where('idClient', Session::get('client_id'))
                    ->first();

        if(!$client){
            Session::flush();
            return redirect('/login')->with('error', 'Client introuvable');
        }

        $commandes = DB::table('commandes')
                        ->where('idClient', $client->idClient)
                        ->orderBy('created_at', 'desc')
                        ->get();

        $achats = DB::table('achats')
                    ->where('idClient', $client->idClient)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('Clients.CompteClient', compact('client', 'commandes', 'achats'));
    }

    public function modifierProfil(Request $request)
    {
        if(!session('client_id')){
            return redirect('/login');
        }

        $request->validate([
            'nom'      => 'required|string|max:255',
            'prenom'   => 'required|string|max:255',
            'telephone'=> 'required|string|max:20'
        ]);

        DB::table('clients')
            ->where('idClient', session('client_id'))
            ->update([
                'nom'       => $request->nom,
                'prenom'    => $request->prenom,
                'telephone' => $request->telephone,
                'updated_at'=> now()
            ]);

        return redirect('/CompteClient')->with('success', 'Profil modifié avec succès');
    }
}