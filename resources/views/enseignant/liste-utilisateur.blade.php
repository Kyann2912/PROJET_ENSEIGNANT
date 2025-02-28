<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des Utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9179c9d0f1.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container-fluid">
        <!-- Section principale -->
        <div class="A mt-5 mb-4">
            <h1 class="text-center text-primary">LISTE DES UTILISATEURS</h1>
            <hr>

            <!-- Formulaire d'ajout / recherche -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="/inscription" class="btn btn-success">AJOUTER UN UTILISATEUR</a>

                <!-- Barre de recherche -->
                <div class="d-flex align-items-center">
                    <input type="search" class="form-control me-2" placeholder="Rechercher par email" style="max-width: 300px;">
                    <button class="btn btn-primary">RECHERCHER</button>
                </div>

                <!-- Lien vers le dashboard -->
                <a href="/tableau" class="btn btn-warning">DASHBOARD</a>
            </div>

            <!-- Affichage des messages de session -->
            @if(session('reponse'))
                <div class="alert alert-success" role="alert">{{ session('reponse') }}</div>
            @endif
            @if(session('bibi'))
                <div class="alert alert-success" role="alert">{{ session('bibi') }}</div>
            @endif
            @if(session('yanno'))
                <div class="alert alert-success" role="alert">{{ session('yanno') }}</div>
            @endif
            @if(session('reine'))
                <div class="alert alert-success" role="alert">{{ session('reine') }}</div>
            @endif
            @if(session('sms'))
                <div class="alert alert-success" role="alert">{{ session('sms') }}</div>
            @endif

            <!-- Tableau des utilisateurs -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Numéro</th>
                            <th>Nom</th>
                            <th>Prenoms</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $yann = 1; @endphp
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $yann }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->prenoms }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="/modifier/utilisateur/{{ $user->id }}" class="btn btn-info btn-sm">MODIFIER</a>
                                <a href="/supprimer/utilisateur/{{ $user->id }}" class="btn btn-danger btn-sm">SUPPRIMER</a>
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
        background-color: #f4f7fc;
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

    .A .btn-primary {
        background-color: #007bff;
        border: 1px solid #007bff;
    }

    .A .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .A .btn-warning {
        background-color: #ffc107;
        border: 1px solid #ffc107;
    }

    .A .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
    }

    .table {
        margin-top: 30px;
        border-collapse: collapse;
        width: 100%;
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

    .form-control {
        width: 300px;
        margin-right: 10px;
    }

    @media (max-width: 768px) {
        .A {
            padding: 20px;
        }

        .A h1 {
            font-size: 24px;
            text-align: center;
        }

        .table {
            margin-top: 20px;
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
