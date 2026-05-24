{{-- resources/views/Produits/modifierProduit.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit — Andalocy</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { background: linear-gradient(to right, #e3f2fd, #ffffff); }
        .card { max-width: 700px; margin: auto; }
    </style>
</head>
<body>

@include('Master.menu')

<div class="container mt-5 mb-5">
    <div class="card shadow-lg p-4 rounded-4">

        <h3 class="text-center text-primary mb-4">
            <i class="bi bi-pencil-square"></i> Modifier Produit
        </h3>

        {{-- ✅ Erreurs validation --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ✅ Form corrigé --}}
        <form action="{{ route('produit.update', $produit->idProduit) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="row g-4">

                {{-- Nom --}}
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nom du produit</label>
                    <input type="text"
                        class="form-control form-control-lg @error('nomP') is-invalid @enderror"
                        name="nomP"
                        value="{{ old('nomP', $produit->nomP) }}"
                        required>
                    @error('nomP')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Prix --}}
                <div class="col-md-6">
                    <label class="form-label fw-bold">Prix (DH)</label>
                    <input type="number"
                        class="form-control form-control-lg @error('prix') is-invalid @enderror"
                        name="prix"
                        value="{{ old('prix', $produit->prix) }}"
                        min="0"
                        step="0.01"
                        required>
                    @error('prix')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Catégorie --}}
                <div class="col-md-6">
                    <label class="form-label fw-bold">Catégorie</label>
                    <select class="form-control form-control-lg @error('categorie') is-invalid @enderror"
                        name="categorie" required>
                        @foreach([
                            'Soins du visage',
                            'Soins cheveux',
                            'Soins du corps',
                            'Soins mains',
                            'Maquillage lèvres',
                            'Ambiance maison'
                        ] as $cat)
                            <option value="{{ $cat }}"
                                {{ old('categorie', $produit->categorie) == $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>
                    @error('categorie')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="col-12">
                    <label class="form-label fw-bold">Description</label>
                    <textarea
                        class="form-control form-control-lg @error('description') is-invalid @enderror"
                        name="description"
                        rows="4"
                        required>{{ old('description', $produit->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Image --}}
                <div class="col-12 text-center">
                    <label class="form-label fw-bold d-block">Image actuelle</label>
                    @if($produit->image)
                        <img src="{{ asset('storage/' . $produit->image) }}"
                            class="img-fluid rounded shadow mb-3"
                            style="max-width:150px; height:150px; object-fit:contain;">
                    @endif
                    <label class="form-label d-block">
                        Changer l'image
                        <small class="text-muted">(optionnel)</small>
                    </label>
                    <input type="file"
                        name="image"
                        class="form-control w-50 mx-auto @error('image') is-invalid @enderror"
                        accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            {{-- ✅ Boutons --}}
            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('admin.dashboard') }}"
                    class="btn btn-outline-secondary px-4">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
                <button type="submit" class="btn btn-success px-4">
                    <i class="bi bi-check-circle"></i> Enregistrer
                </button>
            </div>

        </form>
    </div>
</div>

@include('Master.footer')

</body>
</html>