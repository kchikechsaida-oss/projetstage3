 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalogue</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
</head>
<body>

<div class="container mt-5">
    <h2>Liste des Produits</h2>

    <a href="/ajouter" class="btn btn-primary mb-3">Ajouter Produit</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($produits as $p)
            <tr>
                <td>{{ $p->idP }}</td>
                <td>{{ $p->nom }}</td>
                <td>{{ $p->prix }}</td>
                <td>{{ $p->description }}</td>
                <td>
                    <a href="/supprimer/{{ $p->idP }}" class="btn btn-danger btn-sm">Supprimer</a>
                    <a href="/modifier/{{ $p->idP }}" class="btn btn-warning btn-sm">Modifier</a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

</body>
</html>