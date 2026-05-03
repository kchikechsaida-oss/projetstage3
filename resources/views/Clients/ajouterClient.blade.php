<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Client</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="card shadow-lg border-0 rounded-4 p-4">

        <h3 class="text-center text-primary mb-4">Ajouter Client</h3>

        <form action="/ajouterClient" method="POST">
            @csrf

            <div class="row g-4">

                <!-- Nom -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nom</label>
                    <input type="text" name="nom" class="form-control form-control-lg" placeholder="Nom du client" required>
                </div>

                <!-- Prenom -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Prénom</label>
                    <input type="text" name="prenom" class="form-control form-control-lg" placeholder="Prénom du client" required>
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required>
                </div>

                <!-- Password -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Mot de passe</label>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Mot de passe" required>
                </div>

                <!-- Telephone -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Téléphone</label>
                    <input type="tel" name="telephone" class="form-control form-control-lg" placeholder="Téléphone" required>
                </div>

            </div>

            <!-- Buttons -->
            <div class="mt-4 d-flex justify-content-between">
                <a href="/clients" class="btn btn-outline-secondary px-4">
                    ⬅ Retour
                </a>

                <button type="submit" class="btn btn-success px-4">
                    ➕ Ajouter
                </button>
            </div>

        </form>

    </div>

</div>

<style>
body{
    background: linear-gradient(to right, #f8f9fa, #e9ecef);
}

.card{
    max-width: 750px;
    margin: auto;
    background-color: #ffffff;
}

input:focus{
    border-color: #0d6efd;
    box-shadow: 0 0 5px rgba(13,110,253,0.3);
}

button{
    border-radius: 10px;
}
</style>

</body>
</html>