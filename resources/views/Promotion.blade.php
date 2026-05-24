{{-- resources/views/Promotion.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotions — Andalocy</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .title { text-align:center; margin-top:40px; margin-bottom:40px; font-weight:700; color:#3D2B1F; }
        .old-price { text-decoration:line-through; color:gray; }
        .new-price { color:#b76e79; font-weight:bold; font-size:20px; }
        .badge-promo { position:absolute; top:10px; right:10px; background:#e74c3c; color:white; padding:5px 10px; border-radius:20px; font-weight:bold; font-size:13px; }
        .card { border-radius: 15px; transition: transform 0.2s; }
        .card:hover { transform: translateY(-5px); }
    </style>
</head>
<body>

@include('Master.menu')
{{-- ✅ Correct --}}
{{-- ✅ Messages flash --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show m-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show m-3">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="container">
    <h2 class="title"> Nos Promotions</h2>

    <div class="row g-4 mb-5">
        @forelse($promotions as $promo)
        <div class="col-md-4">
            <div class="card shadow-sm position-relative h-100">

                {{-- ✅ Badge réduction --}}
                <span class="badge-promo">
                    -{{ round((($promo->prix_ancien - $promo->prix_promo) / $promo->prix_ancien) * 100) }}%
                </span>

                {{-- ✅ Image corrigée --}}
                <img src="{{ asset('storage/' . $promo->image_produit) }}"
                    class="card-img-top"
                    style="height:200px; object-fit:contain; padding:10px;">

                <div class="card-body text-center d-flex flex-column">
                    <h5 class="card-title fw-bold">{{ $promo->nomP }}</h5>
                    <p class="card-text text-muted">
                        {{ Str::limit($promo->description, 60) }}
                    </p>

                    {{-- ✅ Prix --}}
                    <p class="mb-1">
                        <span class="old-price">{{ $promo->prix_ancien }} DH</span>
                        <span class="new-price ms-2">{{ $promo->prix_promo }} DH</span>
                    </p>

                    {{-- ✅ Économie --}}
                    <p class="text-success small">
                        Vous économisez :
                        <strong>{{ $promo->prix_ancien - $promo->prix_promo }} DH</strong>
                    </p>

                    {{-- ✅ Date fin --}}
                    <small class="text-muted d-block mb-3">
                        <i class="bi bi-calendar"></i>
                        Jusqu'au {{ date('d/m/Y', strtotime($promo->date_fin)) }}
                    </small>

                    {{-- ✅ Bouton panier corrigé avec Auth --}}
                    <div class="mt-auto">
                        @auth
                            <a href="{{ route('panier.ajouter', $promo->idProduit) }}"
                                class="btn btn-success w-100">
                                <i class="bi bi-cart-plus"></i> Ajouter au panier
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="btn btn-outline-dark w-100">
                                <i class="bi bi-person"></i> Connectez-vous pour acheter
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-tag fs-1 text-muted"></i>
            <h5 class="text-muted mt-3">Aucune promotion disponible pour le moment</h5>
            <a href="{{ route('catalogue') }}" class="btn btn-dark mt-3">
                Voir le catalogue
            </a>
        </div>
        @endforelse
    </div>
</div>

@include('Master.footer')

</body>
</html>