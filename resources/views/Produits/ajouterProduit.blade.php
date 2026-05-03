 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Produit</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <style>
        body{
            background: linear-gradient(to right, #e3f2fd, #ffffff);
        }

        .form-box{
            max-width: 500px;
            margin: 60px auto;
            padding: 30px;
            border-radius: 15px;
            background: white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        h2{
            text-align: center;
            margin-bottom: 20px;
            color: #0d6efd;
        }

        .btn{
            width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-box">

        <h2>Ajouter Produit</h2>

        <form method="POST" action="/ajouter" enctype="multipart/form-data">
            @csrf

            <input type="text" name="nomP" placeholder="Nom produit" 
                   class="form-control mb-3" required>

            <input type="number" name="prix" placeholder="Prix" 
                   class="form-control mb-3" required>

            <textarea name="description" placeholder="Description" 
                      class="form-control mb-3" rows="3" required></textarea>

            <input type="file" name="image" 
                   class="form-control mb-3" required>
                   <div class="mb-3">
    <label class="form-label">Catégorie</label>
    <select name="categorie" class="form-select" required>
        <option value="">-- Choisir une catégorie --</option>
        <option value="Soins du visage">Soins du visage</option>
        <option value="Soins cheveux">Soins cheveux</option>
        <option value="Soins du corps">Soins du corps</option>
        <option value="Soins mains">Soins mains</option>
        <option value="Maquillage lèvres">Maquillage lèvres</option>
        <option value="Ambiance maison">Ambiance maison</option>
    </select>
</div>

            <button class="btn btn-primary">Ajouter</button>
        </form>

    </div>
</div>

</body>
</html>