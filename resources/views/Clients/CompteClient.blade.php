<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <title>Document</title>
</head>
<body>
    @include('./Master.menu')
    {{-- resources/views/clients/compte.blade.php --}}
<div class="card shadow-lg p-4 rounded-4">

    <h3 class="text-primary">Compte de {{ $client->prenom }} {{ $client->nom }}</h3>

    {{-- Points --}}
    <div class="alert alert-success mt-3">
        <h4>⭐ Points disponibles: <strong>{{ $client->points }}</strong></h4>
        <p class="mb-0">= <strong>{{ $client->points }} DH</strong> de remise possible</p>
    </div>

    {{-- Form achat --}}
    <form action="/clients/{{ $client->idClient }}/acheter" method="POST" class="mt-4">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-bold">Montant d'achat (DH)</label>
                <input type="number" name="montant" class="form-control" 
                       placeholder="Ex: 150" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold">
                    Points à utiliser (max: {{ $client->points }})
                </label>
                <input type="number" name="utiliser_points" class="form-control"
                       min="0" max="{{ $client->points }}" value="0">
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-3">
            🛒 Enregistrer l'achat
        </button>
    </form>

    {{-- Historique --}}
    <h5 class="mt-5 mb-3">📋 Historique des achats</h5>
    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>Date</th>
                <th>Montant</th>
                <th>Points gagnés</th>
                <th>Points utilisés</th>
            </tr>
        </thead>
        <tbody>
            @forelse($achats as $achat)
            <tr>
                <td>{{ $achat->created_at }}</td>
                <td>{{ $achat->montant }} DH</td>
                <td class="text-success">+{{ $achat->points_gagnes }} pts</td>
                <td class="text-danger">-{{ $achat->points_utilises }} pts</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">
                     Aucun achat pour le moment
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
@include('./Master.footer')
</div>
</body>
</html>