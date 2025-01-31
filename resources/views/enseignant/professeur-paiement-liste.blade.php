<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MES PAIEMENTS</title>

    <!-- Styles CSS -->
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: 'Times New Roman', Times, serif;
        font-size: 14px;
      }
      h5{
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
        font-weight: bold;
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
        bottom: 20px;
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
          zoom: 90%;
        }
      }
    </style>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9179c9d0f1.js" crossorigin="anonymous"></script>
  </head>
  <body>

    <!-- Logo -->
    <img src="font/F.jpeg" alt="" width="120px" height="80px">
    <br>
    <br>

    <div class="container">
      <header class="A">
        <h1 style="color:blue;">MES PAIEMENTS</h1>
        <hr>
      </header>
      <br>

      <!-- Tableau des Activités -->
      <div class="table-container">
        <table class="table">
          <thead>
            <tr>
              <th>Numéro</th>
              <th>Filière-Niveau</th>
              <th>Cours</th>
              <th>Nbre-Heures</th>
              <th>Montant/Heures</th>
              <th>Montant/Total</th>
            </tr>
          </thead>
          @php
            $yann = 1;
            $totalMontant = 0; // Initialisation de la variable pour le total des montants
          @endphp
          <tbody>
            @foreach ($paiements as $paiement)
            <tr>
              <td>{{ $yann }}</td>
              <td>{{ $paiement->filiere_niveau }}</td>
              <td>{{ $paiement->cours }}</td>
              <td>{{ $paiement->nbre_heures }}</td>
              <td>{{ 10000 }}</td>
              <td>{{ $paiement->montant_total }}</td>

              @php
                $totalMontant += $paiement->montant_total; // Ajout du montant total pour chaque ligne
                $yann++;
              @endphp
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Tableau du total -->
      <div class="table-container">
        <table class="table">
          <thead>
            <tr>
              <th>Total</th>
              <th>Montant Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Montant Total des Paiements</td>
              <td style="color:red";><strong>{{ $totalMontant }} F.CFA</strong></td> <!-- Affichage du total des montants -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div>
      <h5 style="margin-left:590px;margin-top:520px;">Comptabilité</h5>
    </div>

    <!-- Pied de page -->
    <div class="footer">
      <hr>
      <p>Téléchargé le <strong>{{ $date }}</strong></p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>
