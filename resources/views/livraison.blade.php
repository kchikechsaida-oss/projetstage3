<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout</title>
<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background: #f5f5f5; }
.checkout-container { padding: 40px; }
.form-section { background: white; padding: 25px; border-radius: 10px; }
.summary { background: #f1ebe5; padding: 25px; border-radius: 10px; }
.form-control { border-radius: 8px; padding: 10px; }
.btn-main { background: #8B6F47; color: white; border-radius: 8px; }
.btn-main:hover { background: #6f5638; color: white; }
</style>
</head>
<body>

@include('Master.menu')

<form method="POST" action="/livraison">
@csrf
<input type="hidden" name="total" value="{{ $total }}">

<div class="container-fluid checkout-container">
<div class="row">

    <!-- LEFT FORM -->
    <div class="col-md-7">
    <div class="form-section">

        <h5>Contact</h5>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" 
                   placeholder="Adresse e-mail"
                   value="{{ $client->email }}" required>
        </div>

        <h5>Livraison</h5>
        <div class="mb-3">
            <select class="form-control" name="pays">
                <option>Maroc</option>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="text" name="prenom" class="form-control" 
                       placeholder="Prénom"
                       value="{{ $client->prenom }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" name="nom" class="form-control" 
                       placeholder="Nom"
                       value="{{ $client->nom }}" required>
            </div>
        </div>

        <div class="mb-3">
            <input type="text" name="adresse" class="form-control" 
                   placeholder="Adresse" required>
        </div>

        <div class="mb-3">
            <input type="text" name="appartement" class="form-control" 
                   placeholder="Appartement (optionnel)">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="text" name="code_postal" class="form-control" 
                       placeholder="Code postal" required>
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" name="ville" class="form-control" 
                       placeholder="Ville" required>
            </div>
        </div>

        <div class="mb-3">
            <input type="text" name="telephone" class="form-control" 
                   placeholder="Téléphone"
                   value="{{ $client->telephone }}" required>
        </div>

        <button type="submit" class="btn btn-main w-100">
            ✔ Valider la commande
        </button>

    </div>
    </div>

    <!-- RIGHT SUMMARY -->
    <div class="col-md-5">
    <div class="summary">

        {{-- Produits --}}
        @foreach($panier as $item)
        <div class="d-flex align-items-center mb-3">
            <img src="{{ asset('storage/'.$item['image']) }}" 
                 class="rounded me-3" style="width:60px; height:60px; object-fit:contain;">
            <div>
                <p class="mb-0">{{ $item['nom'] }}</p>
                <small>Qté: {{ $item['quantite'] }}</small>
            </div>
            <div class="ms-auto">{{ $item['prix'] * $item['quantite'] }} DH</div>
        </div>
        @endforeach

        <hr>

        <div class="d-flex justify-content-between">
            <span>Sous-total</span>
            <span>{{ $total }} DH</span>
        </div>
        <div class="d-flex justify-content-between">
            <span>Livraison</span>
            <span>Gratuite</span>
        </div>
        <hr>
        <div class="d-flex justify-content-between fw-bold">
            <span>Total</span>
            <span>{{ $total }} DH</span>
        </div>

    </div>
    </div>

</div>
</div>
</form>

@include('Master.footer')
</body>
</html>