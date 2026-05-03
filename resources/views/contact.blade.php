 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login/Register</title>
<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(to right, #e0f2f1, #ffffff);
}

.auth-wrapper {
    min-height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 0;
}

.form-box {
    width: 420px;
    background: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.1);
}

h2 {
    color: #2e3a2f;
    font-weight: 700;
    margin-bottom: 25px;
    text-align: center;
}

.form-control {
    border-radius: 10px;
    padding: 12px 15px;
    border: 1.5px solid #ddd;
    transition: 0.3s;
}

.form-control:focus {
    border-color: #6b8e6b;
    box-shadow: 0 0 0 3px rgba(107,142,107,0.15);
}

.form-control.is-invalid {
    border-color: #dc3545;
}

.btn-main {
    width: 100%;
    padding: 12px;
    border: none;
    background: #6b8e6b;
    color: white;
    border-radius: 20px;
    font-size: 16px;
    font-weight: 600;
    transition: 0.3s;
}

.btn-main:hover {
    background: #5a7d5a;
}

.switch {
    text-align: center;
    margin-top: 15px;
    font-size: 14px;
}

.switch a {
    color: #6b8e6b;
    text-decoration: none;
    font-weight: 600;
}

.error-msg {
    color: #dc3545;
    font-size: 12px;
    margin-top: 4px;
    display: none;
}
</style>
</head>

<body>

@include('./Master.menu')

<div class="auth-wrapper">
<div class="form-box">

    <h2 id="title">Se connecter</h2>

    {{-- alerts --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- LOGIN FORM --}}
    <form id="loginForm" method="POST" action="/login">
        @csrf
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" id="loginEmail">
            <div class="error-msg" id="err-login-email">Email invalide</div>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" id="loginPass">
            <div class="error-msg" id="err-login-pass">Mot de passe requis</div>
        </div>
        <button type="submit" class="btn-main">Connexion</button>
    </form>

    {{-- REGISTER FORM --}}
    <form id="registerForm" method="POST" action="/register" style="display:none">
        @csrf
        <div class="mb-3">
            <input type="text" name="nom" class="form-control" placeholder="Nom" id="regNom">
            <div class="error-msg" id="err-nom">Nom requis</div>
        </div>
        <div class="mb-3">
            <input type="text" name="prenom" class="form-control" placeholder="Prénom" id="regPrenom">
            <div class="error-msg" id="err-prenom">Prénom requis</div>
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" id="regEmail">
            <div class="error-msg" id="err-email">Email invalide</div>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" id="regPass">
            <div class="error-msg" id="err-pass">Min 6 caractères</div>
        </div>
        <div class="mb-3">
            <input type="text" name="telephone" class="form-control" placeholder="Téléphone" id="regTel">
            <div class="error-msg" id="err-tel">Téléphone invalide</div>
        </div>
        <button type="submit" class="btn-main">Inscription</button>
    </form>

    <p class="switch" id="switchText">
        Pas de compte ? <a href="#" onclick="toggleForm()">Créer un compte</a>
    </p>

</div>
</div>

@include('./Master.footer')

<script>
let isLogin = true;

function toggleForm() {
    isLogin = !isLogin;
    document.getElementById('loginForm').style.display    = isLogin ? 'block' : 'none';
    document.getElementById('registerForm').style.display = isLogin ? 'none'  : 'block';
    document.getElementById('title').innerText = isLogin ? 'Se connecter' : 'Créer un compte';
    document.getElementById('switchText').innerHTML = isLogin
        ? 'Pas de compte ? <a href="#" onclick="toggleForm()">Créer un compte</a>'
        : 'Déjà un compte ? <a href="#" onclick="toggleForm()">Se connecter</a>';
}

// Validation login
document.getElementById('loginForm').addEventListener('submit', function(e) {
    let valid = true;
    const email = document.getElementById('loginEmail');
    const pass  = document.getElementById('loginPass');

    if (!email.value.includes('@')) {
        document.getElementById('err-login-email').style.display = 'block';
        email.classList.add('is-invalid');
        valid = false;
    } else {
        document.getElementById('err-login-email').style.display = 'none';
        email.classList.remove('is-invalid');
    }

    if (pass.value.length < 1) {
        document.getElementById('err-login-pass').style.display = 'block';
        pass.classList.add('is-invalid');
        valid = false;
    } else {
        document.getElementById('err-login-pass').style.display = 'none';
        pass.classList.remove('is-invalid');
    }

    if (!valid) e.preventDefault();
});

// Validation register
document.getElementById('registerForm').addEventListener('submit', function(e) {
    let valid = true;

    const fields = [
        { id: 'regNom',    err: 'err-nom',    check: v => v.length > 1 },
        { id: 'regPrenom', err: 'err-prenom', check: v => v.length > 1 },
        { id: 'regEmail',  err: 'err-email',  check: v => v.includes('@') },
        { id: 'regPass',   err: 'err-pass',   check: v => v.length >= 6 },
        { id: 'regTel',    err: 'err-tel',    check: v => /^[0-9]{10}$/.test(v) },
    ];

    fields.forEach(f => {
        const input = document.getElementById(f.id);
        const err   = document.getElementById(f.err);
        if (!f.check(input.value)) {
            err.style.display = 'block';
            input.classList.add('is-invalid');
            valid = false;
        } else {
            err.style.display = 'none';
            input.classList.remove('is-invalid');
        }
    });

    if (!valid) e.preventDefault();
});
</script>

</body>
</html>    

