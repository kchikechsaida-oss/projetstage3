<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Points & Achats — Admin</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body { background: #f5f5f5; }
        .sidebar { background: #2c3e50; min-height: 100vh; padding: 20px 0; }
        .sidebar a { color: #bdc3c7; display: block; padding: 12px 20px; text-decoration: none; }
        .sidebar a:hover, .sidebar a.active { background: #34495e; color: white; }
        .sidebar .brand { color: white; font-size: 18px; font-weight: bold; padding: 15px 20px 30px; }
        .topbar { background: white; padding: 15px 25px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center; }
    </style>
</head>
<body>
<div class="container-fluid">
<div class="row">

    {{-- SIDEBAR --}}
    <div class="col-md-2 sidebar">
        <div class="brand"> Andalocy Admin</div>
        <a href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a href="{{ route('admin.clients') }}"><i class="bi bi-people"></i> Clients</a>
        <a href="{{ route('admin.commandes') }}"><i class="bi bi-bag"></i> Commandes</a>
        <a href="{{ route('admin.promotions') }}"><i class="bi bi-tag"></i> Promotions</a>
        <a href="{{ route('admin.achats') }}" class="active"><i class="bi bi-star"></i> Points & Achats</a>
        <a href="/admin/logout" style="color:#e74c3c; margin-top: 20px;"><i class="bi bi-box-arrow-right"></i> Déconnexion</a>
    </div>

    {{-- MAIN --}}
    <div class="col-md-10 p-0">

        <div class="topbar">
            <h5 class="mb-0"><i class="bi bi-star"></i> Points & Achats</h5>
            <span>Bonjour, <strong>{{ session('admin_nom') }}</strong>
                <span class="badge bg-danger ms-2">Admin</span>
            </span>
        </div>

        <div class="p-4">

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <div class="bg-white rounded shadow-sm p-4">
                <h5 class="fw-bold mb-3">Historique des achats</h5>
                <table class="table table-hover">
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
                            <td>{{ $achat->id }}</td>
                            <td>{{ $achat->prenom }} {{ $achat->nom }}</td>
                            <td>{{ $achat->montant }} DH</td>
                            <td><span class="badge bg-success">+{{ $achat->points_gagnes }}</span></td>
                            <td><span class="badge bg-warning text-dark">-{{ $achat->points_utilises }}</span></td>
                            <td>{{ date('d/m/Y', strtotime($achat->created_at)) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Aucun achat trouvé</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>