<!-- <!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Catalogue Produits</title>

<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<script>
</script>
<body>
     @include('./Master.menu') 
      

<div class="container mt-5 mb-5">
     
<div id="carouselExample" class="carousel slide">

<div class="carousel-inner">

<div class="carousel-item active">

<img src="{{ asset('pexels-luisdelrio-15286.jpg') }}" 
class="img-fluid w-100"
style="height:400px; object-fit:cover;">

<div class="carousel-caption d-none d-md-block">

<h2 class="fw-bold">Parfums Élégants</h2>

<p>Découvrez notre collection luxueuse.</p>

<a href="#" class="btn btn-dark">Découvrir</a>

</div>

</div>


<div class="carousel-item">

<img src="{{ asset('pexels-pixabay-247600.jpg') }}" 
class="img-fluid w-100"
style="height:400px; object-fit:cover;">

<div class="carousel-caption d-none d-md-block">

<h2 class="fw-bold">Beauté & Cosmétique</h2>

<p>Des produits naturels pour votre peau.</p>

<a href="#" class="btn btn-danger">Voir Produits</a>

</div>

</div>

</div>


<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
<span class="carousel-control-prev-icon"></span>
</button>

<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
<span class="carousel-control-next-icon"></span>
</button>

</div>
<div class="row text-center mt-5">

<div class="col-md-4">
<div class="card shadow border-0">
<div class="card-body">
<i class="bi bi-truck fs-1 text-primary"></i>
<h5 class="mt-3">Livraison Rapide</h5>
<p class="text-muted">
Nous livrons vos produits rapidement partout au Maroc.
</p>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card shadow border-0">
<div class="card-body">
<i class="bi bi-shield-check fs-1 text-success"></i>
<h5 class="mt-3">Paiement Sécurisé</h5>
<p class="text-muted">
Paiement sécurisé pour toutes vos commandes.
</p>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card shadow border-0">
<div class="card-body">
<i class="bi bi-bag-heart fs-1 text-danger"></i>
<h5 class="mt-3">Produits Cosmétiques</h5>
<p class="text-muted">
Découvrez notre large gamme de produits cosmétiques.
</p>
</div>
</div>
</div>

</div>

<div class="col-md-8 text-center"> 
     <div class="text-center mb-4">
        <h3 class="fw-bold">Notre Collection de Parfums</h3>
        <p class="text-muted">Découvrez nos parfums élégants et luxueux</p>
        <hr class="w-25 mx-auto border-2 border-dark">
    </div> 
</div>
</div>
<div class="container " > 
<div class="row g-4 mb-6">

<div class="col-md-4">
<div class="card h-100 shadow">

<img src="{{ asset('images/parfum1.jpg') }}" class="card-img-top">

<div class="card-body text-center">
<h5 class="card-title">Produit Rose</h5>

<p class="card-text">
Produit cosmétique doux pour la peau.
</p>

<h6 class="text-success">150 DH</h6>

<a href="#" class="btn btn-primary">Acheter</a>

</div>

</div>
</div>

<div class="col-md-4">
<div class="card h-100 shadow">

<img src="{{ asset('images/parfum2.jpg') }}" class="card-img-top">

<div class="card-body text-center">
<h5 class="card-title">Produit Gold</h5>

<p class="card-text">
Produit cosmétique luxueux.
</p>

<h6 class="text-success">200 DH</h6>

<a href="#" class="btn btn-primary">Acheter</a>

</div>

</div>
</div>

<div class="col-md-4">
<div class="card h-100 shadow">

<img src="{{ asset('images/parfum3.jpg') }}" class="card-img-top">

<div class="card-body text-center">
<h5 class="card-title">Produit Night</h5>

<p class="card-text">
Produit cosmétique idéal pour le soin.
</p>

<h6 class="text-success">180 DH</h6>

<a href="#" class="btn btn-primary">Acheter</a>

</div>

</div>
</div>
<div class="row g-4 mb-6">

<div class="col-md-4">
<div class="card h-100 shadow">

<img src="{{ asset('images/parfum1.jpg') }}" class="card-img-top">

