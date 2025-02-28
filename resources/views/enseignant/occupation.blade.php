<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter une Occupation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9179c9d0f1.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="Tout d-flex">
        <!-- Section A -->
        <div class="A">
            <h1>Ajouter une Occupation</h1>
            <form action="{{ route('occupation.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nom_salle" class="form-label">Nom-Salle</label>
                    <input type="text" class="form-control" name="nom_salle" id="nom_salle">
                </div>

                <div class="mb-3">
                    <label for="occupation" class="form-label">Occupation</label>
                    <select class="form-select" name="occupation" id="occupation">
                        <option value="IGL-L1">IGL-L1</option>
                        <option value="IGL-L2">IGL-L2</option>
                        <option value="IGL-L3">IGL-L3</option>
                        <option value="RIT-L1">RIT-L1</option>
                        <option value="RIT-L2">RIT-L2</option>
                        <option value="RIT-L3">RIT-L3</option>
                        <option value="DROIT-L1">DROIT-L1</option>
                        <option value="DROIT-L2">DROIT-L2</option>
                        <option value="DROIT-L3">DROIT-L3</option>
                        <option value="FBA-L1">FBA-L1</option>
                        <option value="FBA-L2">FBA-L2</option>
                        <option value="FBA-L3">FBA-L3</option>
                    </select>

                </div>

                <div class="mb-3">
                    <label for="heure" class="form-label">Heures</label>
                    <select class="form-select" name="heure" id="heure">
                        <option value="08h-10h">08h-10h</option>
                        <option value="08h-12h">08h-12h</option>
                        <option value="13h-15h">13h-15h</option>
                        <option value="15h-17h">15h-17h</option>
                        <option value="08h-12h">08h-12h</option>
                        <option value="13h-17h">13h-17h</option>
                    </select>

                </div>

                <div class="mb-3">
                    <label for="date_occupation" class="form-label">Date</label>
                    <input type="date" class="form-control" name="date_occupation" id="date_occupation">

                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>

        <!-- Section B -->
        <div class="B">

                    @error('date_occupation')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    @error('heure')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    @error('occupation')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    @error('nom_salle')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
            <h2>Information supplémentaire</h2>
            <p>Vous voulez consulter la liste des occupations ajoutées ?</p>
            <a href="/liste-occupations" class="btn btn-outline-info">Consulter</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

  <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
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
    }

    .form-select, .form-control {
        font-size: 16px;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #d1d1d1;
        transition: all 0.3s ease;
    }

    .form-select:focus, .form-control:focus {
        border-color: rgb(4, 238, 234);
        box-shadow: 0 0 5px rgba(4, 238, 234, 0.7);
    }

    .btn-primary {
        background-color: rgb(4, 238, 234);
        border: none;
        padding: 10px 30px;
        font-size: 16px;
        border-radius: 8px;
        width: 100%;
    }

    .btn-primary:hover {
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

    .B h2 {
        font-size: 24px;
        color: rgb(4, 238, 234);
    }

    .B p {
        font-size: 18px;
        font-weight: bold;
    }

    .B .btn-outline-info {
        border: 1px solid rgb(4, 238, 234);
        color: rgb(4, 238, 234);
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 8px;
        transition: background-color 0.3s;
    }

    .B .btn-outline-info:hover {
        background-color: rgb(4, 238, 234);
        color: white;
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
