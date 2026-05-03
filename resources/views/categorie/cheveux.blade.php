<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
<script>

// let images = [
// "{{ asset('pexels-luisdelrio-15286.jpg') }}",
// "{{ asset('pexels-pixabay-247600.jpg') }}",
// "{{ asset('pexels-luisdelrio-15286.jpg') }}"
// ];

// let i = 0;

// function changeImage(){
//     i++;
//     if(i >= images.length){
//         i = 0;
//     }
//     document.getElementById("slider").src = images[i];
// }

// setInterval(changeImage, 2000); 

</script>

<body>
     @include('./Master.menu') 
      

<div class="container mt-5 mb-5">
    <div class="text-center mb-4">
<h1 style="font-family: 'Georgia', serif; font-size:45px; letter-spacing:2px; color:#8B0000;">
Andalocy Parfums
</h1>

<p class="text-muted" style="font-size:18px;">
Produits cosmétiques élégants et naturels
</p>
</div>

<!-- <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">

<div class="carousel-inner">

<div class="carousel-item active">
<img src="{{ asset('pexels-luisdelrio-15286.jpg') }}" class="d-block w-100" style="height:250px; object-fit:cover;">
</div>

<div class="carousel-item">
<img src="{{ asset('pexels-pixabay-247600.jpg') }}" class="d-block w-100" style="height:250px; object-fit:cover;">
</div> -->

<!-- <div class="carousel-item">
<img src="{{ asset('pexels-luisdelrio-15286.jpg') }}" class="d-block w-100" style="height:250px; object-fit:cover;">
</div> -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">

<div class="carousel-inner">

<div class="carousel-item active" data-bs-interval="4000">
<img src="{{ asset('pexels-luisdelrio-15286.jpg') }}" class="d-block w-100" style="height:330px; object-fit:cover;">
</div>

<div class="carousel-item" data-bs-interval="2000">
<img src="{{ asset('pexels-pixabay-247600.jpg') }}" class="d-block w-100" style="height:330px; object-fit:cover;">
</div>

</div>

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


</div>

 
<!-- <div class="col-md-8"> -->
    <!-- <div class="text-center mb-4">
        <h3 class="fw-bold">Notre Collection de Parfums</h3>
        <p class="text-muted">Découvrez nos parfums élégants et luxueux</p>
        <hr class="w-25 mx-auto border-2 border-dark">
    </div>

<div class="col-md-4">
<div class="card h-100">

<img src="{{ asset('images/parfum1.jpg') }}" class="card-img-top">

<div class="card-body">
<h5 class="card-title">Parfum Rose</h5>

<p class="card-text">
Parfum élégant avec une odeur douce et féminine.
</p>

<h6 class="text-success">150 DH</h6>

<a href="#" class="btn btn-primary">Acheter</a>

</div>

</div>
</div>

<div class="col-md-4">
<div class="card h-100">

<img src="{{ asset('images/parfum2.jpg') }}" class="card-img-top">

<div class="card-body">
<h5 class="card-title">Parfum Gold</h5>

<p class="card-text">
Un parfum luxueux avec une senteur unique.
</p>

<h6 class="text-success">200 DH</h6>

<a href="#" class="btn btn-primary">Acheter</a>

</div>

</div>
</div>

<div class="col-md-4">
<div class="card h-100">

<img src="{{ asset('images/parfum3.jpg') }}" class="card-img-top">

<div class="card-body">
<h5 class="card-title">Parfum Night</h5>

<p class="card-text">
Parfum intense parfait pour les soirées.
</p>

<h6 class="text-success">180 DH</h6>

<a href="#" class="btn btn-primary">Acheter</a>

</div>

</div>
</div>

 </div>
</div>
</div> -->
<div class="container " > 
<div class="row g-4">

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
<div class="row g-4">

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

 





 
</body>
</html>