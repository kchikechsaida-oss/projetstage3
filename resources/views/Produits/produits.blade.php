<div class="container mt-5">

    <h2 class="text-center text-primary mb-4">Catalogue Produits</h2>
    <div class="row g-4">
        @foreach($produits as $produit)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 rounded-4">
                <!-- Image -->
                <img src="{{ asset('storage/' . $produit->image) }}" 
                     class="card-img-top rounded-top-4"
                     style="height:200px; object-fit:cover;">

                <div class="card-body text-center">

                    <!-- Nom -->
                    <h5 class="card-title fw-bold">
                        {{ $produit->nomP }}
                    </h5>

                    <!-- Prix -->
                    <p class="text-success fw-bold">
                        {{ $produit->prix }} DH
                    </p>

                    <!-- Description -->
                    <p class="text-muted small">
                        {{ $produit->description }}
                    </p>

                </div>
                <!-- Buttons -->
                <div class="card-footer bg-white border-0 text-center">

                    <a href="/produits/{{ $produit->idProduit }}/edit" 
                       class="btn btn-warning btn-sm">
                        ✏ Modifier
                    </a>

                    <form action="/produits/{{ $produit->idProduit }}" 
                          method="POST" 
                          style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Supprimer ce produit ?')">
                            🗑 Supprimer
                        </button>
                    </form>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
body{
    background: linear-gradient(to right, #f8f9fa, #e3f2fd);
}

.card:hover{
    transform: scale(1.03);
    transition: 0.3s;
}
</style>