<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function store(Request $request, $id)
{
    if (!session('client_id')) {
        return redirect('/login');
    }

    $request->validate([
        'commentaire' => 'required|string|max:1000',
        'note'        => 'required|integer|min:1|max:5',
    ]);

    DB::table('commentaires')->insert([
        'idClient'    => session('client_id'),
        'idProduit'   => $id,
        'commentaire' => $request->commentaire,
        'note'        => $request->note,
        'created_at'  => now(),
        'updated_at'  => now(),
    ]);

    return back()->with('success', 'Avis ajouté !');
}
}