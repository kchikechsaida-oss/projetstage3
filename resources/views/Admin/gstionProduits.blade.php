{{-- resources/views/Admin/gstionProduits.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Produits</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { background: #f8f9fa; }
        .sidebar { background:#2c3e50; min-height:100vh; padding:20px; }
        .sidebar h4 { color:white; font-weight:700; margin-bottom:30px; }
        .sidebar a { color:#bdc3c7; text-decoration:none; display:block; padding:10px; border-radius:8px; margin-bottom:5px; transition:0.2s; }
        .sidebar a:hover { background:#34495e; color:white; }
        .sidebar a.active { background:#8B6F47; color:white; }
        .topbar { background:white; padding:15px 25px; border-bottom:1px solid #eee; display:flex; justify-content:space-between; align-items:center; }
        .card-stat { border-radius:12px; padding:20px; color:white; }
    </style>
</head>
<body>

<div class="container-fluid p-0">
<div class="row g-0">

    {{-- ✅ Sidebar --}}
    <div class="col-md-2 sidebar">
        <h4> Andalocy</h4>
        <a href="{{ route('admin.dashboard') }}" class="active">
            <i class="bi bi-box-seam"></i> Produits
        </a>
        <a href="{{ route('admin.clients') }}">
            <i class="bi bi-people"></i> Clients
        </a>
        <a href="{{ route('admin.commandes') }}">
            <i class="bi bi-cart"></i> Commandes
        </a>
        <a href="{{ route('admin.promotions') }}">
            <i class="bi bi-tag"></i> Promotions
        </a>
        <a href="{{ route('admin.achats') }}">
            <i class="bi bi-star"></i> Points & Achats
        </a>

        {{-- ✅ Logout Breeze --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="btn text-start w-100 p-2 mt-3"
                style="color:#bdc3c7; border:none; background:none;">
                <i class="bi bi-box-arrow-right"></i> Déconnexion
            </button>
        </form>
    </div>

    {{-- ✅ Contenu --}}
    <div class="col-md-10">

        {{-- Topbar --}}
        <div class="topbar">
            <h5 class="mb-0">
                <i class="bi bi-box-seam"></i> Gestion des Produits
            </h5>
            {{-- ✅ Auth::user() --}}
            <span>
                Bonjour, <strong>{{ Auth::user()->client->prenom ?? Auth::user()->email }}</strong>
                <span class="badge bg-danger ms-2">Admin</span>
            </span>
        </div>

        <div class="p-4">

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

            {{-- ✅ Stats --}}
            <div class="row mb-4 text-center">
                <div class="col-md-3">
                    <div class="card-stat bg-primary shadow-sm">
                        <h4>{{ $produits->count() }}</h4>
                        <p class="mb-0"><i class="bi bi-box-seam"></i> Produits</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-stat bg-success shadow-sm">
                        <h4>{{ $totalClients ?? 0 }}</h4>
                        <p class="mb-0"><i class="bi bi-people"></i> Clients</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-stat bg-warning shadow-sm">
                        <h4>{{ $totalCommandes ?? 0 }}</h4>
                        <p class="mb-0"><i class="bi bi-cart"></i> Commandes</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-stat bg-danger shadow-sm">
                        <h4>{{ $totalRevenu ?? 0 }} DH</h4>
                        <p class="mb-0"><i class="bi bi-cash"></i> Revenu</p>
                    </div>
                </div>
            </div>

            {{-- ✅ Header table --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0">
                    Liste des produits
                    <span class="badge bg-secondary ms-2">
                        {{ $produits->count() }}
                    </span>
                </h5>
                <a href="{{ route('produit.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Ajouter produit
                </a>
            </div>

            {{-- ✅ Table produits --}}
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Catégorie</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($produits as $produit)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $produit->image) }}"
                                        width="55" height="55"
                                        style="object-fit:contain; border-radius:8px;">
                                </td>
                                <td class="fw-bold">{{ $produit->nomP }}</td>
                                <td>
                                    <span class="badge bg-success">
                                        {{ $produit->prix }} DH
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $produit->categorie }}
                                    </span>
                                </td>
                                <td class="text-muted small">
                                    {{ Str::limit($produit->description, 50) }}
                                </td>
                                <td>
                                    {{-- ✅ Voir --}}
                                    <a href="{{ route('produit.show', $produit->idProduit) }}"
                                        class="btn btn-info btn-sm text-white"
                                        title="Voir">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    {{-- ✅ Modifier --}}
                                    <a href="{{ route('produit.edit', $produit->idProduit) }}"
                                        class="btn btn-warning btn-sm"
                                        title="Modifier">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    {{-- ✅ Supprimer --}}
                                    <a href="{{ route('produit.delete', $produit->idProduit) }}"
                                        class="btn btn-danger btn-sm"
                                        title="Supprimer"
                                        onclick="return confirm('Supprimer ce produit ?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="bi bi-inbox fs-2"></i>
                                    <p class="mt-2">Aucun produit trouvé</p>
                                    <a href="{{ route('produit.create') }}"
                                        class="btn btn-primary btn-sm">
                                        Ajouter un produit
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>
</div>

</body>
</html>