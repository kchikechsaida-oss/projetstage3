 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Catalogue</title>

<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">

<style>
body{
font-family:'Poppins',sans-serif;
background:#f8f9fa;
}

/* carousel text */
.carousel-caption{
background:rgba(0,0,0,0.4);
padding:20px;
border-radius:10px;
}

/* title */
.section-title{
text-align:center;
margin:50px 0 10px;
font-weight:600;
color:#2e3a2f;
}

/* cards */
.card{
border:none;
border-radius:15px;
overflow:hidden;
transition:0.3s;
}

.card:hover{
transform:translateY(-5px);
}

.card img{
height:250px;
object-fit:cover;
}

/* buttons */
.btn-primary{
background:#6b8e6b;
border:none;
border-radius:25px;
padding:8px 20px;
}

.btn-primary:hover{
background:#5a7d5a;
}
</style>

</head>

<body>

@include('./Master.menu')

<div class="container mt-4">

<!-- CAROUSEL -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">

<div class="carousel-inner">

<div class="carousel-item active">
<img src="{{ asset('pexels-luisdelrio-15286.jpg') }}" class="d-block w-100" style="height:420px; object-fit:cover;">
<div class="carousel-caption">
<h2 class="fw-bold">Parfums Élégants</h2>
<p>Découvrez notre collection luxueuse.</p>
<a href="#" class="btn btn-light">Découvrir</a>
</div>
</div>

<div class="carousel-item">
<img src="{{ asset('pexels-luisdelrio-15286.jpg') }}" class="d-block w-100" style="height:420px; object-fit:cover;">
</div>

</div>

<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
<span class="carousel-control-prev-icon"></span>
</button>

<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
<span class="carousel-control-next-icon"></span>
</button>

</div>

<!-- TITLE -->
<h3 class="section-title">Soins et Beauté des Lèvres</h3>
<p class="text-center text-muted mb-4">
Prenez soin de vos lèvres avec nos produits hydratants et naturels
</p>

<!-- PRODUITS -->
<div class="row g-4">

<!-- Produit 1 -->
<div class="col-md-4">
<div class="card shadow">
<img src="{{ asset('pexels-luisdelrio-15286.jpg') }}">
<div class="card-body text-center">
<h5>Produit Rose</h5>
<p>Produit cosmétique doux pour la peau.</p>
<h6 style="color:#b76e79;">150 DH</h6>
<button class="btn btn-primary">Acheter</button>
</div>
</div>
</div>

<!-- Produit 2 -->
<div class="col-md-4">
<div class="card shadow">
<img src="{{ asset('pexels-luisdelrio-15286.jpg') }}">
<div class="card-body text-center">
<h5>Produit Gold</h5>
<p>Produit cosmétique luxueux.</p>
<h6 style="color:#b76e79;">200 DH</h6>
<button class="btn btn-primary">Acheter</button>
</div>
</div>
</div>

<!-- Produit 3 -->
<div class="col-md-4">
<div class="card shadow">
<img src="{{ asset('pexels-luisdelrio-15286.jpg') }}">
<div class="card-body text-center">
<h5>Produit Night</h5>
<p>Produit cosmétique idéal pour le soin.</p>
<h6 style="color:#b76e79;">180 DH</h6>
<button class="btn btn-primary">Acheter</button>
</div>
</div>
</div>

</div>

</div>

@include('./Master.footer')

<script src="{{ asset('bootstrap.bundle.min.js') }}"></script>

</body>
</html>

resources/views/categorie/cheveux.blade.php