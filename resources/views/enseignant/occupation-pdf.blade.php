<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Occupations des Salles </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9179c9d0f1.js" crossorigin="anonymous"></script>
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: 'Times New Roman', Times, serif;
        font-size: 14px;
      }

      h1 {
        text-align: center;
        font-weight: bold;
        margin-top: 10px;
        font-size: 20px;
      }

      hr {
        width: 80%;
        margin: 5px auto;
        border: 1px solid #000;
      }

      .table-container {
        margin: 10px auto;
        width: 95%;
        overflow-x: auto;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
        background-color: white;
      }

      th, td {
        border: 1px solid #ddd;
        padding: 6px;
        text-align: left;
      }

      th {
        background-color: #f2f2f2;
      }

      .footer {
        position: fixed;
        bottom: 20px; /* Positionnement depuis le bas */
        width: 100%;
        text-align: center;
        font-size: 12px;
      }

      .footer hr {
        margin: 0 auto 5px auto;
        width: 80%;
        border: 1px solid #000;
      }

      /* Style pour l'impression */
      @media print {
        body {
          zoom: 90%; /* Ajustez le zoom si nécessaire pour tout inclure */
        }
      }
    </style>
  </head>
  <body>
  <img src="font/F.jpeg" alt="" width="120px" height="80px">
    <br>
    <br>
    <div class="header">
      <h1 style="color:blue;">OCCCUPATION DES SALLES </h1>
      <hr>
      <br>
    </div>

    <!-- Tableau -->
    <div class="Tout">
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nom-Salle</th>
            <th>Occupation</th>
            <th>Date</th>
            <th>Heures</th>
          </tr>
        </thead>
        <tbody>
          @php
              $yann = 1;
          @endphp
          @foreach($occupations as $occupation)
          <tr>
            <td>{{ $yann }}</td>
            <td>{{ $occupation->nom_salle }}</td>
            <td>{{ $occupation->occupation }}</td>
            <td>{{ $occupation->date_occupation }}</td>
            <td>{{ $occupation->heure }}</td>
          </tr>
          @php
              $yann++;
          @endphp
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Pied de page -->
    <div class="footer">
      <hr>
      <p>Généré le <strong>{{ $date }}</strong></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
