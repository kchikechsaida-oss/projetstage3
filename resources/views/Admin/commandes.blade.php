{{-- resources/views/Admin/commandes.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Commandes</title>
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
        <a href="{{ route('admin.commandes') }}" class="active">
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
                class="btn text-start w-100 p-2"
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
                <i class="bi bi-cart"></i> Gestion des Commandes
            </h5>
            {{-- ✅ Auth::user() --}}
            <span>
                Bonjour, <strong>{{ session('admin_nom') }}</strong>
                <span class="badge bg-danger ms-2">Admin</span>
            </span>
        </div>

        <div class="p-4">

            {{-- ✅ Messages flash --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- ✅ Stats commandes --}}
            <div class="row mb-4 text-center">
                <div class="col-md-3">
                    <div class="card bg-primary text-white p-3 border-0">
                        <h4>{{ $commandes->count() }}</h4>
                        <p class="mb-0">Total Commandes</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning text-white p-3 border-0">
                        <h4>{{ $commandes->where('statut', 'en attente')->count() }}</h4>
                        <p class="mb-0">En Attente</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white p-3 border-0">
                        <h4>{{ $commandes->where('statut', 'livrée')->count() }}</h4>
                        <p class="mb-0">Livrées</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-danger text-white p-3 border-0">
                        <h4>{{ $commandes->sum('total') }} DH</h4>
                        <p class="mb-0">Revenu Total</p>
                    </div>
                </div>
            </div>

            {{-- ✅ Table commandes --}}
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Téléphone</th>
                                <th>Ville</th>
                                <th>Total</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($commandes as $commande)
                            <tr>
                                <td>
                                    {{ str_pad($commande->idCommande, 4, '0', STR_PAD_LEFT) }}
                                </td>
                                <td>
                                    <strong>{{ $commande->prenom }} {{ $commande->nom }}</strong>
                                </td>
                                <td>{{ $commande->telephone }}</td>
                                <td>{{ $commande->ville ?? '—' }}</td>
                                <td>
                                    <strong class="text-success">{{ $commande->total }} DH</strong>
                                </td>

                                {{-- ✅ Badge statut coloré --}}
                                <td>
                                    @php
                                        $badge = match($commande->statut) {
                                            'en attente' => 'warning text-dark',
                                            'confirmée'  => 'info text-white',
                                            'livrée'     => 'success',
                                            'annulée'    => 'danger',
                                            default      => 'secondary'
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $badge }}">
                                        {{ $commande->statut }}
                                    </span>
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($commande->created_at)->format('d/m/Y') }}
                                </td>

                                <td>
                                    {{-- ✅ Facture PDF --}}
                                    <a href="{{ route('commande.facture', $commande->idCommande) }}"
                                        class="btn btn-secondary btn-sm"
                                        title="Télécharger facture">
                                        <i class="bi bi-file-pdf"></i>
                                    </a>

                                    {{-- ✅ Modifier statut --}}
                                    <button class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalStatut{{ $commande->idCommande }}"
                                        title="Changer statut">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </td>
                            </tr>

                            {{-- ✅ Modal statut --}}
                            <div class="modal fade" id="modalStatut{{ $commande->idCommande }}"
                                tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                Modifier statut — Commande
                                                #{{ str_pad($commande->idCommande, 4, '0', STR_PAD_LEFT) }}
                                            </h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <form method="POST"
                                            action="{{ route('admin.commandes.statut', $commande->idCommande) }}">
                                            @csrf
                                            <div class="modal-body">
                                                <select name="statut" class="form-select">
                                                    @foreach(['en attente','confirmée','livrée','annulée'] as $s)
                                                        <option value="{{ $s }}"
                                                            {{ $commande->statut == $s ? 'selected' : '' }}>
                                                            {{ ucfirst($s) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-primary">
                                                    Enregistrer
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="bi bi-cart-x fs-2"></i>
                                    <p class="mt-2">Aucune commande trouvée</p>
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