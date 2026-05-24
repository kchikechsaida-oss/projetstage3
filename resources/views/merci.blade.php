 

{{-- resources/views/commande/confirmation.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande confirmée</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'DM Sans', sans-serif; background: #f8f8f6; }

        .oc-wrap {
            max-width: 560px;
            margin: 4rem auto;
            padding: 2.5rem;
            background: #fff;
            border-radius: 16px;
            border: 0.5px solid #e0dfd8;
            text-align: center;
        }

        .oc-icon-ring {
            width: 80px; height: 80px;
            border-radius: 50%;
            background: #eaf3de;
            border: 0.5px solid #c0dd97;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.5rem;
        }
        .oc-icon-ring i { font-size: 36px; color: #3b6d11; }

        .oc-title {
            font-family: 'DM Serif Display', serif;
            font-size: 30px; font-weight: 400;
            color: #2c2c2a;
            margin: 0 0 0.5rem;
        }

        .oc-sub {
            font-size: 15px; color: #888780;
            line-height: 1.6; margin: 0 0 1.75rem;
        }

        .oc-badges {
            display: flex; flex-direction: column;
            gap: 10px; margin: 0 0 1.75rem;
            text-align: left;
        }

        .oc-badge {
            display: flex; align-items: center; gap: 10px;
            padding: 12px 16px;
            border-radius: 8px;
            border: 0.5px solid #e0dfd8;
            background: #f8f8f6;
            font-size: 14px; color: #2c2c2a;
        }
        .oc-badge i { font-size: 18px; flex-shrink: 0; }
        .oc-badge.pts { background: #faeeda; border-color: #fac775; color: #633806; }
        .oc-badge.cash { background: #e6f1fb; border-color: #b5d4f4; color: #0c447c; }
        .oc-badge strong { font-weight: 500; }

        .oc-divider { height: 0.5px; background: #e0dfd8; margin: 1.75rem 0; }

        .oc-actions {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .oc-btn {
            display: flex; flex-direction: column;
            align-items: center; gap: 6px;
            padding: 14px 8px;
            border-radius: 8px;
            border: 0.5px solid #d3d1c7;
            background: #fff;
            font-size: 12px; color: #888780;
            text-decoration: none;
            transition: background 0.15s, color 0.15s;
        }
        .oc-btn i { font-size: 20px; color: #2c2c2a; }
        .oc-btn:hover { background: #f8f8f6; color: #2c2c2a; text-decoration: none; }
    </style>
</head>
<body>

@include('Master.menu')

<div class="oc-wrap">

    <div class="oc-icon-ring">
        <i class="ti ti-circle-check"></i>
    </div>

    <h1 class="oc-title">Commande confirmée</h1>
    <p class="oc-sub">
        Merci pour votre commande.<br>
        Vous serez contacté pour confirmer la livraison.
    </p>

    <div class="oc-badges">

        @if(request('points') > 0)
        <div class="oc-badge pts">
            <i class="ti ti-star"></i>
            <span>Vous avez gagné <strong>{{ request('points') }} points</strong> de fidélité</span>
        </div>
        @endif

        <div class="oc-badge cash">
            <i class="ti ti-wallet"></i>
            <span>Paiement : <strong>À la livraison (Cash)</strong></span>
        </div>

    </div>

    <div class="oc-divider"></div>

    <div class="oc-actions">
        <a href="{{ url('/facture/' . request('commande')) }}" class="oc-btn">
            <i class="ti ti-file-invoice"></i>
            Télécharger la facture
        </a>
        <a href="{{ url('/produits') }}" class="oc-btn">
            <i class="ti ti-shopping-bag"></i>
            Continuer les achats
        </a>
        <a href="{{ url('/CompteClient') }}" class="oc-btn">
            <i class="ti ti-user-circle"></i>
            Mon compte
        </a>
    </div>

</div>

@include('Master.footer')

</body>
</html>