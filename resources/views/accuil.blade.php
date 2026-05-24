<!-- {{-- resources/views/catalogue.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue Produits — Andalocy</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

@include('Master.menu')

{{-- ✅ Messages flash --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- ✅ SLIDER --}}
<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('hand creme 1.jpg.jpeg') }}"
                class="d-block w-100"
                style="height:420px; object-fit:cover;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('soin cap.jpg.jpeg') }}"
                class="d-block w-100"
                style="height:420px; object-fit:cover;">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="fw-bold">Beauté & Cosmétique</h2>
                <p>Des produits naturels pour votre peau.</p>
                <a href="{{ route('categorie', ['categorie' => 'Soins mains']) }}"
                    class="btn btn-danger">Voir Produits</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button"
        data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button"
        data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

{{-- ✅ SERVICES --}}
<div class="container mt-5">
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <i class="bi bi-truck fs-1 text-primary"></i>
                    <h5 class="mt-3">Livraison Rapide</h5>
                    <p class="text-muted">Nous livrons vos produits rapidement partout au Maroc.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <i class="bi bi-shield-check fs-1 text-success"></i>
                    <h5 class="mt-3">Paiement Sécurisé</h5>
                    <p class="text-muted">Paiement sécurisé pour toutes vos commandes.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <i class="bi bi-bag-heart fs-1 text-danger"></i>
                    <h5 class="mt-3">Produits Cosmétiques</h5>
                    <p class="text-muted">Découvrez notre large gamme de produits cosmétiques.</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ✅ TITRE --}}
<div class="container mt-5 text-center">
    <h3 class="fw-bold">Notre Collection de Produits</h3>
    <p class="text-muted">Découvrez nos produits élégants et luxueux</p>
    <hr class="w-25 mx-auto border-2 border-dark">
</div>

{{-- ✅ PRODUITS DYNAMIQUES depuis la base de données --}}
<div class="container mt-4">
    <div class="row g-4 justify-content-center">
        @forelse($produits as $produit)
            <div class="col-md-3 text-center">
                <div class="card mb-4 border-0 bg-white p-2 shadow-sm h-100">
                    <a href="{{ route('produit.show', $produit->idProduit) }}">
                        <img src="{{ asset('storage/' . $produit->image) }}"
                            class="img-fluid rounded"
                            style="height:250px; width:100%; object-fit:contain;">
                    </a>
                    <div class="card-body">
                        <p class="fw-bold mb-1">{{ $produit->nomP }}</p>
                        <p class="text-danger fw-bold">{{ $produit->prix }} Dh</p>

                        {{-- ✅ Bouton ajouter au panier --}}
                        @auth
                            <a href="{{ route('panier.ajouter', $produit->idProduit) }}"
                                class="btn btn-dark btn-sm w-100">
                                <i class="bi bi-cart-plus"></i> Ajouter au panier
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="btn btn-outline-dark btn-sm w-100">
                                <i class="bi bi-person"></i> Connectez-vous
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Aucun produit disponible.</p>
            </div>
        @endforelse
    </div>
</div>

{{-- ✅ SECTION INFO --}}
<div class="container mt-5 mb-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('catalogue cosmetique 2026  rec copy.jpg.jpeg') }}"
                class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h3 class="fw-bold mb-3">Pourquoi choisir Andalocy ?</h3>
            <p class="text-muted">
                Andalocy vous propose une sélection de produits cosmétiques
                de haute qualité pour prendre soin de votre peau et de votre beauté.
            </p>
            <p class="text-muted">
                Nos produits sont soigneusement choisis pour offrir
                élégance, douceur et efficacité.
            </p>
            <a href="{{ route('catalogue') }}" class="btn btn-dark mt-3">
                Découvrir plus
            </a>
        </div>
    </div>
</div>

@include('Master.footer')

</body>
</html -->