<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Afficher page login admin
    public function showLogin()
    {
        if(session('admin_id'))
        {
            return redirect('/dashboard');
        }

        return view('Admin.login');
    }

    // Login admin
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $admin = DB::table('admins')
                    ->where('email',$request->email)
                    ->first();

        if(
            $admin &&
            Hash::check(
                $request->password,
                $admin->password
            )
        )
        {
            Session::put([
                'admin_id'=>$admin->id, // ici les modifications
                'admin_nom'=>$admin->nom
            ]);

            return redirect('/dashboard')
                    ->with(
                        'success',
                        'Connexion admin réussie'
                    );
        }

        return back()->with(
            'error',
            'Email ou mot de passe incorrect'
        );
    }

    // Logout admin
    public function logout()
    {
        session()->forget([
            'admin_id',
            'admin_nom'
        ]);

        return redirect('/admin/login');
    }
     
public function promotionPublic()
{
    $promotions = DB::table('promotions')
        ->join(
            'produits',
            'promotions.idProduit',
            '=',
            'produits.idProduit'
        )
        ->select(
            'promotions.*',
            'produits.nomP',
            'produits.description',
            'produits.image as image_produit'
        )
        ->get();

    return view(
        'Promotion',
        compact('promotions')
    );
}
public function dashboard()
{
    if(!session('admin_id')){
        return redirect('/admin/login');
    }

    $totalClients   = DB::table('clients')->count();
    $totalCommandes = DB::table('commandes')->count();
    $totalProduits  = DB::table('produits')->count();
    $totalRevenu    = DB::table('commandes')->sum('total');

    $commandes = DB::table('commandes')
                ->join('clients', 'commandes.idClient', '=', 'clients.idClient')
                ->select('commandes.*', 'clients.nom', 'clients.prenom')
                ->orderBy('commandes.created_at', 'desc')
                ->limit(5)
                ->get();

    return view('Admin.dashboard', compact(
        'totalClients',
        'totalCommandes',
        'totalProduits',
        'totalRevenu',
        'commandes'
    ));
}

public function clients()
{
    if(!session('admin_id')){
        return redirect('/admin/login');
    }

    $clients = DB::table('clients')->orderBy('created_at', 'desc')->get();
    return view('Admin.clients', compact('clients'));
}

public function commandes()
{
    if(!session('admin_id')){
        return redirect('/admin/login');
    }

    $commandes = DB::table('commandes')
                ->join('clients', 'commandes.idClient', '=', 'clients.idClient')
                ->select('commandes.*', 'clients.nom', 'clients.prenom')
                ->orderBy('commandes.created_at', 'desc')
                ->get();

    return view('Admin.commandes', compact('commandes'));
}

public function updateStatut(Request $request, $id)
{
    if(!session('admin_id')){
        return redirect('/admin/login');
    }

    DB::table('commandes')
        ->where('idCommande', $id)
        ->update(['statut' => $request->statut]);

    return back()->with('success', 'Statut mis à jour !');
}

public function promotions()
{
    if(!session('admin_id')){
        return redirect('/admin/login');
    }

    $promotions = DB::table('promotions')
                ->join('produits', 'promotions.idProduit', '=', 'produits.idProduit')
                ->select('promotions.*', 'produits.nomP')
                ->get();

    $produits = DB::table('produits')->get();

    return view('Admin.promotions', compact('promotions', 'produits'));
}

public function ajouterPromotion(Request $request)
{
    if(!session('admin_id')){
        return redirect('/admin/login');
    }

    DB::table('promotions')->insert([
        'idProduit'   => $request->idProduit,
        'reduction'   => $request->reduction,
        'dateDebut'   => $request->dateDebut,
        'dateFin'     => $request->dateFin,
        'created_at'  => now(),
        'updated_at'  => now()
    ]);

    return back()->with('success', 'Promotion ajoutée !');
}

// public function supprimerPromotion($id)
// {
//     if(!session('admin_id')){
//         return redirect('/admin/login');
//     }

//     DB::table('promotions')->where('id', $id)->delete();
//     return back()->with('success', 'Promotion supprimée !');
// }
public function achats()
{
    if(!session('admin_id')){
        return redirect('/admin/login');
    }

    $achats = DB::table('achats')
                ->join('clients', 'achats.idClient', '=', 'clients.idClient')
                ->select('achats.*', 'clients.nom', 'clients.prenom')
                ->orderBy('achats.created_at', 'desc')
                ->get();

    return view('Admin.achats', compact('achats'));
}

public function editClient($id)
{
    if(!session('admin_id')){
        return redirect('/admin/login');
    }

    $client = DB::table('clients')->where('idClient', $id)->first();
    return view('Admin.editClient', compact('client'));
}

public function updateClient(Request $request, $id)
{
    if(!session('admin_id')){
        return redirect('/admin/login');
    }

    DB::table('clients')->where('idClient', $id)->update([
        'nom'        => $request->nom,
        'prenom'     => $request->prenom,
        'email'      => $request->email,
        'telephone'  => $request->telephone,
        'updated_at' => now()
    ]);

    return redirect()->route('admin.clients')->with('success', 'Client modifié !');
}

public function destroyClient($id)
{
    if(!session('admin_id')){
        return redirect('/admin/login');
    }

    DB::table('clients')->where('idClient', $id)->delete();
    return redirect()->route('admin.clients')->with('success', 'Client supprimé !');
}

public function supprimerPromotion($id)
{
    if(!session('admin_id')){
        return redirect('/admin/login');
    }

    DB::table('promotions')->where('id', $id)->delete();
    return redirect()->route('admin.promotions')->with('success', 'Promotion supprimée !');
}
}