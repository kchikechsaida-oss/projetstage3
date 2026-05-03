<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow-lg p-4 rounded-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="text-primary mb-0">Liste des Clients</h3>
            <a href="/clients/create" class="btn btn-success">
                ➕ Ajouter Client
            </a>
        </div>

        <!-- Search -->
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Chercher par nom, email...">
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-hover align-middle" id="clientsTable">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Client</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Statut</th>
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
                                <span class="fw-bold">{{ $client->prenom }} {{ $client->nom }}</span>
                            </div>
                        </td>
                        <td class="text-muted">{{ $client->email }}</td>
                        <td>{{ $client->telephone }}</td>
                        <td>
                            @if($client->actif)
                                <span class="badge bg-success">Actif</span>
                            @else
                                <span class="badge bg-secondary">Inactif</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <!-- Modifier -->
                                <a href="/clients/{{ $client->id }}/edit" class="btn btn-warning btn-sm">
                                    ✏️ Modifier
                                </a>

                                <!-- Supprimer -->
                                <form action="/clients/{{ $client->id }}" method="POST"
                                      onsubmit="return confirm('Wach bgha t-supprimi had client?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        🗑️ Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Ma kayn walou — <a href="/clients/create">Zid client</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="text-muted small">
                {{ $clients->total() }} client(s) au total
            </span>
            {{ $clients->links() }}
        </div>

    </div>
</div>

<style>
body {
    background: linear-gradient(to right, #e3f2fd, #ffffff);
}
.card {
    max-width: 1000px;
    margin: auto;
}
.avatar-circle {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #cfe2ff;
    color: #084298;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: bold;
    flex-shrink: 0;
}
</style>

<script>
// Search client-side
document.getElementById('searchInput').addEventListener('input', function () {
    const q = this.value.toLowerCase();
    document.querySelectorAll('#clientsTable tbody tr').forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(q) ? '' : 'none';
    });
});
</script>

</body>
</html>