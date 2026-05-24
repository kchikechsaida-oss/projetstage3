<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion — Andalocy</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { font-family:'Poppins',sans-serif; background:linear-gradient(to right,#e0f2f1,#ffffff); }
        .auth-wrapper { min-height:80vh; display:flex; justify-content:center; align-items:center; padding:40px 0; }
        .form-box { width:420px; background:white; padding:40px; border-radius:20px; box-shadow:0 8px 30px rgba(0,0,0,0.1); }
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
        <i class="bi bi-person-circle"></i> Se connecter
    </h2>

    {{-- ✅ Messages --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- ✅ Erreurs Breeze --}}
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    {{-- ✅ Form login Breeze --}}
    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div class="mb-3">
            <input type="email" name="email"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="Adresse email"
                value="{{ old('email') }}"
                required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Mot de passe --}}
        <div class="mb-3">
            <input type="password" name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Mot de passe"
                required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Se souvenir --}}
        <div class="mb-3 form-check">
            <input type="checkbox" name="remember"
                class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">
                Se souvenir de moi
            </label>
        </div>

        <button type="submit" class="btn-main">
            <i class="bi bi-box-arrow-in-right"></i> Connexion
        </button>

        {{-- Mot de passe oublié --}}
        @if(Route::has('password.request'))
            <div class="text-center mt-3">
                <a href="{{ route('password.request') }}"
                    style="color:#6b8e6b; font-size:13px;">
                    Mot de passe oublié ?
                </a>
            </div>
        @endif
    </form>

    <p class="switch">
        Pas de compte ?
        <a href="{{ route('register') }}">Créer un compte</a>
    </p>

</div>
</div>

@include('Master.footer')

</body>
</html>