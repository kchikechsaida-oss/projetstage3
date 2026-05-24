<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription — Andalocy</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { font-family:'Poppins',sans-serif; background:linear-gradient(to right,#e0f2f1,#ffffff); }
        .auth-wrapper { min-height:80vh; display:flex; justify-content:center; align-items:center; padding:40px 0; }
        .form-box { width:480px; background:white; padding:40px; border-radius:20px; box-shadow:0 8px 30px rgba(0,0,0,0.1); }
        h2 { color:#2e3a2f; font-weight:700; margin-bottom:25px; text-align:center; }
        .form-control { border-radius:10px; padding:12px 15px; border:1.5px solid #ddd; transition:0.3s; }
        .form-control:focus { border-color:#6b8e6b; box-shadow:0 0 0 3px rgba(107,142,107,0.15); }
        .btn-main { width:100%; padding:12px; border:none; background:#6b8e6b; color:white; border-radius:20px; font-size:16px; font-weight:600; transition:0.3s; }
        .btn-main:hover { background:#5a7d5a; color:white; }
        .switch { text-align:center; margin-top:15px; font-size:14px; }
        .switch a { color:#6b8e6b; text-decoration:none; font-weight:600; }
    </style>
</head>
<body>

@include('Master.menu')

<div class="auth-wrapper">
<div class="form-box">

    <h2>
        <i class="bi bi-person-plus"></i> Créer un compte
    </h2>

    {{-- ✅ Erreurs Breeze --}}
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    {{-- ✅ Form register Breeze --}}
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Nom + Prénom --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="text" name="nom"
                    class="form-control @error('nom') is-invalid @enderror"
                    placeholder="Nom"
                    value="{{ old('nom') }}"
                    required>
                @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" name="prenom"
                    class="form-control @error('prenom') is-invalid @enderror"
                    placeholder="Prénom"
                    value="{{ old('prenom') }}"
                    required>
                @error('prenom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <input type="email" name="email"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="Adresse email"
                value="{{ old('email') }}"
                required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Téléphone --}}
        <div class="mb-3">
            <input type="text" name="telephone"
                class="form-control @error('phone') is-invalid @enderror"
                placeholder="Téléphone"
                value="{{ old('phone') }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Mot de passe --}}
        <div class="mb-3">
            <input type="password" name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Mot de passe (min 8 caractères)"
                required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Confirmer mot de passe --}}
        <div class="mb-3">
            <input type="password" name="password_confirmation"
                class="form-control"
                placeholder="Confirmer le mot de passe"
                required>
        </div>

        <button type="submit" class="btn-main">
            <i class="bi bi-person-check"></i> S'inscrire
        </button>
    </form>

    <p class="switch">
        Déjà un compte ?
        <a href="{{ route('login') }}">Se connecter</a>
    </p>

</div>
</div>

@include('Master.footer')

</body>
</html>