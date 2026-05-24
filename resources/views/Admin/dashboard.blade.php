<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin — Andalocy</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body { background: #f5f5f5; }
        .sidebar { background: #2c3e50; min-height: 100vh; padding: 20px 0; }
        .sidebar a { color: #bdc3c7; display: block; padding: 12px 20px; text-decoration: none; }
        .sidebar a:hover { background: #34495e; color: white; }
        .sidebar .brand { color: white; font-size: 18px; font-weight: bold; padding: 15px 20px 30px; }
        .stat-card { background: white; border-radius: 12px; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
    </style>
</head>
<body>
<div class="container-fluid">
<div class="row">

    {{-- SIDEBAR --}}
    <div class="col-md-2 sidebar">
        <div class="brand">Andalocy Admin</div>
        <a href="/dashboard"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a href="/admin/clients"><i class="bi bi-people"></i> Clients</a>
        <a href="/admin/commandes"><i class="bi bi-bag"></i> Commandes</a>
        <a href="/catalogue"><i class="bi bi-box"></i> Produits</a>
        <a href="/admin/promotions"><i class="bi bi-tag"></i> Promotions</a>
        <a href="/admin/logout" class="text-danger mt-5"><i class="bi bi-box-arrow-right"></i> Déconnexion</a>
    </div>

    {{-- MAIN --}}
    <div class="col-md-10 p-4">

        <h3 class="fw-bold mb-4">Bonjour, {{ session('admin_nom') }} 👋</h3>

        {{-- STATS --}}
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="text-muted">Clients</div>
                    <h2 class="fw-bold text-primary">{{ $totalClients }}</h2>
                    <i class="bi bi-people fs-3 text-primary"></i>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="text-muted">Commandes</div>
                    <h2 class="fw-bold text-success">{{ $totalCommandes }}</h2>
                    <i class="bi bi-bag fs-3 text-success"></i>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="text-muted">Produits</div>
                    <h2 class="fw-bold text-warning">{{ $totalProduits }}</h2>
                    <i class="bi bi-box fs-3 text-warning"></i>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <div class="text-muted">Revenu total</div>
                    <h2 class="fw-bold text-danger">{{ $totalRevenu }} DH</h2>
                    <i class="bi bi-cash fs-3 text-danger"></i>
                </div>
            </div>
        </div>

        {{-- DERNIÈRES COMMANDES --}}
        <div class="bg-white rounded p-4 shadow-sm">
            <h5 class="fw-bold mb-3">Dernières commandes</h5>
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Client</th>
                        <th>Total</th>
                        <th>Statut</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($commandes as $commande)
                    <tr>
                        <td>{{ $commande->idCommande }}</td>
                        <td>{{ $commande->prenom }} {{ $commande->nom }}</td>
                        <td>{{ $commande->total }} DH</td>
                        <td>
                            <span class="badge
                                @if($commande->statut == 'en attente') bg-warning text-dark
                                @elseif($commande->statut == 'confirmée') bg-success
                                @elseif($commande->statut == 'livrée') bg-primary
                                @else bg-danger
                                @endif">
                                {{ $commande->statut }}
                            </span>
                        </td>
                        <td>{{ date('d/m/Y', strtotime($commande->created_at)) }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center">Aucune commande</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
</div>
</body>
</html>