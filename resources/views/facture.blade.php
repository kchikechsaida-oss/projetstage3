<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; color: #333; }
        .header { text-align: center; border-bottom: 2px solid #8B6F47; padding-bottom: 20px; margin-bottom: 30px; }
        .header h1 { color: #8B6F47; font-size: 28px; }
        .header p { color: #666; font-size: 13px; }
        .info-row { display: flex; justify-content: space-between; margin-bottom: 20px; }
        .info-box { background: #f9f9f9; padding: 15px; border-radius: 8px; width: 48%; }
        .info-box h4 { color: #8B6F47; margin-bottom: 10px; font-size: 14px; }
        .info-box p { margin: 3px 0; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th { background: #8B6F47; color: white; padding: 10px; text-align: left; font-size: 13px; }
        td { padding: 10px; border-bottom: 1px solid #eee; font-size: 13px; }
        .total-box { text-align: right; margin-top: 20px; }
        .total-box .total { font-size: 20px; font-weight: bold; color: #8B6F47; }
        .points-box { background: #fff3cd; padding: 15px; border-radius: 8px; margin-top: 20px; text-align: center; }
        .footer { text-align: center; margin-top: 40px; color: #999; font-size: 12px; border-top: 1px solid #eee; padding-top: 15px; }
    </style>
</head>
<body>

<div class="header">
    <h1> Andalocy Parfums</h1>
    <p>La nature au cœur de votre beauté</p>
    <p>contact@andalocyparfums.com | +212 06 62 29 03 70</p>
</div>

<div style="display:flex; justify-content:space-between; margin-bottom:20px;">
    <div>
        <h3 style="color:#8B6F47;">FACTURE</h3>
        <p style="font-size:13px; color:#666;">N° {{ str_pad($commande->idCommande, 6, '0', STR_PAD_LEFT) }}</p>
        <p style="font-size:13px; color:#666;">Date: {{ date('d/m/Y', strtotime($commande->created_at)) }}</p>
    </div>
    <div style="text-align:right;">
        <p style="font-size:13px;"><strong>Statut:</strong> 
            <span style="color:#f39c12;">{{ strtoupper($commande->statut) }}</span>
        </p>
        <p style="font-size:13px;"><strong>Paiement:</strong> À la livraison</p>
    </div>
</div>

<div style="display:flex; justify-content:space-between; margin-bottom:20px;">
    <div style="background:#f9f9f9; padding:15px; border-radius:8px; width:48%;">
        <h4 style="color:#8B6F47; margin-bottom:10px; font-size:14px;">CLIENT</h4>
        <p style="margin:3px 0; font-size:13px;"><strong>{{ $commande->prenom }} {{ $commande->nom }}</strong></p>
        <p style="margin:3px 0; font-size:13px;">{{ $commande->email }}</p>
        <p style="margin:3px 0; font-size:13px;">{{ $commande->telephone }}</p>
    </div>
    <div style="background:#f9f9f9; padding:15px; border-radius:8px; width:48%;">
        <h4 style="color:#8B6F47; margin-bottom:10px; font-size:14px;">LIVRAISON</h4>
        <p style="margin:3px 0; font-size:13px;">{{ $commande->adresse }}</p>
        <p style="margin:3px 0; font-size:13px;">{{ $commande->ville }} {{ $commande->code_postal }}</p>
        <p style="margin:3px 0; font-size:13px;">Maroc</p>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>Description</th>
            <th>Montant</th>
            <th>Points gagnés</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Commande N° {{ str_pad($commande->idCommande, 6, '0', STR_PAD_LEFT) }}</td>
            <td>{{ $commande->total }} DH</td>
            <td> {{ $pointsGagnes }} pts</td>
        </tr>
    </tbody>
</table>

<div style="text-align:right; margin-top:20px;">
    <p style="font-size:14px;">Sous-total: <strong>{{ $commande->total }} DH</strong></p>
    <p style="font-size:14px;">Livraison: <strong>Gratuite</strong></p>
    <p style="font-size:20px; font-weight:bold; color:#8B6F47;">
        Total: {{ $commande->total }} DH
    </p>
</div>

<div style="background:#fff3cd; padding:15px; border-radius:8px; margin-top:20px; text-align:center;">
     Vous avez gagné <strong>{{ $pointsGagnes }} points</strong> 
    grâce à cette commande!
    <br>
    <small>1 point = 1 DH de réduction sur votre prochaine commande</small>
</div>

<div style="text-align:center; margin-top:40px; color:#999; font-size:12px; border-top:1px solid #eee; padding-top:15px;">
    Merci pour votre confiance! | Andalocy Parfums © {{ date('Y') }}
</div>

</body>
</html>