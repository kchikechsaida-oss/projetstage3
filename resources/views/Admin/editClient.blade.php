<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Client — Admin</title>
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
        <div class="brand">Andalocy Admin</div>
        <a href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a href="{{ route('admin.clients') }}" class="active"><i class="bi bi-people"></i> Clients</a>
        <a href="{{ route('admin.commandes') }}"><i class="bi bi-bag"></i> Commandes</a>
        <a href="{{ route('admin.promotions') }}"><i class="bi bi-tag"></i> Promotions</a>
        <a href="{{ route('admin.achats') }}"><i class="bi bi-star"></i> Points & Achats</a>
        <a href="/admin/logout" style="color:#e74c3c; margin-top: 20px;"><i class="bi bi-box-arrow-right"></i> Déconnexion</a>
    </div>

    {{-- MAIN --}}
    <div class="col-md-10 p-0">

        <div class="topbar">
            <h5 class="mb-0"><i class="bi bi-pencil"></i> Modifier Client</h5>
            <span>Bonjour, <strong>{{ session('admin_nom') }}</strong>
                <span class="badge bg-danger ms-2">Admin</span>
            </span>
        </div>

        <div class="p-4">
            <div class="bg-white rounded shadow-sm p-4" style="max-width: 600px;">

                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('admin.clients.update', $client->idClient) }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Prénom</label>
                        <input type="text" name="prenom" class="form-control"
                               value="{{ $client->prenom }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nom</label>
                        <input type="text" name="nom" class="form-control"
                               value="{{ $client->nom }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ $client->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Téléphone</label>
                        <input type="text" name="telephone" class="form-control"
                               value="{{ $client->telephone }}">
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Enregistrer
                        </button>
                        <a href="{{ route('admin.clients') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Retour
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>