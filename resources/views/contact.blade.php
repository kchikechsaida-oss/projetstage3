<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            background: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)),
            url('https://images.unsplash.com/photo-1523293182086-7651a899d37f?q=80&w=1600&auto=format&fit=crop');
            background-size:cover; background-position:center; background-attachment:fixed;
            font-family:'Poppins', sans-serif; min-height:100vh;
        }
        .wrapper { min-height:100vh; display:flex; justify-content:center; align-items:center; padding:40px 20px; }
        .card {
            width:100%; max-width:480px;
            background:rgba(255,255,255,0.92); backdrop-filter:blur(12px);
            border-radius:24px; padding:40px;
            box-shadow:0 20px 50px rgba(0,0,0,0.18);
        }
        .card-header { text-align:center; margin-bottom:30px; }
        .icon-ring {
            width:72px; height:72px; margin:0 auto 16px;
            border-radius:50%; background:linear-gradient(135deg,#c96a8d,#8d2f52);
            display:flex; justify-content:center; align-items:center;
        }
        .icon-ring i { color:#fff; font-size:32px; }
        h2 { font-size:26px; font-weight:600; color:#2f2f2f; margin-bottom:6px; }
        .subtitle { color:#777; font-size:13px; }
        .tabs { display:flex; background:#f4f4f4; border-radius:14px; padding:4px; margin-bottom:28px; }
        .tab {
            flex:1; padding:10px; text-align:center; border-radius:10px;
            font-size:14px; font-weight:500; cursor:pointer; color:#888; border:none; background:none;
            transition:0.2s;
        }
        .tab.active { background:#fff; color:#993556; box-shadow:0 2px 8px rgba(0,0,0,0.08); }
        .form-group { margin-bottom:18px; }
        label { font-size:13px; color:#5a5a5a; font-weight:500; display:block; margin-bottom:7px; }
        label i { color:#993556; margin-right:5px; }
        .form-control {
            width:100%; border:none; background:#f4f4f4;
            border-radius:12px; padding:13px 16px; font-size:14px; transition:0.3s;
        }
        .form-control:focus {
            background:#fff; border:1px solid #c96a8d;
            box-shadow:0 0 0 4px rgba(201,106,141,0.15); outline:none;
        }
        .row-2 { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
        .btn-main {
            width:100%; border:none; padding:14px; border-radius:12px;
            background:linear-gradient(135deg,#b94d73,#7c2445);
            color:#fff; font-size:15px; font-weight:500;
            display:flex; align-items:center; justify-content:center; gap:8px;
            cursor:pointer; transition:0.3s; margin-top:8px;
        }
        .btn-main:hover { transform:translateY(-2px); box-shadow:0 10px 25px rgba(121,32,67,0.3); }
        .panel { display:none; }
        .panel.active { display:block; }
        .alert { border-radius:12px; font-size:13px; margin-bottom:16px; }
        @media(max-width:500px) { .row-2 { grid-template-columns:1fr; } .card { padding:28px 20px; } }
    </style>
</head>
<body>
@include('Master.menu')

<div class="wrapper">
    <div class="card">

        <div class="card-header">
            <div class="icon-ring"><i class="ti ti-user-heart"></i></div>
            <h2>Espace Client</h2>
            <p class="subtitle">Bienvenue chez Andaloucy Parfums</p>
        </div>

        {{-- Tabs --}}
        <div class="tabs">
            <button class="tab active" onclick="showTab('login')">
                <i class="ti ti-login"></i> Se connecter
            </button>
            <button class="tab" onclick="showTab('register')">
                <i class="ti ti-user-plus"></i> S'inscrire
            </button>
        </div>

        {{-- LOGIN --}}
        <div class="panel active" id="panel-login">

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form action="/login" method="POST">
                @csrf
                <div class="form-group">
                    <label><i class="ti ti-at"></i> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="exemple@email.com" required>
                </div>
                <div class="form-group">
                    <label><i class="ti ti-lock"></i> Mot de passe</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn-main">
                    <i class="ti ti-login"></i> Se connecter
                </button>
            </form>
        </div>

        {{-- REGISTER --}}
        <div class="panel" id="panel-register">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="/register" method="POST">
                @csrf
                <div class="row-2">
                    <div class="form-group">
                        <label><i class="ti ti-user"></i> Nom</label>
                        <input type="text" name="nom" class="form-control" placeholder="Votre nom" required>
                    </div>
                    <div class="form-group">
                        <label><i class="ti ti-user"></i> Prénom</label>
                        <input type="text" name="prenom" class="form-control" placeholder="Votre prénom" required>
                    </div>
                </div>
                <div class="form-group">
                    <label><i class="ti ti-at"></i> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="exemple@email.com" required>
                </div>
                <div class="form-group">
                    <label><i class="ti ti-phone"></i> Téléphone</label>
                    <input type="text" name="telephone" class="form-control" placeholder="+212 6XX XXX XXX" required>
                </div>
                <div class="form-group">
                    <label><i class="ti ti-lock"></i> Mot de passe</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
                <div class="form-group">
                    <label><i class="ti ti-lock-check"></i> Confirmer mot de passe</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn-main">
                    <i class="ti ti-user-plus"></i> Créer mon compte
                </button>
            </form>
        </div>

    </div>
</div>

<script>
function showTab(tab) {
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.panel').forEach(p => p.classList.remove('active'));
    document.getElementById('panel-' + tab).classList.add('active');
    event.target.closest('.tab').classList.add('active');
}
</script>

@include('Master.footer')
</body>
</html>