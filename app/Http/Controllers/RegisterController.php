<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{


public function index()
{
return view('contact');
}

public function store(Request $request)
{

User::create([
'nom' => $request->nom,
'prenom' => $request->prenom,
'email' => $request->email,
'telephone' => $request->telephone,
'password' => bcrypt($request->password)
]);

return "Utilisateur enregistré";

}

}

