<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Audit des Activités sur la Plateforme</title>
    
    <!-- Styles CSS -->
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f7fa; /* Couleur de fond moderne */
        animation: fadeIn 2s ease-out; /* Animation de fondu du body */
      }

      @keyframes fadeIn {
        0% {
          opacity: 0;
        }
        100% {
          opacity: 1;
        }
      }

      .container {
        padding: 20px;
      }

      h1 {
        text-align: center;
        font-weight: 700;
        font-size: 32px;
        color: #2c3e50; /* Couleur de texte */
        margin-top: 40px;
        opacity: 0;
        animation: fadeIn 1s ease-out 0.5s forwards; /* Animation de fondu pour le titre */
      }

      hr {
        width: 90%;
        margin: 0 auto;
        border: 1px solid #ddd;
      }

      .table-container {
        margin: 30px auto;
        width: 90%;
        overflow-x: auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        opacity: 0;
        animation: slideUp 1s ease-out 1s forwards; /* Animation de glissement pour la table */
      }

      @keyframes slideUp {
        0% {
          transform: translateY(20px);
          opacity: 0;
        }
        100% {
          transform: translateY(0);
          opacity: 1;
        }
      }

      table {
        width: 100%;
        border-collapse: collapse;
        transition: transform 0.3s ease; /* Transition pour la table */
      }

      th, td {
        border: 1px solid #ddd;
        padding: 15px;
        text-align: left;
        font-size: 16px;
        color: #34495e;
        transition: background-color 0.3s ease, transform 0.3s ease; /* Animation pour les cellules */
      }

      th {
        background-color: #ecf0f1;
        font-weight: 600;
      }

      tr:nth-child(even) {
        background-color: #f9f9f9;
      }

      /* Animation de survol des lignes de tableau */
      tr:hover {
        background-color: #3498db; /* Couleur bleue lorsque la ligne est survolée */
        color: white; /* Texte blanc sur la ligne survolée */
        transform: scale(1.02); /* Légère animation de zoom */
        transition: background-color 0.3s ease, transform 0.3s ease;
      }

      .yann a {
        margin-left: 20px;
        transition: transform 0.3s ease; /* Animation des boutons */
      }

      .yann a:hover {
        transform: translateY(-5px); /* Légère animation de montée au survol des boutons */
      }

      .btn {
        font-weight: 600;
        border-radius: 5px;
        padding: 10px 20px;
        transition: all 0.3s ease;
      }

      .btn-danger {
        background-color: #e74c3c;
        color: white;
        border: none;
      }

      .btn-danger:hover {
        background-color: #c0392b;
        transform: scale(1.05); /* Légère animation de zoom au survol du bouton */
      }

      .btn-dark {
        background-color: #2c3e50;
        color: white;
        border: none;
      }

      .btn-dark:hover {
        background-color: #34495e;
        transform: scale(1.05); /* Légère animation de zoom au survol du bouton */
      }

      .footer {
        text-align: center;
        margin-top: 40px;
        font-size: 16px;
        color: #7f8c8d;
      }
    </style>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9179c9d0f1.js" crossorigin="anonymous"></script>
  </head>
  <body>

    <!-- Contenu principal -->
    <div class="container">
        <header class="A">
            <h1>AUDIT DES ACTIVITES SUR LA PLATEFORME</h1>
            <hr>
        </header>

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
                        <td>{{ $utilisateur_ajouter }}</td>
                        <td>{{ $utilisateur }}</td>
                        <td>{{ $uti_modifier }}</td>
                        <td>{{ $uti_supprimer }}</td>
                    </tr>
                    <tr>
                        <td>Gestion des Occupations</td>
                        <td>{{ $occupation_ajouter }}</td>
                        <td>{{ $salle }}</td>
                        <td>{{ $occupation_modifier }}</td>
                        <td>{{ $occupation_supprimer }}</td>
                    </tr>
                    <tr>
                        <td>Gestion des Filières</td>
                        <td>{{ $filiere_ajouter }}</td>
                        <td>{{ $filiere }}</td>
                        <td>{{ $filiere_modifier }}</td>
                        <td>{{ $filiere_supprimer }}</td>
                    </tr>
                    <tr>
                        <td>Gestion des Paiements</td>
                        <td>{{ $paiement_ajouter }}</td>
                        <td>{{ $paiement }}</td>
                        <td>{{ $paiement_modifier }}</td>
                        <td>{{ $paiement_supprimer }}</td>
                    </tr>
                    <tr>
                        <td>Gestion des Emplois du Temps</td>
                        <td>{{ $emploi_ajouter }}</td>
                        <td>{{ $emploi }}</td>
                        <td>{{ $emploi_modifier }}</td>
                        <td>{{ $emploi_supprimer }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Liens supplémentaires -->
        <div class="yann text-center">
            <a href="/rapport" class="btn btn-danger">TÉLÉCHARGER LE RAPPORT</a>
            <a href="/tableau" class="btn btn-dark">TABLEAU DE BORD</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>
