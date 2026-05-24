{{-- resources/views/Admin/gstionProduits.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Produits — Admin</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { background: linear-gradient(to right, #f8f9fa, #e3f2fd); }
        .card:hover { transform: scale(1.03); transition: 0.3s; }
    </style>
</head>
<body>

@include('Master.menu')

<div class="container mt-5 mb-5">

    {{-- ✅ Messages flash --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-x-circle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- ✅ Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-box-seam"></i> Gestion Produits
        </h2>
        <a href="{{ route('produit.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Ajouter Produit
        </a>
    </div>

    {{-- ✅ Stats --}}
    <div class="row mb-4 text-center">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-primary text-white p-3">
                <h4>{{ $produits->count() }}</h4>
                <p class="mb-0">Produits</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-success text-white p-3">
                <h4>{{ $totalClients ?? 0 }}</h4>
                <p class="mb-0">Clients</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-warning text-white p-3">
                <h4>{{ $totalCommandes ?? 0 }}</h4>
                <p class="mb-0">Commandes</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-danger text-white p-3">
                <h4>{{ $totalRevenu ?? 0 }} DH</h4>
                <p class="mb-0">Revenu</p>
            </div>
        </div>
    </div>

    {{-- ✅ Produits --}}
    <div class="row g-4">
        @forelse($produits as $produit)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 rounded-4">

                {{-- Image --}}
                <img src="{{ asset('storage/' . $produit->image) }}"
                    class="card-img-top rounded-top-4"
                    style="height:200px; object-fit:cover;">

                <div class="card-body text-center">

                    {{-- Nom --}}
                    <h5 class="card-title fw-bold">{{ $produit->nomP }}</h5>

                    {{-- Catégorie --}}
                    <span class="badge bg-secondary mb-2">
                        {{ $produit->categorie }}
                    </span>

                    {{-- Prix --}}
                    <p class="text-success fw-bold fs-5">
                        {{ $produit->prix }} DH
                    </p>

                    {{-- Description --}}
                    <p class="text-muted small">
                        {{ Str::limit($produit->description, 80) }}
                    </p>

                </div>

                {{-- ✅ Boutons --}}
                <div class="card-footer bg-white border-0 text-center pb-3">
                    <div class="d-flex gap-2 justify-content-center">

                        {{-- Voir --}}
                        <a href="{{ route('produit.show', $produit->idProduit) }}"
                            class="btn btn-info btn-sm text-white">
                            <i class="bi bi-eye"></i> Voir
                        </a>

                        {{-- ✅ Modifier --}}
                        <a href="{{ route('produit.edit', $produit->idProduit) }}"
                            class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Modifier
                        </a>

                        {{-- ✅ Supprimer --}}
                        <a href="{{ route('produit.delete', $produit->idProduit) }}"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Supprimer ce produit ?')">
                            <i class="bi bi-trash"></i> Supprimer
                        </a>

                    </div>
                </div>
            </div>
        </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-inbox fs-1 text-muted"></i>
                <h5 class="text-muted mt-3">Aucun produit trouvé</h5>
                <a href="{{ route('produit.create') }}" class="btn btn-primary mt-2">
                    <i class="bi bi-plus-circle"></i> Ajouter un produit
                </a>
            </div>
        @endforelse
    </div>

</div>

@include('Master.footer')

</body>
</html>