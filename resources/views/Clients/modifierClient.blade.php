<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Client</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="card shadow border-0 rounded-4 p-4">

        <h3 class="text-center text-warning mb-4 fw-bold">Modifier Client</h3>

        <form action="/clients/{{ $client->idClient }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-4">

                <!-- Nom -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nom</label>
                    <input type="text" name="nom" class="form-control form-control-lg"
                           value="{{ $client->nom }}" required>
                </div>

                <!-- Prenom -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Prénom</label>
                    <input type="text" name="prenom" class="form-control form-control-lg"
                           value="{{ $client->prenom }}" required>
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control form-control-lg"
                           value="{{ $client->email }}" required>
                </div>

                <!-- Password -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Nouveau mot de passe 
                        <small class="text-muted">(optionnel)</small>
                    </label>
                    <input type="password" name="password" 
                           class="form-control form-control-lg"
                           placeholder="Laisser vide pour ne pas changer">
                </div>

                <!-- Telephone -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Téléphone</label>
                    <input type="text" name="telephone" 
                           class="form-control form-control-lg"
                           value="{{ $client->telephone }}" required>
                </div>

            </div>

            <!-- Buttons -->
            <div class="mt-4 d-flex justify-content-between">
                <a href="/clients" class="btn btn-outline-secondary px-4 rounded-pill">
                    ⬅ Retour
                </a>

                <button type="submit" class="btn btn-warning px-4 rounded-pill">
                    💾 Modifier
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

/* focus effect */
input:focus{
    border-color: #ffc107;
    box-shadow: 0 0 6px rgba(255,193,7,0.4);
}

/* animation */
.card:hover{
    transform: translateY(-5px);
    transition: 0.3s;
}
</style>

</body>
</html>