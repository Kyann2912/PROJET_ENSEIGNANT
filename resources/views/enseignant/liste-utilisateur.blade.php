<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9179c9d0f1.js" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="Tout">
        <div class="A">
            <br>
            <h1>LISTE DES UTILISATEURS</h1>
            <hr>
            <div class="ensemble">
                <a href="/inscription" class="btn btn-success">AJOUTER UN UTILISATEUR</a>
                <input type="search" class="form-control " placeholder="kyann372@gmail.com">
                <a href="" class="btn btn-success" style="width: 150px;margin-left: 60px; height: 40px;">RECHERCHER</a>
                <a href="/tableau" class="btn btn-success" style="width: 150px;margin-left: 90px; height: 40px;">DASHBOARD</a>
            </div>

        </div>
        <br>
        <table class="table">
        @if(session('reponse'))
            <div class="alert alert-success" role="alert" style="margin:20px;">
                {{ session('reponse') }}
            </div>
        @endif
        @if(session('bibi'))
            <div class="alert alert-success" role="alert" style="margin:20px;">
                {{ session('bibi') }}
            </div>
        @endif
        @if(session('yanno'))
            <div class="alert alert-success" role="alert" style="margin:20px;">
                {{ session('yanno') }}
            </div>
        @endif
        @if(session('reine'))
            <div class="alert alert-success" role="alert" style="margin:20px;">
                {{ session('reine') }}
            </div>
        @endif
        @if(session('sms'))
            <div class="alert alert-success" role="alert" style="margin:20px;">
                {{ session('sms') }}
            </div>
        @endif
            <thead>
                @php
                    $yann = 1;
                @endphp
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
                @foreach($users as $user)
                 <tr>
                  <td>{{ $yann }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->prenoms }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->role }}</td>
                  <td><a href="/modifier/utilisateur/{{ $user->id }}" class="btn btn-info">MODIFIER</a> <a href="/supprimer/utilisateur/{{ $user->id }}" class="btn btn-danger">SUPPRIMER</a></td>
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
    body{
        margin: 0px;
        padding: 0px;
        background-color: blanchedalmond;
        font-family:  Times, serif;


    }
    .ensemble{
        display: flex;
    }
    .table th{
        background-color: blanchedalmond;

    }
    .table{
        color: white;
        margin-left: 10px;
        position: fixed;

    }
    .table td{
        background-color: blanchedalmond;
        font-size: 18px;

    }

    .A h1{
        margin-bottom: 20px;
        margin-left: 500px;
        font-family:  Times, serif;
        font-weight: bold;
        font-size: 20px;
        margin-bottom: 10px;

    }
    .A a{
        text-decoration: none;
        width: 300px;
        height: 40px;
        border: 1px solid;
        padding: 5px;
        border-radius: 3px;
        border-color: rgb(4, 238, 234);
        color: black;
        margin-left: 10px;
        font-family:  Times, serif;
        font-size: 20px;
        background-color: white;
    }
    .form-control{
        width: 300px;
        margin-left: 60px;
        margin-bottom: 0px;
        height: 40px;

    }


    </style>
</html>