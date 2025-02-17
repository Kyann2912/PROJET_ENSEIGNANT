<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mot de Passe Oublié</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9179c9d0f1.js" crossorigin="anonymous"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: aliceblue;
            margin: 0;
        }
        .container-custom {
            display: flex;
            max-width: 800px;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .left-panel {
            background-color: blanchedalmond;
            padding: 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
        .right-panel {
            background-color: white;
            padding: 40px;
            flex: 1;
        }
        .btn-custom {
            background-color: rgb(4, 238, 234);
            color: white;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            font-size: 18px;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: blanchedalmond;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container-custom">
        <div class="left-panel">
            <h1 class="fw-bold">Mot de Passe Oublié ?</h1>
            <p>Pas de panique ! Entrez votre email pour récupérer un nouveau mot de passe.</p>
        </div>
        <div class="right-panel">
            <h2 class="text-center fw-bold">Récupération</h2>
            @if(session('message'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('message') }}
            </div>
            @endif
            <form action="/ajouter/password" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <button type="submit" class="btn btn-custom">Envoyer</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
