{{-- resources/views/Clients/afficherClients.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Clients</title>
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
        .avatar-circle { width:36px; height:36px; border-radius:50%; background:#cfe2ff; color:#084298; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:bold; flex-shrink:0; }
    </style>
</head>
<body>

<div class="container-fluid p-0">
<div class="row g-0">

    {{-- ✅ Sidebar --}}
    <div class="col-md-2 sidebar">
        <h4>🌿 Andalocy</h4>
        <a href="{{ route('admin.dashboard') }}">
            <i class="bi bi-box-seam"></i> Produits
        </a>
        <a href="{{ route('admin.clients') }}" class="active">
            <i class="bi bi-people"></i> Clients
        </a>
        <a href="{{ route('admin.commandes') }}">
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
                <i class="bi bi-people"></i> Gestion des Clients
            </h5>
            <span>
                Bonjour,
                <strong>{{ Auth::user()->client->prenom ?? Auth::user()->email }}</strong>
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

            {{-- ✅ Stats --}}
            <div class="row mb-4 text-center">
                <div class="col-md-4">
                    <div class="card bg-primary text-white p-3 border-0">
                        <h4>{{ $clients->total() }}</h4>
                        <p class="mb-0">Total Clients</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success text-white p-3 border-0">
                        <h4>{{ $clients->sum('points') }}</h4>
                        <p class="mb-0">Total Points</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning text-white p-3 border-0">
                        <h4>{{ $clients->where('points', '>', 0)->count() }}</h4>
                        <p class="mb-0">Clients avec Points</p>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    {{-- ✅ Header --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0">
                            Liste des Clients
                            <span class="badge bg-secondary ms-2">
                                {{ $clients->total() }}
                            </span>
                        </h5>
                    </div>

                    {{-- ✅ Recherche --}}
                    <div class="mb-3">
                        <input type="text" id="searchInput"
                            class="form-control"
                            placeholder="🔍 Chercher par nom, email...">
                    </div>

                    {{-- ✅ Table --}}
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" id="clientsTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Points</th>
                                    <th>Inscrit le</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($clients as $client)
                                <tr>
                                    <td>{{ $client->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-circle">
                                                {{ strtoupper(substr($client->prenom, 0, 1)) }}{{ strtoupper(substr($client->nom, 0, 1)) }}
                                            </div>
                                            <span class="fw-bold">
                                                {{ $client->prenom }} {{ $client->nom }}
                                            </span>
                                        </div>
                                    </td>
                                    {{-- ✅ Email depuis users via join --}}
                                    <td class="text-muted">{{ $client->email ?? '—' }}</td>
                                    <td>{{ $client->telephone ?? '—' }}</td>
                                    <td>
                                        <span class="badge bg-success">
                                            {{ $client->points ?? 0 }} pts
                                        </span>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($client->created_at)->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">

                                            {{-- ✅ Modifier --}}
                                            <a href="{{ route('admin.clients.edit', $client->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            {{-- ✅ Points --}}
                                            <a href="{{ route('admin.points', $client->id) }}"
                                                class="btn btn-info btn-sm text-white">
                                                <i class="bi bi-star"></i>
                                            </a>

                                            {{-- ✅ Supprimer --}}
                                            <a href="{{ route('admin.clients.destroy', $client->id) }}"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Supprimer ce client ?')">
                                                <i class="bi bi-trash"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        <i class="bi bi-people fs-2"></i>
                                        <p class="mt-2">Aucun client trouvé</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- ✅ Pagination --}}
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="text-muted small">
                            {{ $clients->total() }} client(s) au total
                        </span>
                        {{ $clients->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
</div>

{{-- ✅ Recherche JS --}}
<script>
document.getElementById('searchInput').addEventListener('input', function () {
    const q = this.value.toLowerCase();
    document.querySelectorAll('#clientsTable tbody tr').forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(q) ? '' : 'none';
    });
});
</script>

</body>
</html>