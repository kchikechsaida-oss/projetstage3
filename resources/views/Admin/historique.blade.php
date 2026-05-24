{{-- resources/views/Admin/historique.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Points & Achats</title>
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

    {{-- Sidebar --}}
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
        <a href="{{ route('admin.promotions') }}">
            <i class="bi bi-tag"></i> Promotions
        </a>
        <a href="{{ route('admin.achats') }}" class="active">
            <i class="bi bi-star"></i> Points & Achats
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="btn text-start w-100 p-2 mt-3"
                style="color:#bdc3c7; border:none; background:none;">
                <i class="bi bi-box-arrow-right"></i> Déconnexion
            </button>
        </form>
    </div>

    {{-- Contenu --}}
    <div class="col-md-10">

        <div class="topbar">
            <h5 class="mb-0">
                <i class="bi bi-star"></i> Points & Achats
            </h5>
            <span>
                Bonjour, <strong>{{ Auth::user()->email }}</strong>
                <span class="badge bg-danger ms-2">Admin</span>
            </span>
        </div>

        <div class="p-4">

            {{-- Stats --}}
            <div class="row mb-4 text-center">
                <div class="col-md-4">
                    <div class="card bg-primary text-white p-3 border-0">
                        <h4>{{ count($achats) }}</h4>
                        <p class="mb-0">Total Achats</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success text-white p-3 border-0">
                        <h4>{{ collect($achats)->sum('montant') }} DH</h4>
                        <p class="mb-0">Montant Total</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning text-white p-3 border-0">
                        <h4>{{ collect($achats)->sum('points_gagnes') }}</h4>
                        <p class="mb-0">Total Points Gagnés</p>
                    </div>
                </div>
            </div>

            {{-- Table --}}
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Montant</th>
                                <th>Points gagnés</th>
                                <th>Points utilisés</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($achats as $achat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ $achat->prenom }} {{ $achat->nom }}</strong>
                                </td>
                                <td>
                                    <span class="fw-bold text-success">
                                        {{ $achat->montant }} DH
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-success">
                                        +{{ $achat->points_gagnes }} pts
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-danger">
                                        -{{ $achat->points_utilises }} pts
                                    </span>
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($achat->created_at)->format('d/m/Y') }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="bi bi-star fs-2"></i>
                                    <p class="mt-2">Aucun achat trouvé</p>
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