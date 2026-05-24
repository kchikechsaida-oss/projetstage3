{{-- resources/views/panier.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier — Andalocy</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { background: #f8f9fa; }
        .title { text-align:center; margin:30px 0; font-weight:bold; color:#2c3e50; }
        .card { border-radius: 15px; }
        .total-box { background:white; padding:20px; border-radius:15px; box-shadow:0 5px 15px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

@include('Master.menu')

<div class="container mt-4">

    {{-- ✅ Messages flash --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <h2 class="title">🛒 Mon Panier</h2>

    <div class="row">

        {{-- ✅ Produits --}}
        <div class="col-md-8">
            @forelse($panier as $id => $item)
            <div class="card mb-3 shadow-sm">
                <div class="row g-0 align-items-center">

                    {{-- Image --}}
                    <div class="col-md-3 text-center p-2">
                        <img src="{{ asset('storage/' . $item['image']) }}"
                            class="img-fluid"
                            style="height:120px; object-fit:contain;">
                    </div>

                    {{-- Infos --}}
                    <div class="col-md-4">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $item['nom'] }}</h5>
                            <p class="text-danger fw-bold">{{ $item['prix'] }} DH</p>
                            <p class="text-muted">
                                Sous-total :
                                <strong>{{ $item['prix'] * $item['quantite'] }} DH</strong>
                            </p>
                        </div>
                    </div>

                    {{-- ✅ Quantité + / - --}}
                    <div class="col-md-3 text-center">
                        <div class="d-flex align-items-center justify-content-center gap-2">
                            <a href="{{ route('panier.diminuer', $id) }}"
                                class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-dash"></i>
                            </a>
                            <span class="fw-bold fs-5">{{ $item['quantite'] }}</span>
                            <a href="{{ route('panier.augmenter', $id) }}"
                                class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-plus"></i>
                            </a>
                        </div>
                    </div>

                    {{-- ✅ Supprimer --}}
                    <div class="col-md-2 text-center">
                        <a href="{{ route('panier.supprimer', $id) }}"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Supprimer ce produit ?')">
                            <i class="bi bi-trash"></i>
                        </a>
                    </div>

                </div>
            </div>
            @empty
                <div class="alert alert-warning text-center">
                    <i class="bi bi-cart-x fs-1"></i>
                    <p class="mt-2">Votre panier est vide 🛒</p>
                    <a href="{{ route('catalogue') }}" class="btn btn-dark mt-2">
                        Voir le catalogue
                    </a>
                </div>
            @endforelse

            {{-- ✅ Vider panier --}}
            @if(!empty($panier))
                <a href="{{ route('panier.vider') }}"
                    class="btn btn-outline-danger mt-2"
                    onclick="return confirm('Vider tout le panier ?')">
                    <i class="bi bi-trash"></i> Vider le panier
                </a>
            @endif
        </div>

        {{-- ✅ Total --}}
        <div class="col-md-4">
            <div class="total-box">
                <h4 class="fw-bold">
                    <i class="bi bi-receipt"></i> Récapitulatif
                </h4>
                <hr>

                {{-- Détail items --}}
                @foreach($panier as $item)
                    <div class="d-flex justify-content-between mb-1">
                        <span>{{ $item['nom'] }} x{{ $item['quantite'] }}</span>
                        <span>{{ $item['prix'] * $item['quantite'] }} DH</span>
                    </div>
                @endforeach

                <hr>

                {{-- ✅ Total depuis controller --}}
                <div class="d-flex justify-content-between">
                    <h5>Total</h5>
                    <h5 class="text-success fw-bold">{{ $total }} DH</h5>
                </div>

                {{-- ✅ Bouton commander --}}
                @if(!empty($panier))
                    <a href="{{ route('livraison') }}"
                        class="btn btn-success w-100 mt-3">
                        <i class="bi bi-check-circle"></i> Commander
                    </a>
                @else
                    <button class="btn btn-secondary w-100 mt-3" disabled>
                        Panier vide
                    </button>
                @endif

                {{-- ✅ Continuer shopping --}}
                <a href="{{ route('catalogue') }}"
                    class="btn btn-outline-dark w-100 mt-2">
                    <i class="bi bi-arrow-left"></i> Continuer mes achats
                </a>
            </div>
        </div>

    </div>
</div>

@include('Master.footer')

</body>
</html>