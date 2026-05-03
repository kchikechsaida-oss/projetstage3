<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<title>Détail Produit</title>

<style>
body{
    background: linear-gradient(to right, #f8f9fa, #e3f2fd);
}

.card{
    border-radius: 20px;
}

img{
    border-radius: 15px;
}
</style>
</head>

<body>

@include('./Master.menu')

<div class="container mt-5">

    <div class="card shadow p-4">
        <div class="row align-items-center">

            <!-- Image -->
            <div class="col-md-5 text-center">
                <img src="{{ asset('storage/' . $produit->image) }}" 
                     class="img-fluid"
                     style="height:300px; object-fit:cover;">
            </div>

            <!-- Infos -->
            <div class="col-md-7">

                <h2 class="fw-bold">{{ $produit->nomP }}</h2>

                <h4 class="text-success my-3">
                    {{ $produit->prix }} DH
                </h4>

                <p class="text-muted">
                    {{ $produit->description }}
                </p>

                <!-- Buttons -->
                <div class="mt-4 d-flex gap-3">

                    <form action="/panier/ajouter/{{ $produit->idProduit }}" method="POST">
                        @csrf
                        <button class="btn btn-primary">
                            🛒 Ajouter au panier
                        </button>
                    </form>

                    <a href="/produits" class="btn btn-outline-secondary">
                        ⬅ Retour
                    </a>

                </div>

            </div>

        </div>
    </div>

</div>

@include('./Master.footer')

</body>
</html>