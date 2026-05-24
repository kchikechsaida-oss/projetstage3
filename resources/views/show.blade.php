<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<title>Détail Produit</title>
<style>
body { background: linear-gradient(to right, #f8f9fa, #e3f2fd); }
.card { border-radius: 20px; }
img { border-radius: 15px; }
.star { color: #ffc107; font-size: 18px; }
.comment-card {
    border-radius: 12px;
    border: 1px solid #eee;
    padding: 15px;
    margin-bottom: 12px;
    background: #fff;
}
.avatar {
    width: 40px; height: 40px;
    border-radius: 50%;
    background: #f3e8f0;
    display: flex; align-items: center; justify-content: center;
    font-weight: 600; color: #993556; font-size: 14px;
}
</style>
</head>

<body>

@include('Master.menu')

<div class="container mt-5">

    {{-- ✅ Produit --}}
    <div class="card shadow p-4 mb-5">
        <div class="row align-items-center">

            {{-- Image --}}
            <div class="col-md-5 text-center">
                <img src="{{ asset('storage/' . $produit->image) }}"
                     class="img-fluid"
                     style="height:300px; object-fit:cover;">
            </div>

            {{-- Infos --}}
            <div class="col-md-7">
                <h2 class="fw-bold">{{ $produit->nomP }}</h2>
                <h4 class="text-success my-3">{{ $produit->prix }} DH</h4>
                <p class="text-muted">{{ $produit->description }}</p>

                <div class="mt-4 d-flex gap-3">
                    <a href="{{ route('panier.ajouter', $produit->idProduit) }}"
                       class="btn btn-primary">
                        <i class="bi bi-cart-plus"></i> Ajouter au panier
                    </a>
                    <a href="/produits" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>
            </div>

        </div>
    </div>

    {{-- ✅ COMMENTAIRES --}}
    <div class="row">
        <div class="col-md-8">

            {{-- Titre --}}
            <h5 class="fw-bold mb-4">
                <i class="bi bi-chat-dots"></i>
                Avis clients
                <span class="badge bg-secondary ms-2">{{ count($commentaires) }}</span>
            </h5>

            {{-- Liste commentaires --}}
            @forelse($commentaires as $com)
            <div class="comment-card">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="avatar">
                        {{ strtoupper(substr($com->prenom, 0, 1)) }}{{ strtoupper(substr($com->nom, 0, 1)) }}
                    </div>
                    <div>
                        <strong>{{ $com->prenom }} {{ $com->nom }}</strong>
                        <div>
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $com->note)
                                    <i class="bi bi-star-fill star"></i>
                                @else
                                    <i class="bi bi-star star" style="color:#ddd;"></i>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <small class="text-muted ms-auto">
                        {{ \Carbon\Carbon::parse($com->created_at)->diffForHumans() }}
                    </small>
                </div>
                <p class="mb-0 text-muted">{{ $com->commentaire }}</p>
            </div>
            @empty
            <div class="text-center py-4 text-muted">
                <i class="bi bi-chat fs-1"></i>
                <p class="mt-2">Aucun avis pour ce produit.</p>
            </div>
            @endforelse

        </div>

        {{-- ✅ Formulaire commentaire --}}
        <div class="col-md-4">
            <div class="card shadow-sm p-4">
                <h6 class="fw-bold mb-3">
                    <i class="bi bi-pencil-square"></i> Laisser un avis
                </h6>

                @if(session('client_id'))

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="/produit/{{ $produit->idProduit }}/commenter" method="POST">
                        @csrf

                        {{-- Note --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Note</label>
                            <div class="d-flex gap-2">
                                @for($i = 5; $i >= 1; $i--)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                           name="note" value="{{ $i }}"
                                           id="note{{ $i }}"
                                           {{ $i == 5 ? 'checked' : '' }}>
                                    <label class="form-check-label star" for="note{{ $i }}">
                                        {{ $i }}★
                                    </label>
                                </div>
                                @endfor
                            </div>
                        </div>

                        {{-- Commentaire --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Votre avis</label>
                            <textarea name="commentaire" class="form-control"
                                      rows="4"
                                      placeholder="Partagez votre expérience..."
                                      required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-send"></i> Envoyer
                        </button>
                    </form>

                @else
                    <div class="text-center py-3">
                        <i class="bi bi-person-lock fs-1 text-muted"></i>
                        <p class="text-muted mt-2">Connectez-vous pour laisser un avis</p>
                        <a href="/login" class="btn btn-outline-primary">
                            <i class="bi bi-box-arrow-in-right"></i> Se connecter
                        </a>
                    </div>
                @endif

            </div>
        </div>

    </div>
</div>

@include('Master.footer')

</body>
</html>