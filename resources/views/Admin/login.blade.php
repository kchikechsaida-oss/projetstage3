<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <style>
        body { background: #1a1a2e; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-box { background: white; padding: 40px; border-radius: 15px; width: 400px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); }
        .login-box h2 { text-align: center; color: #2c3e50; margin-bottom: 30px; font-weight: 700; }
        .btn-admin { background: #2c3e50; color: white; width: 100%; padding: 12px; border: none; border-radius: 8px; font-size: 15px; font-weight: 600; }
        .btn-admin:hover { background: #1a252f; color: white; }
    </style>
</head>
<body>
<div class="login-box">
    <h2>🔐 Admin Panel</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="/admin/login">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bold">Email</label>
            <input type="email" name="email" class="form-control" 
                   placeholder="admin@andalocy.com" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Mot de passe</label>
            <input type="password" name="password" class="form-control" 
                   placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn-admin">
            Connexion Admin
        </button>
    </form>
</div>
</body>
</html>