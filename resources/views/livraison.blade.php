{{-- resources/views/livraison.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande — Andalocy</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { background: #f5f5f5; }
        .checkout-container { padding: 40px; }
        .form-section { background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .summary { background: #f1ebe5; padding: 25px; border-radius: 10px; }
        .form-control { border-radius: 8px; padding: 10px; }
        .btn-main { background: #8B6F47; color: white; border-radius: 8px; }
        .btn-main:hover { background: #6f5638; color: white; }
    </style>
</head>
<body>

@include('Master.menu')

{{-- ✅ Messages flash --}}
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show m-3">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- ✅ Erreurs validation --}}
@if($errors->any())
    <div class="alert alert-danger m-3">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('commande.store') }}">
@csrf
<input type="hidden" name="total" value="{{ $total }}">

<div class="container-fluid checkout-container">
    <div class="row">

        {{-- ✅ LEFT — Formulaire --}}
        <div class="col-md-7">
            <div class="form-section">

                {{-- Contact --}}
                <h5 class="fw-bold mb-3">
                    <i class="bi bi-person"></i> Contact
                </h5>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control"
                        placeholder="Adresse e-mail"
                        value="{{ $client->email }}"
                        readonly required>
                </div>

                {{-- Livraison --}}
                <h5 class="fw-bold mb-3">
                    <i class="bi bi-truck"></i> Livraison
                </h5>

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
                        placeholder="Adresse"
                        value="{{ $client->adresse ?? '' }}" required>
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
                        value="{{ $client->telephone ?? '' }}" required>
                </div>

                {{-- ✅ Paiement --}}
                <h5 class="fw-bold mb-3">
                    <i class="bi bi-cash"></i> Paiement
                </h5>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio"
                        name="paiement" value="cash" checked>
                    <label class="form-check-label">
                        💵 Paiement à la livraison
                    </label>
                </div>

                {{-- ✅ Points --}}
                @php
                    $client_points = $client->points ?? 0;
                @endphp
                @if($client_points > 0)
                <div class="alert alert-info">
                    <i class="bi bi-star-fill text-warning"></i>
                    Vous avez <strong>{{ $client_points }} points</strong>
                    (= {{ $client_points }} DH de remise)
                    <div class="mt-2">
                        <label>Utiliser des points :</label>
                        <input type="number" name="utiliser_points"
                            class="form-control mt-1"
                            min="0" max="{{ $client_points }}"
                            placeholder="0">
                    </div>
                </div>
                @endif

                <button type="submit" class="btn btn-main w-100 mt-3">
                    <i class="bi bi-check-circle"></i> Valider la commande
                </button>

            </div>
        </div>

        {{-- ✅ RIGHT — Résumé commande --}}
        <div class="col-md-5">
            <div class="summary">

                <h5 class="fw-bold mb-3">
                    <i class="bi bi-bag"></i> Résumé de la commande
                </h5>

                {{-- Produits --}}
                @foreach($panier as $item)
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('storage/' . $item['image']) }}"
                        class="rounded me-3"
                        style="width:60px; height:60px; object-fit:contain;">
                    <div>
                        <p class="mb-0 fw-bold">{{ $item['nom'] }}</p>
                        <small class="text-muted">Qté: {{ $item['quantite'] }}</small>
                    </div>
                    <div class="ms-auto fw-bold">
                        {{ $item['prix'] * $item['quantite'] }} DH
                    </div>
                </div>
                @endforeach

                <hr>

                <div class="d-flex justify-content-between mb-2">
                    <span>Sous-total</span>
                    <span>{{ $total }} DH</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Livraison</span>
                    <span class="text-success fw-bold">Gratuite</span>
                </div>

                <hr>

                <div class="d-flex justify-content-between fw-bold fs-5">
                    <span>Total</span>
                    <span class="text-success">{{ $total }} DH</span>
                </div>

                {{-- ✅ Points à gagner --}}
                <div class="alert alert-warning mt-3 text-center">
                    <i class="bi bi-star-fill"></i>
                    Vous allez gagner
                    <strong>{{ floor($total / 10) }} points</strong>
                    avec cette commande !
                </div>

            </div>
        </div>

    </div>
</div>
</form>

@include('Master.footer')

</body>
</html>