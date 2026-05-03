

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <title>Promotions</title>
    <style>
        .title { text-align:center; margin-top:40px; margin-bottom:40px; font-weight:700; color:#3D2B1F; }
        .old-price { text-decoration:line-through; color:gray; }
        .new-price { color:#b76e79; font-weight:bold; font-size:20px; }
        .badge-promo { position:absolute; top:10px; right:10px; background:#e74c3c; color:white; padding:5px 10px; border-radius:20px; font-weight:bold; }
    </style>
</head>
<body>

@include('Master.menu')

<div class="container">
    <h2 class="title"> Nos Promotions</h2>

    <div class="row g-4 mb-4">
        @forelse($promotions as $promo)
        <div class="col-md-4">
            <div class="card shadow-sm position-relative">

                {{-- Badge réduction --}}
                <span class="badge-promo">
                    -{{ round((($promo->prix_ancien - $promo->prix_promo) / $promo->prix_ancien) * 100) }}%
                </span>

                {{-- Image --}}
                @if($promo->image)

      
                    <img src="{{ asset('storage/'.$promo->image) }}" 
                         class="card-img-top" style="height:200px; object-fit:contain; padding:10px;">
                @else
                    <img src="{{ asset('storage/'.$promo->image_produit) }}" 
                         class="card-img-top" style="height:200px; object-fit:contain; padding:10px;">
                @endif

                <div class="card-body text-center">
                    <h5 class="card-title">{{ $promo->nomP }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($promo->description, 60) }}</p>
                    <p>
                        <span class="old-price">{{ $promo->prix_ancien }} DH</span>
                        <span class="new-price ms-2">{{ $promo->prix_promo }} DH</span>
                    </p>
                    <small class="text-muted d-block mb-3">
                        Jusqu'au {{ date('d/m/Y', strtotime($promo->date_fin)) }}
                    </small>
                    <form action="/panier/ajouter/{{ $promo->idProduit }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success w-100">
                            🛒 Ajouter au panier
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <h5 class="text-muted">Aucune promotion disponible pour le moment</h5>
        </div>
        @endforelse
    </div>
</div>

@include('Master.footer')
</body>
</html>