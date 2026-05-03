
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Catalogue Produits</title>

<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
@include('./Master.menu')
<!-- SLIDER FULL WIDTH -->

<div id="carouselExample" class="carousel slide">
<div class="carousel-inner">
<div class="carousel-item active">
<img src="{{ asset('hand creme 1.jpg.jpeg') }}"
class="d-block w-100"
style="height:420px; object-fit:cover;">

<!-- <div class="carousel-caption d-none d-md-block">
<h2 class="fw-bold"style="color: #000;">Parfums Élégants</h2>
<p>Découvrez notre collection luxueuse.</p>
<a href="{{route('categorie', 'Soins mains') }}" class="btn btn-dark">Découvrir</a>
</div> -->

</div>

<div class="carousel-item">

<img src="{{ asset('soin cap.jpg.jpeg') }}"
class="d-block w-100"
style="height:420px; object-fit:cover;">

<div class="carousel-caption d-none d-md-block">
<h2 class="fw-bold">Beauté & Cosmétique</h2>
<p>Des produits naturels pour votre peau.</p>
<a href="{{route('categorie', 'Soins mains') }}" class="btn btn-danger">Voir Produits</a>
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
<!-- SERVICES -->

<div class="container mt-5">

<div class="row text-center">

<div class="col-md-4">
<div class="card shadow border-0"s>
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
</div>

<!-- TITRE PRODUITS -->

<div class="container mt-5 text-center">

<h3 class="fw-bold">Notre Collection de Parfums</h3>

<p class="text-muted">
Découvrez nos parfums élégants et luxueux
</p>

<hr class="w-25 mx-auto border-2 border-dark">

</div>

<!-- PRODUITS -->

<div class="container mt-5">

<div class="row g-4   justify-content-center">

<!-- Produit 1 -->
 <div class="col-md-3 text-center ">
 <div class="card mb-4 border-0 bg-white p-2 "  >
    <a href="{{route('categorie', 'Soins cheveux') }}">
    <img src="{{ asset('parfums hair 3.png') }}" class="img-fluid shadow rounded " style="height: 250px; width: 100%; object-fit: contain;"></a>
    <p class="name">Hair Perfume </p>
    <p class="price">55 Dh</p>
  </div>
</div>
<!-- Produit 2 -->
 <div class="col-md-3 text-center ">
 <div class="card mb-4 border-0 bg-white p-2  " >
    <a href="{{route('categorie', 'Soins du corps') }}">
    <img src="{{ asset('GEL DOUCHE 3.png') }}" class="img-fluid shadow rounded" style="height: 250px; width: 100%; object-fit: contain;"></a>
    <p class="name">Gel Douche </p>
    <p class="price">30 Dh</p>
  </div></div>

<!-- Produit 3 -->
 <div class="col-md-3 text-center ">
 <div class="card mb-4 border-0 bg-white p-2" >
    <a href="{{route('categorie', 'Ambiance maison') }}">
    <img src="{{ asset('IMG_1168.png') }}" class="img-fluid shadow rounded" style="height: 250px; width: 100%; object-fit: contain;"></a>
    <p class="name">Spray D'ambiance </p>
    <p class="price">30 Dh</p>
  </div></div>
</div>
<div class="row g-3 justify-content-center" >
    <div class="col-md-3 text-center ">
    <div class="card mb-4 border-0 bg-white p-2" > 
   <a href="{{route('categorie', 'Soins du corps') }}">
    <img src="{{ asset('GEL DOUCHE 6.png') }}" class="img-fluid shadow rounded" style="height: 250px; width: 100%; object-fit: contain;"></a>
    <p class="name">Gel Douche </p>
    <p class="price">30 Dh</p>
  </div></div>

<!-- Produit 1 -->
 <div class="col-md-3 text-center ">
 <div class="card mb-4 border-0 bg-white p-2" >
    <a href="{{route('categorie', 'Soins cheveux') }}">
    <img src="{{ asset('poste istagram soin 22.png') }}" class="img-fluid shadow rounded"style="height: 250px; width: 100%; object-fit: contain;"></a>
    <p class="name">Hair Serum</p>
    <p class="price">65 Dh</p>
  </div></div>

<!-- Produit 2 -->
 <div class="col-md-3 text-center ">
 <div class="card border-0 bg-white p-2" >
    <a href="{{route('categorie', 'Maquillage lèvres') }}">
    <img src="{{ asset('lips gloss final site.png') }}" class="img-fluid shadow rounded" style="height: 250px; width: 100%; object-fit: contain;"></a>
    <p class="name">Lip Gloss</p>
    <p class="price">25 Dh</p>
  </div></div></div>
   
<div class="row g-4  justify-content-center" > 
<div class="col-md-3 text-center ">
    <div class="card mb-4 border-0 bg-white p-2" >
    <a href="{{route('categorie', 'Soins du corps') }}">
    <img src="{{ asset('GEL DOUCHE 7.png') }}" class="img-fluid shadow rounded" style="height: 250px; width: 100%; object-fit: contain;"></a>
    <p class="name">Gel Douche </p>
    <p class="price">30 Dh</p>
  </div></div>
<!-- <img src="{{ asset('gel_douche_6.png') }}" class="img-fluid"> -->
<!-- Produit 2 -->
 <div class="col-md-3 text-center ">
 <div class="card border-0 bg-white p-2" >
    <a href="{{route('categorie', 'Soins mains') }}">
    <img src="{{ asset('PNG GEL DOUCHE kp.png') }}" class="img-fluid shadow rounded" style="height: 250px; width: 100%; object-fit: contain;"></a>
    <p class="name">Vaseline Andalocy</p>
    <p class="price">15 Dh</p>
  </div></div>
  <div class="col-md-3 text-center ">
 <div class="card border-0 bg-white p-2" >
    <a href="{{route('categorie', 'Soins mains') }}">
    <img src="{{ asset('PNG GEL DOUCHE.png') }}" class="img-fluid shadow rounded" style="height: 250px; width: 100%; object-fit: contain;"></a>
    <p class="name">Vaseline Andalocy</p>
    <p class="price">15 Dh</p>
  </div></div>
</div>
</div>
<!-- SECTION INFO -->

<div class="container mt-5 mb-5">

<div class="row align-items-center">

<div class="col-md-6">

<img src="{{ asset('catalogue cosmetique 2026  rec copy.jpg.jpeg') }}"
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
