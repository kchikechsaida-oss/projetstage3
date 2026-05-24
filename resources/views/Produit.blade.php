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
</head>
<body>

@include('Master.menu')

<div class="container mt-5">

    {{-- ✅ Messages flash --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- ✅ Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">
            <i class="bi bi-box-seam"></i> Gestion des Produits
        </h2>
        <a href="{{ route('produit.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Ajouter Produit
        </a>
    </div>

    {{-- ✅ Stats --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white text-center p-3">
                <h4>{{ $produits->count() }}</h4>
                <p class="mb-0">Total Produits</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white text-center p-3">
                <h4>{{ $totalClients ?? 0 }}</h4>
                <p class="mb-0">Total Clients</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white text-center p-3">
                <h4>{{ $totalCommandes ?? 0 }}</h4>
                <p class="mb-0">Total Commandes</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white text-center p-3">
                <h4>{{ $totalRevenu ?? 0 }} DH</h4>
                <p class="mb-0">Revenu Total</p>
            </div>
        </div>
    </div>

    {{-- ✅ Table produits --}}
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produits as $p)
                    <tr>
                        <td>{{ $p->idProduit }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $p->image) }}"
                                style="height:60px; width:60px; object-fit:cover;"
                                class="rounded">
                        </td>
                        <td>{{ $p->nomP }}</td>
                        <td>
                            <span class="badge bg-success">
                                {{ $p->prix }} DH
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-secondary">
                                {{ $p->categorie }}
                            </span>
                        </td>
                        <td>{{ Str::limit($p->description, 50) }}</td>
                        <td>
                            {{-- ✅ Voir --}}
                            <a href="{{ route('produit.show', $p->idProduit) }}"
                                class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>

                            {{-- ✅ Modifier --}}
                            <a href="{{ route('produit.edit', $p->idProduit) }}"
                                class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>

                            {{-- ✅ Supprimer --}}
                            <a href="{{ route('produit.delete', $p->idProduit) }}"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Confirmer la suppression ?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            Aucun produit trouvé.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@include('Master.footer')

</body>
</html>