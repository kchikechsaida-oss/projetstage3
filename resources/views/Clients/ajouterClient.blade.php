{{-- resources/views/Clients/ajouterClient.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Client — Andalocy</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { background: linear-gradient(to right, #f8f9fa, #e9ecef); }
        .card { max-width:750px; margin:auto; background:#ffffff; }
        input:focus { border-color:#0d6efd; box-shadow:0 0 5px rgba(13,110,253,0.3); }
        button { border-radius:10px; }
    </style>
</head>
<body>

@include('Master.menu')

<div class="container mt-5 mb-5">
    <div class="card shadow-lg border-0 rounded-4 p-4">

        <h3 class="text-center text-primary mb-4">
            <i class="bi bi-person-plus"></i> Ajouter Client
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

        {{-- ✅ Form corrigé — utilise route register Breeze --}}
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="row g-4">

                {{-- Nom --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nom</label>
                    <input type="text"
                        name="nom"
                        class="form-control form-control-lg @error('nom') is-invalid @enderror"
                        placeholder="Nom du client"
                        value="{{ old('nom') }}"
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
                        placeholder="Prénom du client"
                        value="{{ old('prenom') }}"
                        required>
                    @error('prenom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email"
                        name="email"
                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                        placeholder="Email"
                        value="{{ old('email') }}"
                        required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Téléphone --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Téléphone</label>
                    <input type="tel"
                        name="phone"
                        class="form-control form-control-lg @error('phone') is-invalid @enderror"
                        placeholder="Téléphone"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Mot de passe --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Mot de passe</label>
                    <input type="password"
                        name="password"
                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                        placeholder="Min 8 caractères"
                        required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Confirmer mot de passe --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Confirmer mot de passe</label>
                    <input type="password"
                        name="password_confirmation"
                        class="form-control form-control-lg"
                        placeholder="Confirmer le mot de passe"
                        required>
                </div>

            </div>

            {{-- ✅ Boutons --}}
            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('admin.clients') }}"
                    class="btn btn-outline-secondary px-4">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
                <button type="submit" class="btn btn-success px-4">
                    <i class="bi bi-person-check"></i> Ajouter
                </button>
            </div>

        </form>
    </div>
</div>

@include('Master.footer')

</body>
</html>