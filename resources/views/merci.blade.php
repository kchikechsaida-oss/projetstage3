<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande confirmée</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
</head>
<body>
@include('Master.menu')
<div class="container text-center mt-5">
    <div class="py-5">
        <h1 style="font-size:80px;">✅</h1>
        <h2 class="fw-bold">Commande confirmée!</h2>
        <p class="text-muted fs-5">
            Merci pour votre commande.<br>
            Vous serez contacté pour confirmer la livraison.
        </p>

        @if(request('points') > 0)
        <div class="alert alert-success d-inline-block mt-3">
            ⭐ Vous avez gagné <strong>{{ request('points') }} points</strong> !
        </div>
        @endif

        <div class="alert alert-info d-inline-block mt-3">
            💵 Paiement: <strong>À la livraison (Cash)</strong>
        </div>

        <div class="mt-4">
            <a href="/merci/facture/{{ request('commande') }}" 
               class="btn btn-primary me-2">
                📄 Télécharger la facture
            </a>
            <a href="/produits" class="btn btn-success me-2">
                🛍️ Continuer les achats
            </a>
            <a href="/CompteClient" class="btn btn-outline-dark">
                👤 Mon compte
            </a>
        </div>
    </div>
</div>
@include('Master.footer')
</body>
</html>