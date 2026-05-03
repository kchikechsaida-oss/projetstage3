<?php

// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// class clientController extends Controller
// {
     
//     // Afficher  clients
//     public function index(){
//         $tab = DB::table('clients')->get();
//         return view('Clients.clients', compact('tab'));
//     }

//     // Ajouter client
//     public function create(Request $request){
//        $request->validate([
//     'nom' => 'required',
//     'prenom' => 'required',
//     'email' => 'required|email|unique:clients,email',
//     'password' => 'required',
//     'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
// ], [

//             'nom.required'=>'Le nom est obligatoire',
//             'nom.required' => 'Le nom est obligatoire',
//             'nom.string' => 'Le nom doit etre de type chaine de caractères',
//             'nom.max' => 'Le nom ne doit pas dépasser 255 caractères ',
//             'email.required' => "L'adresse email est obligatoire",
//             'email.email' => 'L\'adresse email doit etre de type email',
//             'password.required' => 'Le password est obligatoire',
//             'password.string' => 'Le password doit etre de type chaine de caractères',
//             'password.max' => 'Le password ne doit pas dépasser 255 caractères ',
//              'telephone.max'=>'le telephone ne doit etre pas depasser 10 number'
// ]);

//         $nom = $request->nom;
//         $prenom = $request->prenom;
//         $email = $request->email;
//         $password = $request->password;
//         $telephone = $request->telephone;

//         DB::table('clients')->insert([
//             'nom'=>$nom,
//             'prenom'=>$prenom,
//             'email'=>$email,
//             'adresse'=>$password,
//             'date_naissance'=>$telephone
//         ]);

//         return redirect('/catalogue');
//     }

//     // modifer clients
//     public function update($id){
//         $c = DB::table('clients')->where('id',$id)->get();
//         return view('Clients.modifierClient', ['clients'=>$c]);
//     }

//     public function saveData(Request $request){
//         $request->validate([
//             'nom' => 'required',
//             'prenom' => 'required',
//             'email' => 'required|email',
//             'password' =>'required',
//             'telephone' => 'required'
//         ]);

//         $id = $request->input('id');
//         $nom = $request->input('nom');
//         $prenom = $request->input('prenom');
//         $email = $request->input('email');
//         $password = $request->input('password');
//         $telephone = $request->input('telephone');

//        DB::table('clients')->where('id',$id)->update([
//             'nom'=>$nom,
//             'prenom'=>$prenom,
//             'email'=>$email,
//             'adresse'=>$password,
//             'date_naissance'=>$telephone
//         ]);

//         return redirect('/catalogue');
//     }

//     // Supprimer client
//     public function store($id){
//         DB::table('clients')->where('id',$id)->delete();
//         return redirect('/catalogue');
//     }
// }







// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

// class clientController extends Controller
// {
//     // afficher clients
//     public function index() {
//         $clients = DB::table('clients')->get();
//         return view('clients.catalogue', compact('clients'));
//     }

//     // afficher form ajouter client
//     public function create() {
//         return view('clients.ajouterClient');
//     }

//     // stocker nouveau client
//     public function store(Request $request) {
//         DB::table('clients')->insert([
//             'nom' => $request->nom,
//             'email' => $request->email,
//             'telephone' => $request->telephone,
//             'adresse' => $request->adresse
//         ]);

//         return redirect('/catalogue')->with('success', 'Client ajouté avec succès!');
//     }

//     // supprimer client
//     public function delete($id) {
//         DB::table('clients')->where('id', $id)->delete();
//         return redirect('/catalogue')->with('success', 'Client supprimé!');
//     }

//     // afficher form modifier client
//     public function edit($id) {
//         $client = DB::table('clients')->where('id', $id)->first();
//         return view('clients.modifierClient', compact('client'));
//     }

//     // mettre à jour client
//     public function update(Request $request, $id) {
//         DB::table('clients')->where('id', $id)->update([
//             'nom' => $request->nom,
//             'email' => $request->email,
//             'telephone' => $request->telephone,
//             'adresse' => $request->adresse
//         ]);

//         return redirect('/catalogue')->with('success', 'Client modifié!');
//     }




// }



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index() {
        $clients = DB::table('clients')->get();
        return view('Clients.afficherClients', compact('clients'));
    }

    public function create() {
        return view('Clients.ajouterClient');
    }

    public function store(Request $request) {
        $request->validate([
            'nom'       => 'required|string|max:255',
            'prenom'    => 'required|string|max:255',
            'email'     => 'required|email|unique:clients,email',
            'telephone' => 'required|string|max:20',
            'password'  => 'required|min:6',
           ]);

        DB::table('clients')->insert([
            'nom'       => $request->nom,
            'prenom'    => $request->prenom,
            'email'     => $request->email,
            'telephone' => $request->telephone,
            'password'  => bcrypt($request->password),
             
        ]);

        return redirect('/catalogue')->with('success', 'Client ajouté!');
    }

    public function edit($id) {
        $client = DB::table('clients')->where('id', $id)->first();
        return view('Clients.modifierClient', compact('client'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nom'       => 'required|string|max:255',
            'prenom'    => 'required|string|max:255',
            'email'     => 'required|email|unique:clients,email,' . $id,
            'telephone' => 'required|string|max:20',
             
        ]);

        DB::table('clients')->where('id', $id)->update([
            'nom'       => $request->nom,
            'prenom'    => $request->prenom,
            'email'     => $request->email,
            'telephone' => $request->telephone,
        ]);

        return redirect('/catalogue')->with('success', 'Client modifié!');
    }

    public function destroy($id) {
        DB::table('clients')->where('id', $id)->delete();
        return redirect('/catalogue')->with('success', 'Client supprimé!');
    }

    // Login
// public function login(Request $request) {
//     $client = DB::table('clients')
//                 ->where('email', $request->email)
//                 ->where('password', $request->password)
//                 ->first();

//     if ($client) {
//         session(['client' => $client]);
//         return redirect('Clients.CompteClient');
//     }
//     return back()->with('error', 'Email ou mot de passe incorrect');
// }
public function login(Request $request) {
    $client = DB::table('clients')
                ->where('email', $request->email)
                ->where('password', $request->password)
                ->first();

    if ($client) {
        session(['client' => $client]);
        $redirect = session('redirect_after_login', '/CompteClient');
        session()->forget('redirect_after_login');
        return redirect($redirect);
    }
    return back()->with('error', 'Email ou mot de passe incorrect');
}

// Register
public function register(Request $request) {
    DB::table('clients')->insert([
        'nom'       => $request->nom,
        'prenom'    => $request->prenom,
        'email'     => $request->email,
        'password'  => $request->password,
        'telephone' => $request->telephone,
    ]);
    return redirect('/CompteClient')->with('success', 'Compte créé avec succès!');
}
public function compte() {
    $client = session('client');
    
    if (!$client) {
        return redirect('/login');
    }

    $achats = DB::table('achats')
                ->where('idClient', $client->idClient)
                ->orderBy('created_at', 'desc')
                ->get();
    
    return view('Clients.CompteClient', compact('client', 'achats'));
}
}