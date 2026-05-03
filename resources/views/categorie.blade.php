 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>

window.filtrer = function(categories) {

    let cards = document.querySelectorAll('.produit-card');

    cards.forEach(card => {

        let data = card.getAttribute('data-categorie');

        if (Array.isArray(categories)) {
            let match = categories.some(cat => data.includes(cat));
            card.style.display = match ? 'block' : 'none';
        } else {
            card.style.display = (categories === 'all' || data.includes(categories)) ? 'block' : 'none';
        }

    });

}
    </script>


 </head>


 <style>
    /* space تحت menu */
.filter-container{
    margin-top: 40px;
    margin-bottom: 30px;
}

/* buttons style */
.filter-btn{
    border: 1px solid #dee2e6;
    background: #f8f9fa;
    color: #333;
    padding: 8px 20px;
    margin: 5px;
    border-radius: 25px;
    font-size: 14px;
    transition: 0.3s;
}

/* hover */
.filter-btn:hover{
    background: #e9ecef;
}

/* active */
.filter-btn.active{
    background: #6c757d; /* gris بدل الأزرق */
    color: white;
    border-color: #6c757d;
}
 </style>
 <body>
    @include('./Master.menu')
    <!-- Boutons filtres -->


      <div class="text-center mb-4">
    <!-- <button class="filter-btn active" onclick="filtrer('all')">Tous</button>
    <button class="filter-btn" onclick="filtrer('Lip Gloss')">Soins du visage</button>
    <button class="filter-btn" onclick="filtrer(['Hair Perfume','Hair Serum'])">Soins cheveux</button>
    <button class="filter-btn" onclick="filtrer(' Gel Douche')">Soins du corps</button>
    <button class="filter-btn" onclick="filtrer('Vaseline Andalocy')">Soins mains</button>
    <button class="filter-btn" onclick="filtrer('Spray ambiance')">Maquillage lèvres</button>
    <button class="filter-btn" onclick="filtrer('  ambiance')">Ambiance maison</button> -->

<button class="filter-btn" onclick="window.location='/produits'">Tous</button>
  <button class="filter-btn" onclick="window.location='/produits?categorie=Soins du visage'">Soins du visage</button>
<button class="filter-btn" onclick="window.location='/produits?categorie=Soins cheveux'">Soins cheveux</button>
<button class="filter-btn" onclick="window.location='/produits?categorie=Soins du corps'">Soins du corps</button>
<button class="filter-btn" onclick="window.location='/produits?categorie=Soins mains'">Soins mains</button>
<button class="filter-btn" onclick="window.location='/produits?categorie=Maquillage lèvres'">Maquillage lèvres</button>
<button class="filter-btn" onclick="window.location='/produits?categorie=Ambiance maison'">Ambiance maison</button>
 </div>
@foreach($produits as $produit)

<div class="col-12 produit-card mb-4" data-categorie="{{ $produit->categorie }}">

    <div class="card border-0 shadow-sm p-3 position-relative">

        <div class="row align-items-center">

            <!-- Image -->
            <div class="col-md-4 text-center position-relative">

                 
                 
                <a href="/produit/{{ $produit->idProduit }}">
                    <img src="{{ asset('storage/' . $produit->image) }}" 
                         class="img-fluid"
                         style="height:200px; object-fit:contain;">
                </a>
            </div>

            <!-- Infos -->
            <div class="col-md-8">

                <!-- Nom -->
                <h5 class="fw-bold mb-2">
                    {{ $produit->nomP }}
                </h5>

                <!-- ⭐ Rating -->
                <div class="mb-2 text-warning">
                    ⭐⭐⭐⭐☆
                </div>

                <!-- Prix -->
                <p class="text-success fw-bold mb-2 fs-5">
                    {{ $produit->prix }} DH
                </p>

                <!-- Description -->
                <p class="text-muted mb-3">
                    {{ $produit->description }}
                </p>


                <!-- Buttons -->
                <div class="d-flex gap-2">
               <form action="/panier/ajouter/{{ $produit->idProduit }}" method="POST">
               @csrf
              <button type="submit" class="btn btn-primary">
              🛒 Ajouter au panier
            </button>
        </form>
                    <a href="/produit/{{ $produit->idProduit }}" 
                       class="btn btn-outline-dark">
                         Voir
                    </a>

                </div>

            </div>

        </div>
        
    </div>

</div>

@endforeach
@include('./Master.footer')
 </body>
 </html>