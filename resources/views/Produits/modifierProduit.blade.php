<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-5">

    <div class="card shadow-lg p-4 rounded-4">
        <h3 class="text-center text-primary mb-4">Modifier Produit</h3>

        <form action="/produits/{{ $produit->idProduit }}" method="POST" 
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">

                <!-- Nom -->
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nom de produit</label>
                    <input type="text" class="form-control form-control-lg" name="nomP" 
                           value="{{ $produit->nomP }}" required>
                </div>

                <!-- Prix -->
                <div class="col-md-6">
                    <label class="form-label fw-bold">Prix</label>
                    <input type="number" class="form-control form-control-lg" name="prix" 
                           value="{{ $produit->prix }}" required>
                </div>

                <!-- Description -->
                <div class="col-12">
                    <label class="form-label fw-bold">Description</label>
                    <textarea class="form-control form-control-lg" name="description" rows="4" required>{{ $produit->description }}</textarea>
                </div>

                <!-- Image -->
                <div class="col-12 text-center">
                    <label class="form-label fw-bold d-block">Image actuelle</label>

                    @if($produit->image)
                        <img src="{{ asset('storage/' . $produit->image) }}" 
                             class="img-fluid rounded shadow mb-3"
                             style="max-width:150px;">
                    @endif

                    <label class="form-label">Changer l'image</label>
                    <input type="file" name="image" class="form-control w-50 mx-auto">
                </div>

            </div>

            <!-- Buttons -->
            <div class="mt-4 d-flex justify-content-between">
                <a href="/catalogue" class="btn btn-outline-secondary px-4">
                    ⬅ Retour
                </a>

                <button type="submit" class="btn btn-success px-4">
                 Enregistrer
                </button>
            </div>

        </form>
    </div>

</div>

<style>
body{
    background: linear-gradient(to right, #e3f2fd, #ffffff);
}

.card{
    max-width: 700px;
    margin: auto;
}
</style>
</body>
</html>