<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF</title>

    <!-- Styles CSS -->
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
        <h1 style="color:blue;">AUDIT DES ACTIVITÉS SUR LA PLATEFORME</h1>
        <hr>
      </header>
      <br>

      <!-- Tableau des Activités -->
      <div class="table-container">
      <table class="table">
                <thead>
                    <tr>
                        <th>Fonctionnalités</th>
                        <th>Ajouter</th>
                        <th>Enregistrements Actifs</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Gestion des Utilisateurs</td>
                        <td></td>
                        <td>{{ $utilisateur }}</td>
                        <td>{{ $uti_modifier }}</td>
                        <td>{{ $uti_supprimer }}</td>
                    </tr>
                    <tr>
                        <td>Gestion des Occupations</td>
                        <td></td>
                        <td>{{ $salle }}</td>
                        <td>{{ $occupation_modifier }}</td>
                        <td>{{ $occupation_supprimer }}</td>
                    </tr>
                    <tr>
                        <td>Gestion des Filières</td>
                        <td></td>
                        <td>{{ $filiere }}</td>
                        <td>{{ $filiere_modifier }}</td>
                        <td>{{ $filiere_supprimer }}</td>
                    </tr>
                    <tr>
                        <td>Gestion des Paiements</td>
                        <td></td>
                        <td>{{ $paiement }}</td>
                        <td>{{ $paiement_modifier }}</td>
                        <td>{{ $paiement_supprimer }}</td>
                    </tr>
                    <tr>
                        <td>Gestion des Emplois du Temps</td>
                        <td></td>
                        <td>{{ $emploi }}</td>
                        <td>{{ $emploi_modifier }}</td>
                        <td>{{ $emploi_supprimer }}</td>
                    </tr>
                </tbody>
            </table>
      </div>
    </div>

    <!-- Pied de page -->
    <div class="footer">
      <hr>
      <p>Généré le <strong>{{ $date }}</strong></p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>
