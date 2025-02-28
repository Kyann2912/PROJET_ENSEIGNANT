<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Emploi du temps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9179c9d0f1.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="Tout">
        <!-- En-tête de la page -->
        <div class="A">
            <br>
            <h1>LISTE DES EMPLOIS DU TEMPS</h1>
            <hr>
            <div class="ensemble">
                <!-- Boutons Ajouter et Dashboard -->
                <a href="/emploi-temps" class="btn btn-success btn-custom">AJOUTER UN EMPLOI-TEMPS</a>
                <a href="/tableau" class="btn btn-primary btn-custom" style="width: 150px;">DASHBOARD</a>
            </div>
        </div>
        <br>

        <!-- Alertes success -->
        @if(session('yao'))
            <div class="alert alert-success" role="alert" style="margin:20px;">
                {{ session('yao') }}
            </div>
        @endif
        @if(session('yann'))
            <div class="alert alert-success" role="alert" style="margin:20px;">
                {{ session('yann') }}
            </div>
        @endif
        @if(session('sms'))
            <div class="alert alert-success" role="alert" style="margin:20px;">
                {{ session('sms') }}
            </div>
        @endif
        @if(session('franck'))
            <div class="alert alert-success" role="alert" style="margin:20px;">
                {{ session('franck') }}
            </div>
        @endif
        @if(session('reine'))
            <div class="alert alert-success" role="alert" style="margin:20px;">
                {{ session('reine') }}
            </div>
        @endif

        <!-- Table des emplois -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Email-Professeur</th>
                    <th>Période-Debut</th>
                    <th>Période-Fin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $yann = 1;
                @endphp
                @foreach($emplois as $emploi)
                    <tr>
                        <td>{{ $yann }}</td>
                        <td>{{ $emploi->email }}</td>
                        <td>{{ $emploi->debut }}</td>
                        <td>{{ $emploi->fin }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="/modifier/emploi/{{ $emploi->id }}" class="btn btn-info btn-custom">MODIFIER</a>
                                <a href="/supprimer/emploi/{{ $emploi->id }}" class="btn btn-danger btn-custom">SUPPRIMER</a>
                            </div>
                        </td>
                    </tr>
                    @php
                        $yann++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

  <style>
    body {
        margin: 0px;
        padding: 0px;
        background-color: #f4f4f9;
        font-family: 'Times New Roman', Times, serif;
    }

    .Tout {
        margin: 20px;
        padding: 20px;
    }

    .A h1 {
        font-family: 'Times New Roman', Times, serif;
        font-weight: bold;
        font-size: 32px;
        margin-bottom: 20px;
        text-align: center;
    }

    .ensemble {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
    }

    .btn-custom {
        font-size: 18px;
        padding: 10px 20px;
        border-radius: 5px;
        margin-left: 10px;
    }

    .btn-success {
        background-color: rgb(4, 238, 234);
        border-color: rgb(4, 238, 234);
        color: black;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
        color: white;
    }

    .btn-danger {
        background-color: rgb(238, 4, 4);
        border-color: rgb(238, 4, 4);
        color: white;
    }

    .table {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .table th, .table td {
        text-align: center;
        padding: 12px;
        font-size: 16px;
        color: #333;
    }

    .table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .d-flex .btn {
        width: 120px;
        font-size: 16px;
    }

    .alert {
        margin-top: 20px;
        margin-bottom: 20px;
        font-size: 16px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .ensemble {
            flex-direction: column;
            align-items: center;
        }

        .btn-custom {
            width: 100%;
            margin-bottom: 10px;
        }

        .table th, .table td {
            font-size: 14px;
        }
    }

  </style>
</html>
