{{-- resources/views/Clients/CompteClient.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte — Andalocy</title>

    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body{
            background:#f8f9fa;
        }

        .card{
            border-radius:15px;
        }
    </style>
</head>
<body>

@include('Master.menu')

<div class="container mt-5 mb-5">

{{-- Messages --}}
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="row">

    {{-- Infos client --}}
    <div class="col-md-4">

        <div class="card shadow border-0 p-4 text-center">

            {{-- Avatar --}}
            <div class="mx-auto mb-3"
                 style="
                 width:80px;
                 height:80px;
                 border-radius:50%;
                 background:#cfe2ff;
                 display:flex;
                 align-items:center;
                 justify-content:center;
                 font-size:28px;
                 font-weight:bold">

                {{ strtoupper(substr($client->prenom ?? 'A',0,1)) }}
                {{ strtoupper(substr($client->nom ?? 'A',0,1)) }}

            </div>

            <h4 class="fw-bold">
                {{ $client->prenom }}
                {{ $client->nom }}
            </h4>

            {{-- تم التصحيح هنا --}}
            <p class="text-muted">
                {{ $client->email }}
            </p>

            <p class="text-muted">
                <i class="bi bi-telephone"></i>
                {{ $client->telephone ?? 'Non renseigné' }}
            </p>

            <div class="alert alert-warning mt-3">

                <h5>
                    ⭐ Points disponibles
                </h5>

                <h2 class="fw-bold">
                    {{ $client->points ?? 0 }}
                </h2>

                <p>
                    =
                    <strong>
                    {{ $client->points ?? 0 }} DH
                    </strong>
                    de remise
                </p>

            </div>

            <button
                class="btn btn-outline-primary w-100"
                data-bs-toggle="modal"
                data-bs-target="#modifierProfil">

                <i class="bi bi-pencil"></i>

                Modifier mon profil

            </button>

        </div>

    </div>


    {{-- Commandes + historique --}}
    <div class="col-md-8">

        {{-- commandes --}}
        <div class="card shadow border-0 mb-4">

            <div class="card-body">

                <h5 class="mb-3">
                    <i class="bi bi-bag"></i>
                    Mes commandes
                </h5>

                <table class="table">

                    <thead>

                    <tr>

                        <th>#</th>
                        <th>Total</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th>Facture</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($commandes as $commande)

                    <tr>

                        <td>
                            {{ $commande->idCommande }}
                        </td>

                        <td>
                            {{ $commande->total }} DH
                        </td>

                        <td>

                            <span class="badge bg-primary">
                                {{ $commande->statut }}
                            </span>

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($commande->created_at)->format('d/m/Y') }}

                        </td>

                        <td>

                            <a
                            href="{{ route('commande.facture',$commande->idCommande) }}"
                            class="btn btn-sm btn-danger">

                            <i class="bi bi-file-pdf"></i>

                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5" class="text-center">

                            Aucune commande trouvée

                        </td>

                    </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- historique points --}}

        <div class="card shadow border-0">

            <div class="card-body">

                <h5>

                    <i class="bi bi-clock-history"></i>

                    Historique des achats

                </h5>

                <table class="table">

                    <thead>

                    <tr>

                        <th>Date</th>
                        <th>Montant</th>
                        <th>Points gagnés</th>
                        <th>Points utilisés</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($achats as $achat)

                    <tr>

                        <td>

                            {{ \Carbon\Carbon::parse($achat->created_at)->format('d/m/Y') }}

                        </td>

                        <td>

                            {{ $achat->montant }}

                            DH

                        </td>

                        <td class="text-success">

                            +{{ $achat->points_gagnes }}

                        </td>

                        <td class="text-danger">

                            -{{ $achat->points_utilises }}

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4" class="text-center">

                            Aucun achat

                        </td>

                    </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</div>


{{-- Modal modifier profil --}}

<div class="modal fade" id="modifierProfil">

<div class="modal-dialog">

<div class="modal-content">

<form action="{{ route('client.modifierProfil') }}"
method="POST">

@csrf

<div class="modal-header">

<h5>Modifier profil</h5>

<button
type="button"
class="btn-close"
data-bs-dismiss="modal">
</button>

</div>

<div class="modal-body">

<input
type="text"
name="nom"
class="form-control mb-3"
value="{{ $client->nom }}"
placeholder="Nom">


<input
type="text"
name="prenom"
class="form-control mb-3"
value="{{ $client->prenom }}"
placeholder="Prénom">


<input
type="text"
name="telephone"
class="form-control mb-3"
value="{{ $client->telephone }}"
placeholder="Téléphone">

</div>

<div class="modal-footer">

<button
class="btn btn-primary">

Enregistrer

</button>

</div>

</form>

</div>

</div>

</div>

@include('Master.footer')

</body>
</html>