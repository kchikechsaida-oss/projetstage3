{{-- resources/views/Clients/modifierClient.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Client — Andalocy</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { background: linear-gradient(to right, #f8f9fa, #e9ecef); }
        .card { max-width:750px; margin:auto; background:#ffffff; }
        input:focus { border-color:#ffc107; box-shadow:0 0 6px rgba(255,193,7,0.4); }
        .card:hover { transform:translateY(-5px); transition:0.3s; }
    </style>
</head>
<body>

@include('Master.menu')

<div class="container mt-5 mb-5">
    <div class="card shadow border-0 rounded-4 p-4">

        <h3 class="text-center text-warning mb-4 fw-bold">
            <i class="bi bi-person-gear"></i> Modifier Client
        </h3>

        {{-- ✅ Erreurs validation --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ✅ Form corrigé --}}
        <form action="{{ route('admin.clients.update', $client->id) }}"
            method="POST">
            @csrf

            <div class="row g-4">

                {{-- Nom --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nom</label>
                    <input type="text"
                        name="nom"
                        class="form-control form-control-lg @error('nom') is-invalid @enderror"
                        value="{{ old('nom', $client->nom) }}"
                        required>
                    @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Prénom --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Prénom</label>
                    <input type="text"
                        name="prenom"
                        class="form-control form-control-lg @error('prenom') is-invalid @enderror"
                        value="{{ old('prenom', $client->prenom) }}"
                        required>
                    @error('prenom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email (readonly — géré par users) --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Email
                        <small class="text-muted">(non modifiable)</small>
                    </label>
                    <input type="email"
                        class="form-control form-control-lg bg-light"
                        value="{{ $client->email }}"
                        readonly>
                </div>

                {{-- Téléphone --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Téléphone</label>
                    <input type="text"
                        name="telephone"
                        class="form-control form-control-lg @error('telephone') is-invalid @enderror"
                        value="{{ old('telephone', $client->telephone ?? '') }}">
                    @error('telephone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Adresse --}}
                <div class="col-md-12">
                    <label class="form-label fw-semibold">Adresse</label>
                    <input type="text"
                        name="adresse"
                        class="form-control form-control-lg @error('adresse') is-invalid @enderror"
                        value="{{ old('adresse', $client->adresse ?? '') }}"
                        placeholder="Adresse du client">
                    @error('adresse')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            {{-- ✅ Boutons --}}
            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('admin.clients') }}"
                    class="btn btn-outline-secondary px-4 rounded-pill">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
                <button type="submit"
                    class="btn btn-warning px-4 rounded-pill fw-bold">
                    <i class="bi bi-floppy"></i> Enregistrer
                </button>
            </div>

        </form>
    </div>
</div>

@include('Master.footer')

</body>
</html>