 <!-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Promotions</title>
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

    Sidebar
    <div class="col-md-2 sidebar">
        <h4> Andalocy</h4>
        <a href="/admin/gstionP">📦 Produits</a>
        <a href="/admin/clients">👥 Clients</a>
        <a href="/admin/commandes">🛒 Commandes</a>
        <a href="/admin/promotions" class="active">🏷️ Promotions</a>
        <a href="/admin/logout">🚪 Déconnexion</a>
    </div>

    Main
    <div class="col-md-10">
        <div class="topbar">
            <h5 class="mb-0">Gestion des Promotions</h5>
            <span>Bonjour, <strong>{{ session('admin')->nom }}</strong></span>
        </div>

        <div class="p-4">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Formulaire ajouter --}}
            <div class="card shadow-sm mb-4 p-4">
                <h5 class="mb-3">➕ Ajouter une promotion</h5>
                <form method="POST" action="/admin/promotions/ajouter">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Produit</label>
                            <select name="idProduit" class="form-select" required>
                                <option value="">-- Choisir un produit --</option>
                                @foreach($produits as $produit)
                                <option value="{{ $produit->idProduit }}">
                                    {{ $produit->nomP }} — {{ $produit->prix }} DH
                                </option>
                                @endforeach
                            </select>

                            <div class="col-md-2">
    <label class="form-label fw-bold">Image  </label>
    <input type="file" name="image" class="form-control" accept="image/*">
</div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-bold">Prix promo (DH)</label>
                            <input type="number" name="prix_promo" class="form-control" 
                                   placeholder="Ex: 45" required>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-bold">Date début</label>
                            <input type="date" name="date_debut" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-bold">Date fin</label>
                            <input type="date" name="date_fin" class="form-control" required>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-success w-100">
                                ✔ Ajouter
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Liste promotions --}}
            <table class="table table-hover bg-white rounded shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>Image</th>
                        <th>Produit</th>
                        <th>Prix ancien</th>
                        <th>Prix promo</th>
                        <th>Réduction</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($promotions as $promo)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/'.$promo->image) }}" 
                                 width="50" height="50" style="object-fit:contain;">
                        </td>
                        <td>{{ $promo->nomP }}</td>
                        <td><s class="text-muted">{{ $promo->prix_ancien }} DH</s></td>
                        <td><strong class="text-success">{{ $promo->prix_promo }} DH</strong></td>
                        <td>
                            <span class="badge bg-danger">
                                -{{ round((($promo->prix_ancien - $promo->prix_promo) / $promo->prix_ancien) * 100) }}%
                            </span>
                        </td>
                        <td>{{ $promo->date_debut }}</td>
                        <td>{{ $promo->date_fin }}</td>
                        <td>
                            <a href="/admin/promotions/supprimer/{{ $promo->id }}" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Supprimer cette promotion?')">
                                🗑️ Supprimer
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">
                            Aucune promotion
                        </td>
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

 -->






 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <a href="/admin/gstionP">📦 Produits</a>
        <a href="/admin/clients">👥 Clients</a>
        <a href="/admin/commandes">🛒 Commandes</a>
        <a href="/admin/promotions" class="active">🏷️ Promotions</a>
        <a href="/admin/logout">🚪 Déconnexion</a>
    </div>

    <!-- Main -->
    <div class="col-md-10">
        <div class="topbar">
            <h5 class="mb-0">Gestion des Promotions</h5>
            <span>Bonjour, <strong>{{ session('admin')->nom }}</strong></span>
        </div>

        <div class="p-4">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

    {{-- Formulaire ajouter --}}
<div class="card shadow-sm mb-4 p-4">
    <h5 class="mb-3">➕ Ajouter une promotion</h5>
    <form method="POST" action="/admin/promotions/ajouter" enctype="multipart/form-data">
        @csrf
        <div class="row g-3 align-items-end">
           <select name="idProduit" class="form-select" required>
    <option value="">-- Choisir produit --</option>
    @foreach($produits as $p)
        <option value="{{ $p->idProduit }}">
            {{ $p->nomP }} — {{ $p->prix }} DH
        </option>
    @endforeach
</select>
            <div class="col-md-2">
                <label class="form-label fw-bold">Prix promo (DH)</label>
                <input type="number" name="prix_promo" class="form-control" 
                       placeholder="Ex: 45" required>
            </div>

            <div class="col-md-2">
                <label class="form-label fw-bold">Date début</label>
                <input type="date" name="date_debut" class="form-control" required>
            </div>

            <div class="col-md-2">
                <label class="form-label fw-bold">Date fin</label>
                <input type="date" name="date_fin" class="form-control" required>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-bold">Image </label>
                <input type="file" name="image" class="form-control" >
            </div>

            <div class="col-md-2 d-flex align-items-end">
    <button class="btn btn-success w-100">Ajouter</button>
</div>
            </div>

        </div>
    </form>
</div>
 {{-- Liste promotions --}}
            <table class="table table-hover bg-white rounded shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>Image</th>
                        <th>Produit</th>
                        <th>Prix ancien</th>
                        <th>Prix promo</th>
                        <th>Réduction</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($promotions as $promo)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/'.$promo->image) }}" 
                                 width="50" height="50" style="object-fit:contain;">
                        </td>
                        <td>{{ $promo->nomP }}</td>
                        <td><s class="text-muted">{{ $promo->prix_ancien }} DH</s></td>
                        <td><strong class="text-success">{{ $promo->prix_promo }} DH</strong></td>
                        <td>
                            <span class="badge bg-danger">
                                -{{ round((($promo->prix_ancien - $promo->prix_promo) / $promo->prix_ancien) * 100) }}%
                            </span>
                        </td>
                        <td>{{ $promo->date_debut }}</td>
                        <td>{{ $promo->date_fin }}</td>
                        <td>
                            <a href="/admin/promotions/supprimer/{{ $promo->id }}" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Supprimer cette promotion?')">
                                🗑️ Supprimer
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">
                            Aucune promotion
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div></div>
</body>
</html> 