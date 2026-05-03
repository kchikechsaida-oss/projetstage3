<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProduitController extends Controller
{
    // afficher produits
//     public function index(){
//     $produits = DB::table('produits')->get();
//     return view('categorie', compact('produits'));  
// }


public function index(Request $request) {
    $categorie = $request->query('categorie');

    if ($categorie) {
        $produits = DB::table('produits')
                      ->where('categorie', $categorie)
                      ->get();
    } else {
        $produits = DB::table('produits')->get();
    }

    return view('categorie', compact('produits'));
}
    // afficher form ajouter
    public function create(){
        return view('Produits.ajouterProduit');
    }
    // ajouter produit
    public function store(Request $request){
        // upload image
        $imagePath = $request->file('image')->store('images', 'public');

        DB::table('produits')->insert([
            'nomP'  => $request->nomP,
            'prix'        => $request->prix,
            'description' => $request->description,
            'image'       => $imagePath,
            'categorie'   => $request->categorie,
        ]);

        return redirect('/catalogue');
    }

    // supprimer
    public function delete($id){
        DB::table('produits')->where('idProduit', $id)->delete();
        return redirect('/catalogue');
    }

    // afficher form modifier
    public function edit($id){
        $produit = DB::table('produits')->where('idProduit', $id)->first();
        return view('Produits.modifierProduit', compact('produit'));
    }

    // update
    public function update(Request $request, $id){
        $data = [
            'nomP'  => $request->nomP,
            'prix'        => $request->prix,
            'description' => $request->description,
        ];

        // update image sير ila zad image jdida
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        DB::table('produits')->where('idProduit', $id)->update($data);

        return redirect('/catalogue');
    }
    public function search(Request $request)
{
    $search = $request->q;

    $produits = DB::table('produits')
        ->where('nomP', 'like', "%$search%")
        ->orWhere('description', 'like', "%$search%")
        ->limit(5)
        ->get();

    return response()->json($produits);
}


// public function show($id)
// {
//     $produit = DB::table('produits')
//         ->where('idProduit', $id)     
//         ->first();

//     return view('Produits.produits', compact('produit'));
// }

public function show($id){
    $produit = DB::table('produits')->where('idProduit', $id)->first();
    return view('show', compact('produit'));
}
//comentaire
public function commenter(Request $request, $id)
{
    if (!session('client')) {
        return redirect('/login');
    }

    $client = session('client');

    DB::table('commentaires')->insert([
        'idProduit'   => $id,
        'idClient'    => $client->idClient,
        'commentaire' => $request->commentaire,
        'note'        => $request->note,
        'created_at'  => now(),
        'updated_at'  => now(),
    ]);

    return back()->with('success', 'Commentaire ajouté!');
}

//     public function show($id)
// {
//     $produit = DB::table('produits')->where('idProduit', $id)->first();
    
//     $commentaires = DB::table('commentaires')
//                       ->join('clients', 'commentaires.idClient', '=', 'clients.idClient')
//                       ->where('commentaires.idProduit', $id)
//                       ->select('commentaires.*', 'clients.prenom', 'clients.nom')
//                       ->orderBy('commentaires.created_at', 'desc')
//                       ->get();

//     return view('categorie', compact('produit', 'commentaires'));
// }
//pour les produits de accuil
// public function parCategorie(Request $request)
// {
//     $produits = DB::table('produits')
//         ->where('categorie', $request->categorie)
//         ->get();

//     return view('categorie', compact('produits'));
// }

public function parCategorie(Request $request)
{
    $produits = DB::table('produits')
        ->where('categorie', 'LIKE', '%' . $request->categorie . '%')
        ->get();

    return view('categorie', compact('produits'));
}
}