<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un Emploi du Temps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9179c9d0f1.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="Tout">
        <!-- Section A -->
        <div class="A">
            <h1>Ajouter un Emploi du Temps</h1>
            <form action="{{ route('emploi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="">Email-Professeur</label> <br>
                <input type="text" class="form-control" name="email" id="email"><br>
                <label for="">Image</label> <br>
                <input type="file" class="form-control" name="file_path" id="file_path" placeholder="Choisir une image"><br>
                <label for="">Période-Debut</label> <br>
                <input type="date" class="form-control" name="debut" id="debut"><br>
                <label for="">Période-Fin</label> <br>
                <input type="date" class="form-control" name="fin" id="fin"><br><br>
                <button class="X" type="submit">Ajouter</button>
            </form>
        </div>

        <!-- Section B -->
        <div class="B">
            @error('email')
                <div class="alert alert-danger" role="alert" style="margin:20px;">
                    {{ $message }}
                </div>
            @enderror
            @error('file_path')
                <div class="alert alert-danger" role="alert" style="margin:20px;">
                    {{ $message }}
                </div>
            @enderror
            @error('debut')
                <div class="alert alert-danger" role="alert" style="margin:20px;">
                    {{ $message }}
                </div>
            @enderror
            @error('fin')
                <div class="alert alert-danger" role="alert" style="margin:20px;">
                    {{ $message }}
                </div>
            @enderror

            <p>Vous voulez consulter la liste des emplois du temps ajoutés ?</p>
            <a href="/liste-emplois" class="btn btn-info">Consulter</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

  <style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
    }

    .Tout {
        display: flex;
        justify-content: space-between;
        padding: 40px;
    }

    .A {
        width: 45%;
        background-color: aliceblue;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .A h1 {
        font-family: 'Times New Roman', serif;
        font-weight: bold;
        color: rgb(4, 238, 234);
        font-size:35px;
    }

    .A label {
        font-family: 'Times New Roman', serif;
        font-size: 18px;
        margin-bottom: 5px;
    }

    .A input, .A select {
        width: 100%;
        margin-bottom: 15px;
        padding: 10px;
        font-size: 16px;
        border-radius: 8px;
        border: 1px solid #ccc;
        transition: border-color 0.3s ease;
    }

    .A input:focus, .A select:focus {
        border-color: rgb(4, 238, 234);
        box-shadow: 0 0 5px rgba(4, 238, 234, 0.7);
    }

    .X {
        width: 100%;
        padding: 12px;
        background-color: rgb(4, 238, 234);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
    }

    .X:hover {
        background-color: #36e1d3;
    }

    .B {
        width: 45%;
        background-color: blanchedalmond;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .B p {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .B .btn-info {
        background-color: rgb(4, 238, 234);
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 8px;
        border: none;
        transition: background-color 0.3s;
    }

    .B .btn-info:hover {
        background-color: #36e1d3;
    }

    @media (max-width: 768px) {
        .Tout {
            flex-direction: column;
            padding: 20px;
        }

        .A, .B {
            width: 100%;
            margin-bottom: 20px;
        }
    }
  </style>
</html>
