{{-- resources/views/Produits/ajouterProduit.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Produit — Andalocy</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { background: linear-gradient(to right, #e3f2fd, #ffffff); }
        .form-box { max-width:600px; margin:60px auto; padding:40px; border-radius:15px; background:white; box-shadow:0 10px 25px rgba(0,0,0,0.1); }
        h2 { text-align:center; margin-bottom:25px; color:#0d6efd; }
    </style>
</head>
<body>

@include('Master.menu')

<div class="container">
    <div class="form-box">

        <h2>
            <i class="bi bi-plus-circle"></i> Ajouter Produit
        </h2>

        {{-- ✅ Messages flash --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

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
        <form method="POST"
            action="{{ route('produit.store') }}"
            enctype="multipart/form-data">
            @csrf

            {{-- Nom --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Nom du produit</label>
                <input type="text"
                    name="nomP"
                    class="form-control @error('nomP') is-invalid @enderror"
                    placeholder="Nom du produit"
                    value="{{ old('nomP') }}"
                    required>
                @error('nomP')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Prix --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Prix (DH)</label>
                <input type="number"
                    name="prix"
                    class="form-control @error('prix') is-invalid @enderror"
                    placeholder="Prix en DH"
                    value="{{ old('prix') }}"
                    min="0"
                    step="0.01"
                    required>
                @error('prix')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Catégorie --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Catégorie</label>
                <select name="categorie"
                    class="form-select @error('categorie') is-invalid @enderror"
                    required>
                    <option value="">-- Choisir une catégorie --</option>
                    @foreach([
                        'Soins du visage',
                        'Soins cheveux',
                        'Soins du corps',
                        'Soins mains',
                        'Maquillage lèvres',
                        'Ambiance maison'
                    ] as $cat)
                        <option value="{{ $cat }}"
                            {{ old('categorie') == $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
                @error('categorie')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea
                    name="description"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="Description du produit"
                    rows="4"
                    required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Image --}}
            <div class="mb-4">
                <label class="form-label fw-bold">Image du produit</label>
                <input type="file"
                    name="image"
                    class="form-control @error('image') is-invalid @enderror"
                    accept="image/*"
                    required>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                {{-- ✅ Prévisualisation image --}}
                <div class="text-center mt-3">
                    <img id="preview"
                        src="#"
                        class="img-fluid rounded shadow"
                        style="max-width:150px; display:none;">
                </div>
            </div>

            {{-- ✅ Boutons --}}
            <div class="d-flex gap-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="btn btn-outline-secondary w-50">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
                <button type="submit" class="btn btn-primary w-50">
                    <i class="bi bi-check-circle"></i> Ajouter
                </button>
            </div>

        </form>
    </div>
</div>

{{-- ✅ Prévisualisation image JS --}}
<script>
    document.querySelector('input[name="image"]')
        .addEventListener('change', function(e) {
            const preview = document.getElementById('preview');
            const file = e.target.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        });
</script>

@include('Master.footer')

</body>
</html>