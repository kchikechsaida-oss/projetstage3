{{-- resources/views/facture.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; color: #333; }
        .header { text-align:center; border-bottom:2px solid #8B6F47; padding-bottom:20px; margin-bottom:30px; }
        .header h1 { color:#8B6F47; font-size:28px; margin:0; }
        .header p { color:#666; font-size:13px; margin:4px 0; }
        .row-flex { display:flex; justify-content:space-between; margin-bottom:20px; }
        .info-box { background:#f9f9f9; padding:15px; border-radius:8px; width:48%; }
        .info-box h4 { color:#8B6F47; margin-bottom:10px; font-size:14px; text-transform:uppercase; }
        .info-box p { margin:3px 0; font-size:13px; }
        table { width:100%; border-collapse:collapse; margin:20px 0; }
        th { background:#8B6F47; color:white; padding:10px; text-align:left; font-size:13px; }
        td { padding:10px; border-bottom:1px solid #eee; font-size:13px; }
        tr:nth-child(even) { background:#fafafa; }
        .total-section { text-align:right; margin-top:20px; }
        .total-section p { font-size:14px; margin:5px 0; }
        .total-section .grand-total { font-size:22px; font-weight:bold; color:#8B6F47; }
        .points-box { background:#fff3cd; padding:15px; border-radius:8px; margin-top:20px; text-align:center; }
        .points-box strong { color:#856404; }
        .footer { text-align:center; margin-top:40px; color:#999; font-size:12px; border-top:1px solid #eee; padding-top:15px; }
        .statut { padding:3px 10px; border-radius:20px; font-size:12px; font-weight:bold; }
        .statut-attente { background:#fff3cd; color:#856404; }
        .statut-confirmee { background:#d1e7dd; color:#0f5132; }
        .statut-livree { background:#cfe2ff; color:#084298; }
        .statut-annulee { background:#f8d7da; color:#842029; }
    </style>
</head>
<body>

<div class="header">
    <h1> Andalocy Parfums</h1>
    <p>La nature au cœur de votre beauté</p>
    <p>contact@andalocyparfums.com | +212 06 62 29 03 70</p>
</div>

<div class="row-flex">
    <div>
        <h3 style="color:#8B6F47; margin:0;">FACTURE</h3>
        <p style="font-size:13px; color:#666;">
            N° {{ str_pad($commande->idCommande, 6, '0', STR_PAD_LEFT) }}
        </p>
        <p style="font-size:13px; color:#666;">
            Date : {{ date('d/m/Y', strtotime($commande->created_at)) }}
        </p>
    </div>
    <div style="text-align:right;">
        <p style="font-size:13px;">
            <strong>Statut :</strong>
            @php
                $statutClass = match($commande->statut) {
                    'en attente'  => 'statut-attente',
                    'confirmée'   => 'statut-confirmee',
                    'livrée'      => 'statut-livree',
                    'annulée'     => 'statut-annulee',
                    default       => 'statut-attente'
                };
            @endphp
            <span class="statut {{ $statutClass }}">
                {{ strtoupper($commande->statut) }}
            </span>
        </p>
        <p style="font-size:13px;">
            <strong>Paiement :</strong> À la livraison
        </p>
    </div>
</div>

{{-- ✅ Infos client + livraison --}}
<div class="row-flex">
    <div class="info-box">
        <h4>Client</h4>
        <p><strong>{{ $client->prenom }} {{ $client->nom }}</strong></p>
        <p>{{ $client->email }}</p>
        <p>{{ $client->telephone }}</p>
    </div>
    <div class="info-box">
        <h4>Livraison</h4>
        <p>{{ $commande->adresse }}</p>
        <p>{{ $commande->ville }} {{ $commande->code_postal }}</p>
        <p>Maroc</p>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>Produit</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Sous-total</th>
        </tr>
    </thead>
    <tbody>
        @forelse($produits as $item)
        <tr>
            <td>{{ $item->nomP }}</td>
            <td>{{ $item->prix }} DH</td>
            <td>{{ $item->quantite }}</td>
            <td>{{ $item->prix * $item->quantite }} DH</td>
        </tr>
        @empty
        <tr>
            <td colspan="4" style="text-align:center; color:#999;">
                Aucun produit
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="total-section">
    <p>Sous-total : <strong>{{ $commande->total }} DH</strong></p>
    <p>Livraison : <strong style="color:green;">Gratuite</strong></p>
    <p class="grand-total">Total : {{ $commande->total }} DH</p>
</div>

<div class="points-box">
    ⭐ Vous avez gagné <strong>{{ $pointsGagnes }} points</strong>
    grâce à cette commande !
    <br>
    <small>1 point = 1 DH de réduction sur votre prochaine commande</small>
</div>

<div class="footer">
    Merci pour votre confiance ! | Andalocy Parfums © {{ date('Y') }}
    <br>
    <small>Cette facture a été générée automatiquement.</small>
</div>

</body>
</html>