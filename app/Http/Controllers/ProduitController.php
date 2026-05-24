<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    // ==========================
    // ACCUEIL / CATALOGUE
    // ==========================

    public function index()
    {
        $produits = DB::table('produits')->get();

        return view('catalogue', compact('produits'));
    }


    // ==========================
    // DETAIL PRODUIT
    // ==========================

    public function show($id)
    {
        $produit = DB::table('produits')
            ->where('idProduit', $id)
            ->first();

        if (!$produit) {
            return redirect('/catalogue')
                ->with('error','Produit introuvable');
        }

        $commentaires = DB::table('commentaires')
            ->join(
                'clients',
                'commentaires.idClient',
                '=',
                'clients.idClient'
            )
            ->where(
                'commentaires.idProduit',
                $id
            )
            ->select(
                'commentaires.*',
                'clients.nom',
                'clients.prenom'
            )
            ->orderBy(
                'commentaires.created_at',
                'desc'
            )
            ->get();

        return view(
            'show',
            compact(
                'produit',
                'commentaires'
            )
        );
    }


    // ==========================
    // RECHERCHE AJAX
    // ==========================

    public function search(Request $request)
    {
        $search = $request->q;

        $produits = DB::table('produits')
            ->where(
                'nomP',
                'LIKE',
                "%$search%"
            )
            ->orWhere(
                'description',
                'LIKE',
                "%$search%"
            )
            ->limit(5)
            ->get();

        return response()->json($produits);
    }


    // ==========================
    // FILTRE CATEGORIE
    // ==========================

    public function parCategorie(Request $request)
    {
        $categorie = $request->categorie;

        $produits = DB::table('produits')
            ->where(
                'categorie',
                'LIKE',
                "%$categorie%"
            )
            ->get();

        return view(
            'categorie',
            compact('produits')
        );
    }


    // ==========================
    // AJOUT COMMENTAIRE
    // ==========================

    public function commenter(Request $request,$id)
    {
        if(!session('client_id'))
        {
            return redirect('/login');
        }

        $request->validate([
            'commentaire'=>'required',
            'note'=>'required|integer|min:1|max:5'
        ]);

        DB::table('commentaires')
            ->insert([
                'idProduit'=>$id,
                'idClient'=>session('client_id'),
                'commentaire'=>$request->commentaire,
                'note'=>$request->note,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);

        return back()
            ->with(
                'success',
                'Avis ajouté'
            );
    }


    // ==========================
    // AJOUT PRODUIT
    // ==========================

    public function create()
    {
        return view('Produits.ajouterProduit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomP'=>'required',
            'prix'=>'required',
            'description'=>'required',
            'image'=>'required|image',
            'categorie'=>'required'
        ]);

        $image = $request
                    ->file('image')
                    ->store(
                        'images',
                        'public'
                    );

        DB::table('produits')
            ->insert([
                'nomP'=>$request->nomP,
                'prix'=>$request->prix,
                'description'=>$request->description,
                'image'=>$image,
                'categorie'=>$request->categorie,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);

        return redirect('/catalogue');
    }


    // ==========================
    // SUPPRIMER PRODUIT
    // ==========================

    public function delete($id)
    {
        $produit = DB::table('produits')
            ->where(
                'idProduit',
                $id
            )
            ->first();

        if($produit && $produit->image)
        {
            Storage::disk('public')
                ->delete(
                    $produit->image
                );
        }

        DB::table('produits')
            ->where(
                'idProduit',
                $id
            )
            ->delete();

        return redirect('/catalogue');
    }
}