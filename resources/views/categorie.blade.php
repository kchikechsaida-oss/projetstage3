{{-- resources/views/categorie.blade.php --}}
@php use Illuminate\Support\Facades\Auth; @endphp
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Catalogue — Andalocy</title>

<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<style>

.filter-btn{
    border:1px solid #dee2e6;
    background:#f8f9fa;
    color:#333;
    padding:8px 20px;
    margin:5px;
    border-radius:25px;
    text-decoration:none;
    transition:.3s;
}

.filter-btn:hover{
    background:#e9ecef;
}

.filter-btn.active{
    background:#6c757d;
    color:white;
}

.card{
    border-radius:15px;
    transition:.3s;
}

.card:hover{
    transform:translateY(-5px);
}

</style>

</head>
<body>

@include('Master.menu')

{{-- Message succès --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show m-3">

{{ session('success') }}

<button class="btn-close"
data-bs-dismiss="alert">
</button>

</div>
@endif


<div class="container mt-4 text-center">

<h2 class="fw-bold">
Notre Catalogue
</h2>

<p class="text-muted">
{{ count($produits) }} produit(s) trouvé(s)
</p>

<hr class="w-25 mx-auto">

</div>


{{-- FILTRES CATEGORIE --}}

<div class="text-center mb-5">

<a href="/categorie"
class="filter-btn {{ !request('categorie') ? 'active' : '' }}">
Tous
</a>

@foreach([
'Soins du visage',
'Soins cheveux',
'Soins du corps',
'Soins mains',
'Maquillage lèvres',
'Ambiance maison'
] as $cat)

<a href="/categorie?categorie={{ urlencode($cat) }}"
class="filter-btn {{ request('categorie')==$cat ? 'active' : '' }}">

{{ $cat }}

</a>

@endforeach

</div>


{{-- PRODUITS --}}

<div class="container">

<div class="row">

@forelse($produits as $produit)

<div class="col-12 mb-4">

<div class="card shadow-sm p-3 border-0">

<div class="row align-items-center">


{{-- IMAGE --}}

<div class="col-md-3 text-center">

<a href="{{ route('produit.show',$produit->idProduit) }}">

<img
src="{{ asset('storage/'.$produit->image) }}"
class="img-fluid"
style="height:200px;object-fit:contain;">

</a>

</div>


{{-- DETAILS --}}

<div class="col-md-9">

<div class="d-flex align-items-center gap-2 mb-2">

<h4 class="fw-bold mb-0">
{{ $produit->nomP }}
</h4>

<span class="badge bg-secondary">

{{ $produit->categorie }}

</span>

</div>


<div class="text-warning mb-2">

⭐⭐⭐⭐☆

</div>


<p class="text-success fw-bold fs-4">

{{ $produit->prix }} DH

</p>


<p class="text-muted">

{{ Str::limit($produit->description,120) }}

</p>


<div class="d-flex gap-2">

@if(session('client_id'))

<a href="{{ route('panier.ajouter',$produit->idProduit) }}"
class="btn btn-primary">

<i class="bi bi-cart-plus"></i>
Ajouter au panier

</a>

@else

<a href="{{ route('login') }}"
class="btn btn-outline-dark">

<i class="bi bi-person"></i>
Connectez-vous

</a>

@endif


<a href="{{ route('produit.show',$produit->idProduit) }}"
class="btn btn-outline-dark">

<i class="bi bi-eye"></i>
Voir

</a>

</div>


 

</div>

</div>

</div>

</div>

@empty

<div class="text-center py-5">

<i class="bi bi-search fs-1"></i>

<h5 class="mt-3">

Aucun produit trouvé

</h5>

<a href="/categorie"
class="btn btn-dark mt-3">

Voir tous les produits

</a>

</div>

@endforelse

</div>

</div>

@include('Master.footer')

</body>
</html>