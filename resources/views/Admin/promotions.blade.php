{{-- resources/views/Admin/promotions.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Promotions</title>
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
    </style>
</head>
<body>

<div class="container-fluid p-0">
<div class="row g-0">

    {{-- ✅ Sidebar --}}
    <div class="col-md-2 sidebar">
        <h4> Andalocy</h4>
        <a href="{{ route('admin.dashboard') }}">
            <i class="bi bi-box-seam"></i> Produits
        </a>
        <a href="{{ route('admin.clients') }}">
            <i class="bi bi-people"></i> Clients
        </a>
        <a href="{{ route('admin.commandes') }}">
            <i class="bi bi-cart"></i> Commandes
        </a>
        <a href="{{ route('admin.promotions') }}" class="active">
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
                <i class="bi bi-tag"></i> Gestion des Promotions
            </h5>
            {{-- ✅ Auth::user() --}}
            <span>
                Bonjour,
                <strong>{{ session('admin_nom') }}</strong>
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

            {{-- ✅ Erreurs validation --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ✅ Formulaire ajouter promotion --}}
            <div class="card shadow-sm mb-4 p-4 border-0">
                <h5 class="mb-3">
                    <i class="bi bi-plus-circle"></i> Ajouter une promotion
                </h5>

                <form method="POST"
                    action="{{ route('admin.promotions.ajouter') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3 align-items-end">

                        {{-- Produit --}}
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Produit</label>
                            <select name="idProduit"
                                class="form-select @error('idProduit') is-invalid @enderror"
                                required>
                                <option value="">-- Choisir un produit --</option>
                                @foreach($produits as $p)
                                    <option value="{{ $p->idProduit }}">
                                        {{ $p->nomP }} — {{ $p->prix }} DH
                                    </option>
                                @endforeach
                            </select>
                            @error('idProduit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Prix promo --}}
                        <div class="col-md-2">
                            <label class="form-label fw-bold">Prix promo (DH)</label>
                            <input type="number"
                                name="prix_promo"
                                class="form-control @error('prix_promo') is-invalid @enderror"
                                placeholder="Ex: 45"
                                min="0"
                                step="0.01"
                                required>
                            @error('prix_promo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Date début --}}
                        <div class="col-md-2">
                            <label class="form-label fw-bold">Date début</label>
                            <input type="date"
                                name="date_debut"
                                class="form-control @error('date_debut') is-invalid @enderror"
                                required>
                            @error('date_debut')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Date fin --}}
                        <div class="col-md-2">
                            <label class="form-label fw-bold">Date fin</label>
                            <input type="date"
                                name="date_fin"
                                class="form-control @error('date_fin') is-invalid @enderror"
                                required>
                            @error('date_fin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Bouton --}}
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="bi bi-check-circle"></i> Ajouter
                            </button>
                        </div>

                    </div>
                </form>
            </div>

            {{-- ✅ Stats promotions --}}
            <div class="row mb-4 text-center">
                <div class="col-md-4">
                    <div class="card bg-primary text-white p-3 border-0">
                        <h4>{{ $promotions->count() }}</h4>
                        <p class="mb-0">Total Promotions</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success text-white p-3 border-0">
                        <h4>
                            {{ $promotions->where('date_fin', '>=', now()->toDateString())->count() }}
                        </h4>
                        <p class="mb-0">Promotions Actives</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-secondary text-white p-3 border-0">
                        <h4>
                            {{ $promotions->where('date_fin', '<', now()->toDateString())->count() }}
                        </h4>
                        <p class="mb-0">Promotions Expirées</p>
                    </div>
                </div>
            </div>

            {{-- ✅ Table promotions --}}
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>Image</th>
                                <th>Produit</th>
                                <th>Prix ancien</th>
                                <th>Prix promo</th>
                                <th>Réduction</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($promotions as $promo)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $promo->image) }}"
                                        width="55" height="55"
                                        style="object-fit:contain; border-radius:8px;">
                                </td>
                                <td class="fw-bold">{{ $promo->nomP }}</td>
                                <td>
                                    <s class="text-muted">{{ $promo->prix_ancien }} DH</s>
                                </td>
                                <td>
                                    <strong class="text-success">{{ $promo->prix_promo }} DH</strong>
                                </td>
                                <td>
                                    <span class="badge bg-danger">
                                        -{{ round((($promo->prix_ancien - $promo->prix_promo) / $promo->prix_ancien) * 100) }}%
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($promo->date_debut)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($promo->date_fin)->format('d/m/Y') }}</td>

                                {{-- ✅ Statut active/expirée --}}
                                <td>
                                    @if($promo->date_fin >= now()->toDateString())
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Expirée</span>
                                    @endif
                                </td>

                                <td>
                                    {{-- ✅ Supprimer --}}
                                    <a href="{{ route('admin.promotions.supprimer', $promo->id) }}"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Supprimer cette promotion ?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">
                                    <i class="bi bi-tag fs-2"></i>
                                    <p class="mt-2">Aucune promotion trouvée</p>
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