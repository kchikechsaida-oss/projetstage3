<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
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

    <!-- Sidebar -->
    <div class="col-md-2 sidebar">
        <h4> Andalocy</h4>
        <a href="/admin/dashboard" class="active">📦 Produits</a>
        <a href="/admin/clients">👥 Clients</a>
        <a href="/admin/commandes">🛒 Commandes</a>
        <a href="/admin/promotions"  >🏷️ Promotions</a>
        <a href="/admin/logout">🚪 Déconnexion</a>
    </div>

    <!-- Main -->
    <div class="col-md-10">
        <div class="topbar">
            <h5 class="mb-0">Gestion des Produits</h5>
            <span>Bonjour, <strong>{{ session('admin')->nom }}</strong></span>
        </div>

        <div class="p-4">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="d-flex justify-content-between mb-3">
                <h5>Liste des produits</h5>
                <a href="/ajouter" class="btn btn-success">+ Ajouter produit</a>
            </div>

            <table class="table table-hover bg-white rounded shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produits as $produit)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/'.$produit->image) }}" 
                                 width="50" height="50" style="object-fit:contain;">
                        </td>
                        <td>{{ $produit->nomP }}</td>
                        <td>{{ $produit->prix }} DH</td>
                        <td>{{ $produit->categorie }}</td>
                        <td>
                            <a href="/modifier/{{ $produit->idProduit }}" 
                               class="btn btn-sm btn-warning"> Modifier</a>
                            <a href="/supprimer/{{ $produit->idProduit }}" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Supprimer ce produit?')">🗑️ Supprimer</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>
</div>
</body>
</html>