<div class="card-body text-center">
<h5 class="card-title">Produit Rose</h5>

<p class="card-text">
Produit cosmétique doux pour la peau.
</p>

<h6 class="text-success">150 DH</h6>

<a href="#" class="btn btn-primary">Acheter</a>

</div>

</div>
</div>

<div class="col-md-4">
<div class="card h-100 shadow">

<img src="{{ asset('images/parfum2.jpg') }}" class="card-img-top">

<div class="card-body text-center">
<h5 class="card-title">Produit Gold</h5>

<p class="card-text">
Produit cosmétique luxueux.
</p>

<h6 class="text-success">200 DH</h6>

<a href="#" class="btn btn-primary">Acheter</a>

</div>

</div>
</div>

<div class="col-md-4">
<div class="card h-100 shadow">

<img src="{{ asset('images/parfum3.jpg') }}" class="card-img-top">

<div class="card-body text-center">
<h5 class="card-title">Produit Night</h5>

<p class="card-text">
Produit cosmétique idéal pour le soin.
</p>

<h6 class="text-success">180 DH</h6>

<a href="#" class="btn btn-primary">Acheter</a>

</div>

</div>
</div>

</div></div>
<div class="container mt-5 mb-5">

<div class="row align-items-center">

<div class="col-md-6">
<img src="{{ asset('pexels-pixabay-247600.jpg') }}" 
class="img-fluid rounded shadow">
</div>

<div class="col-md-6">

<h3 class="fw-bold mb-3">Pourquoi choisir Andalocy ?</h3>

<p class="text-muted">
Andalocy vous propose une sélection de produits cosmétiques 
de haute qualité pour prendre soin de votre peau et de votre beauté.
</p>

<p class="text-muted">
Nos produits sont soigneusement choisis pour offrir 
élégance, douceur et efficacité.
</p>

<a href="#" class="btn btn-dark mt-3">Découvrir plus</a>

</div>

</div>

</div>
 @include('./Master.footer') 
 
</body>
</html>

 

 -->



<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">

<title>Promotions</title>
<style>
.title{
text-align:center;
margin-top:40px;
margin-bottom:40px;
font-weight:700;
color:#3D2B1F;
}

.old-price{
text-decoration: line-through;
color:gray;
}

.new-price{
color:#b76e79;
font-weight:bold;
font-size:20px;
}


 
</style>

</head>

<body>
 @include('./Master.menu') 
<div class="container">

<h2 class="title">Nos Promotions</h2>

<div class="row g-4 mb-4">

<div class="col-md-4">
<div class="card shadow-sm">

<img src="{{ asset('GEL DOUCHE 3.png') }}" class="card-img-top">

<div class="card-body text-center">

<h5 class="card-title">Crème Visage</h5>

<p class="card-text">Crème naturelle pour hydrater la peau.</p>

<p>
<span class="old-price">120 DH</span>
<span class="new-price">90 DH</span>
</p>

<button class="btn btn-success">Ajouter au panier</button>

</div>
</div>
</div>
<div class="col-md-4">
<div class="card shadow-sm">

<img src="{{ asset('GEL DOUCHE 3.png') }}" class="card-img-top">

<div class="card-body text-center">

<h5 class="card-title">Huile Cheveux</h5>

<p class="card-text">Huile naturelle pour des cheveux brillants.</p>

<p>
<span class="old-price">150 DH</span>
<span class="new-price">110 DH</span>
</p>

<button class="btn btn-success">Ajouter au panier</button>

</div>
</div>
</div>

<div class="col-md-4">
<div class="card shadow-sm">

<img src="{{ asset('GEL DOUCHE 3.png') }}" class="card-img-top">

<div class="card-body text-center">

<h5 class="card-title">Parfum Andalocy</h5>

<p class="card-text">Parfum doux avec une touche naturelle.</p>

<p>
<span class="old-price">200 DH</span>
<span class="new-price">160 DH</span>
</p>

<button class="btn btn-success">Ajouter au panier</button>

</div>
</div>
</div>

</div>

</div>
@include('./Master.footer') 
</body>
</html> -->