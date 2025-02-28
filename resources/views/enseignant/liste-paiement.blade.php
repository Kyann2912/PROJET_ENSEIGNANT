<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des Paiements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9179c9d0f1.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container-fluid">
        <div class="A mt-5 mb-4">
            <h1 class="text-center text-primary">LISTE DES PAIEMENTS</h1>
            <hr>

            <!-- Section de gestion des paiements -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="/paiement" class="btn btn-success">AJOUTER UN PAIEMENT</a>
                <a href="/tableau" class="btn btn-warning">DASHBOARD</a>
            </div>

            <!-- Notifications de session -->
            @if(session('message'))
                <div class="alert alert-success" role="alert">{{ session('message') }}</div>
            @endif
            @if(session('update'))
                <div class="alert alert-info" role="alert">{{ session('update') }}</div>
            @endif
            @if(session('vie'))
                <div class="alert alert-warning" role="alert">{{ session('vie') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
            @endif
            @if(session('reine'))
                <div class="alert alert-info" role="alert">{{ session('reine') }}</div>
            @endif
            @if(session('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif

            <!-- Tableau des paiements -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Numéro</th>
                            <th>Id-Professeur</th>
                            <th>Filière-Niveau</th>
                            <th>Cours</th>
                            <th>Nbre-Heures</th>
                            <th>Montant/Heure</th>
                            <th>Montant-Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $yann = 1; @endphp
                        @foreach ($paiements as $paiement)
                        <tr>
                            <td>{{ $yann }}</td>
                            <td>{{ $paiement->id_professeur }}</td>
                            <td>{{ $paiement->filiere_niveau }}</td>
                            <td>{{ $paiement->cours }}</td>
                            <td>{{ $paiement->nbre_heures }}</td>
                            <td>{{ 10000 }}</td>
                            <td>{{ $paiement->montant_total }}</td>
                            <td>
                                <!-- Mise en page pour les boutons sur la même ligne -->
                                <div class="d-flex justify-content-start gap-2">
                                    <a href="/modifier/paiement/{{ $paiement->id }}" class="btn btn-info btn-sm">MODIFIER</a>
                                    <a href="/supprimer/paiement/{{ $paiement->id }}" class="btn btn-danger btn-sm">SUPPRIMER</a>
                                </div>
                            </td>
                        </tr>
                        @php $yann++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
  <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fc;
    }

    .A {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .A h1 {
        font-family: 'Times New Roman', serif;
        font-size: 28px;
        font-weight: bold;
        color: rgb(4, 238, 234);
        text-align: center;
    }

    .A .btn {
        font-family: 'Arial', sans-serif;
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .A .btn:hover {
        opacity: 0.8;
    }

    .A .btn-success {
        background-color: #28a745;
        border: 1px solid #28a745;
    }

    .A .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .A .btn-warning {
        background-color: #ffc107;
        border: 1px solid #ffc107;
    }

    .A .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
    }

    .A .btn-info {
        background-color: #17a2b8;
        border: 1px solid #17a2b8;
    }

    .A .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
    }

    .A .btn-danger {
        background-color: #dc3545;
        border: 1px solid #dc3545;
    }

    .A .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .table {
        margin-top: 30px;
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 12px 15px;
        text-align: left;
        font-size: 16px;
    }

    .table th {
        background-color: #f8f9fa;
        color: #343a40;
        font-weight: bold;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tbody tr:hover {
        background-color: #e9ecef;
    }

    .table-responsive {
        max-height: 500px;
        overflow-y: auto;
    }

    @media (max-width: 768px) {
        .A {
            padding: 20px;
        }

        .A h1 {
            font-size: 24px;
            text-align: center;
        }

        .table th, .table td {
            font-size: 14px;
        }

        .form-control {
            width: 200px;
        }
    }
  </style>
</html>
