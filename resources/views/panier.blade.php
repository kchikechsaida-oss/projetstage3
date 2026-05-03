<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Panier</title>
<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<style>
body { background:#f8f9fa; }
.title { text-align:center; margin:30px 0; font-weight:bold; color:#2c3e50; }
.card { border-radius:15px; }
.total-box { background:white; padding:20px; border-radius:15px; box-shadow:0 5px 15px rgba(0,0,0,0.1); }
</style>
</head>
<body>

@include('Master.menu')

<div class="container">
<h2 class="title">🛒 Mon Panier</h2>
<div class="row">

    <!-- produits -->
    <div class="col-md-8">
        @forelse($panier as $id => $item)
        <div class="card mb-3 shadow-sm">
            <div class="row g-0 align-items-center">

                <!-- image -->
                <div class="col-md-3 text-center p-2">
                    <img src="{{ asset('storage/'.$item['image']) }}" 
                         class="img-fluid" style="height:120px; object-fit:contain;">
                </div>

                <!-- infos -->
                <div class="col-md-5">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['nom'] }}</h5>
                        <p class="text-muted">{{ $item['prix'] }} DH</p>
                    </div>
                </div>

                <!-- quantité -->
                <div class="col-md-2 text-center">
                    <input type="number" value="{{ $item['quantite'] }}" 
                           class="form-control" min="1">
                </div>

                <!-- supprimer -->
                <div class="col-md-2 text-center">
                    <a href="/panier/supprimer/{{ $id }}" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                    </a>
                </div>

            </div>
        </div>
        @empty
            <div class="alert alert-warning text-center">
                Votre panier est vide 🛒
            </div>
        @endforelse
    </div>

    <!-- total -->
    <div class="col-md-4">
        <div class="total-box">
            <h4>Total</h4>
            <hr>
            @php $total = 0; @endphp
            @foreach($panier as $item)
                @php $total += $item['prix'] * $item['quantite']; @endphp
            @endforeach
            <h5 class="text-success">{{ $total }} DH</h5>
            <a href="/livraison" class="btn btn-success w-100 mt-3">
                ✔ Commander
            </a>
        </div>
    </div>

</div>
</div>

@include('Master.footer')
</body>
</html>