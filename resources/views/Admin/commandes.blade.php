<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Commandes</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <style>
        body { background: #f8f9fa; }
        .sidebar { background: #2c3e50; min-height: 100vh; padding: 20px; }
        .sidebar h4 { color: white; font-weight: 700; margin-bottom: 30px; }
        .sidebar a { color: #bdc3c7; text-decoration: none; display: block; padding: 10px; border-radius: 8px; margin-bottom: 5px; }
        .sidebar a:hover { background: #34495e; color: white; }
        .sidebar a.active { background: #8B6F47; color: white; }
        .topbar { background: white; padding: 15px 25px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center; }
    </style>
</head>
<body>
<div class="container-fluid p-0">
<div class="row g-0">
    <div class="col-md-2 sidebar">
        <h4> Andalocy</h4>
        <a href="/admin/gstionP">📦 Produits</a>
        <a href="/admin/clients">👥 Clients</a>
        <a href="/admin/commandes" class="active">🛒 Commandes</a>
        <a href="/admin/promotions"  >🏷️ Promotions</a>
        <a href="/admin/logout">🚪 Déconnexion</a>
    </div>
    <div class="col-md-10">
        <div class="topbar">
            <h5 class="mb-0">Gestion des Commandes</h5>
            <span>Bonjour, <strong>{{ session('admin')->nom }}</strong></span>
        </div>
        <div class="p-4">
            <table class="table table-hover bg-white rounded shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Client</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
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
                        <td>{{ $commande->telephone }}</td>
                        <td>{{ $commande->adresse }}</td>
                        <td><strong>{{ $commande->total }} DH</strong></td>
                        <td><span class="badge bg-warning text-dark">{{ $commande->statut }}</span></td>
                        <td>{{ $commande->created_at }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Aucune commande</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</body>
</html>