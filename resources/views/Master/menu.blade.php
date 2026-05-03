 


 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<title>Catalogue</title>
<!-- <script>
document.getElementById('searchInput').addEventListener('keyup', function(){
    let query = this.value;

    if(query.length < 1){
        document.getElementById('resultBox').innerHTML = "";
        return;
    }

    fetch(`/search?q=${query}`)
    .then(res => res.json())
    .then(data => {

        let html = "";

        data.forEach(p => {
            html += `
            <a href="/produit/${p.idProduit}" class="list-group-item list-group-item-action d-flex align-items-center gap-2">
                <img src="/storage/${p.image}" width="40" height="40" style="object-fit:cover;">
                <span>${p.nomP}</span>
            </a>`;
        });

        document.getElementById('resultBox').innerHTML = html;
    });
});
 
</script> -->

<style>
body{
font-family:'Poppins',sans-serif;

}
.dropdown-item{
    color: #000;
}

.dropdown-item:hover{
    background: #f8f9fa;
    color: #000;
}
/* header */
.header{
position:relative;
height:200px;
/* background:#f3e8ea ; */
}

.header img{
height:260px;
object-fit:cover;
}

/* overlay */
.overlay{
position:absolute;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.4);
color:white;
display:flex;
align-items:center;
}

/* search */
.search-box input{
height:45px;
border-radius:30px;
}

/* navbar */
.navbar{
background:#FFFFFF;
font-size: 20px;
 color: #000;
}

.nav-link{
    color: #000 ;
    font-weight: 500;
}

.nav-link:hover{
    color: #555 ;
}
/* select */
.navbar select{
background:transparent;
border:none;
color:#2e3a2f;
font-weight:500;
cursor:pointer;
appearance:none; /* تحيد السهم */
padding:0;
}

.navbar select:focus{
outline:none;
box-shadow:none;
}

/* icons */
.bi-cart3,
.bi-person{
font-size:22px;
color:black;
}

 .custom-dropdown {
    border-radius: 8px;
    padding: 5px 0;
    border: 1px solid #eee;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
}

/* نخبي header */
.custom-dropdown .dropdown-header {
    display: none;
}

/* items */
.custom-dropdown .dropdown-item {
    padding: 10px 18px;
    font-size: 14px;
    color: #333;
    transition: 0.2s;
}

/* hover خفيف */
.custom-dropdown .dropdown-item:hover {
    background-color: #f5f5f5;
    color: #000;
}

/* link ديال navbar */
.nav-link {
    font-weight: 500;
}

/* يظهر بال hover */
.nav-item.dropdown:hover .dropdown-menu {
    display: block;
}
</style>

</head>

<body>

<!-- -- HEADER -- -->
<div class="header">

<img src="{{ asset('pat.jpeg') }}" class="w-100">

<div class="overlay">
<div class="container-fluid px-5">

<div class="row align-items-center w-100">

<!-- -- CONTACT -- -->
 <div class="col-md-3">
<p><i class="bi bi-envelope"></i> contact@andalocyparfums.com</p>
<!-- <p><i class="bi bi-geo-alt"></i> Safi, Maroc</p> -->
<p><i class="bi bi-telephone"></i> +212 06 62 29 03 70</p>
</div> 

<!-- -- LOGO + TITLE -- -->
<div class="col-md-6 text-center mb-5"  >
<div class="d-flex justify-content-center align-items-center gap-3">
<img src="{{ asset('logo3.png') }}" style="height:90px;">
<h2 class="fw-bold m-0">Andalocy Parfums</h2>
</div>
<p class="mt-2 test-center">La nature au cœur de votre beauté</p>
</div>

  
<div style="position:relative; width:300px;">
    <div class="input-group shadow rounded-pill overflow-hidden">
        <span class="input-group-text bg-white border-0">
            <i class="bi bi-search"></i>
        </span>
        <input type="search" 
               id="searchInput"
               class="form-control border-0"
               placeholder="Rechercher produit...">
    </div>

    <div id="resultBox" 
         class="list-group position-absolute w-100 mt-2 shadow"
         style="z-index:9999; border-radius:10px; top:100%; left:0;">
    </div>

</div>
</div>
</div></div>
</div>
</div>
 
<!--    
 
-- NAVBAR   -- -->

<nav class="navbar navbar-expand-lg  navbar-light">
<div class="container-fluid px-5">

<div class="d-flex justify-content-between w-100 align-items-center">

<ul class="navbar-nav d-flex flex-row gap-4 align-items-center mx-auto ">

<li class="nav-item">
<a class="nav-link" href="/catalogue">Accueil</a>
</li>


<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
    Catégories
  </a>

 
<ul class="dropdown-menu custom-dropdown">
<li><a class="dropdown-item" href="/produits?categorie=Soins du visage">Soins du visage</a></li>
<li><a class="dropdown-item" href="/produits?categorie=Soins cheveux">Soins cheveux</a></li>
<li><a class="dropdown-item" href="/produits?categorie=Soins du corps">Soins du corps</a></li>
<li><a class="dropdown-item" href="/produits?categorie=Soins mains">Soins mains</a></li>
<li><a class="dropdown-item" href="/produits?categorie=Maquillage lèvres">Maquillage lèvres</a></li>
<li><a class="dropdown-item" href="/produits?categorie=Ambiance maison">Ambiance maison</a></li>
</ul>
<li class="nav-item">
    <a class="nav-link" href="/Promotion">Promotions</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="/contact">Contact</a>
</li>

</ul>

<div class="d-flex gap-3">
<a href="/panier" class="me-3">
<i class="bi bi-cart3"></i>
</a>

<a href="/CompteClient">
<i class="bi bi-person"></i>
</a>
</div>

</div>
</div>
</div>
</nav>
</body>
<script>
document.getElementById('searchInput').addEventListener('keyup', function(){
    let query = this.value;

    if(query.length < 1){
        document.getElementById('resultBox').innerHTML = "";
        return;
    }

    fetch(`/search?q=${query}`)
    .then(res => res.json())
    .then(data => {

        let html = "";

        data.forEach(p => {
            html += `
            <a href="/produit/${p.idProduit}" class="list-group-item list-group-item-action d-flex align-items-center gap-2">
                <img src="/storage/${p.image}" width="40" height="40" style="object-fit:cover;">
                <span>${p.nomP}</span>
            </a>`;
        });

        document.getElementById('resultBox').innerHTML = html;
    });
});
 
</script>

</html> 


 