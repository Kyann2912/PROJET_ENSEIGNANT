<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tableau de Bord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9179c9d0f1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background-color: #f4f6f9;
      }

      .container {
        display: flex;
        flex-wrap: wrap;
        height: 100vh;
      }

      .sidebar {
        background-color: #2c3e50;
        color: white;
        width: 250px;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        position: fixed;
        height: 100%;
        top: 0;
        left: 0;
      }

      .sidebar h1 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #ecf0f1;
      }

      .sidebar a {
        display: block;
        color: #ecf0f1;
        text-decoration: none;
        padding: 12px 20px;
        margin-bottom: 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
      }

      .sidebar a:hover {
        background-color: #34495e;
      }

      .content {
        margin-left: 250px;
        flex: 1;
        padding: 30px;
        overflow-y: auto;
      }

      .header {
        margin-bottom: 30px;
      }

      .header h1 {
        font-size: 28px;
        color: #2c3e50;
      }

      .header .user-info {
        font-size: 18px;
        color: #7f8c8d;
      }

      .stats {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 30px;
      }

      .stat-box {
        background-color: #fff;
        padding: 20px;
        width: 18%;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
      }

      .stat-box h2 {
        font-size: 36px;
        color: #2c3e50;
        margin-bottom: 10px;
      }

      .stat-box p {
        font-size: 18px;
        color: #7f8c8d;
      }

      .charts {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .chart-container {
        width: 48%;
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
      }

      .logout {
        margin-top: 30px;
        text-align: right;
        height: 5px;
      }

      .logout a {
        background-color: #e74c3c;
        color: white;
        padding: 15px 30px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s, transform 0.3s;
        position: absolute;
        top: 20px;
        right: 20px;
      }

      .logout a:hover {
        background-color: #c0392b;
        transform: scale(1.05);
      }

      @media (max-width: 992px) {
        .stat-box {
          width: 48%;
        }

        .chart-container {
          width: 100%;
        }

        .charts {
          flex-direction: column;
        }
      }

      @media (max-width: 768px) {
        .sidebar {
          width: 200px;
        }

        .stat-box {
          width: 100%;
        }

        .charts {
          flex-direction: column;
        }
      }

      .content{
        /* position:fixed; */
      }

    </style>
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <div class="sidebar">
        <h1>Tableau de Bord</h1>
        <p class="user-info">
            <i class="fas fa-user" style="margin-right: 10px;"></i>
            {{ $nom }} {{ $prenoms }}
        </p>
        <a href="/liste-utilisateurs"><i class="fas fa-users"></i> Gestion des Utilisateurs</a>
        <a href="/liste-occupations"><i class="fas fa-clipboard-list"></i> Gestion des Occupations</a>
        <a href="/liste-paiements"><i class="fas fa-credit-card"></i> Gestion des Paiements</a>
        <a href="/liste-filieres"><i class="fas fa-sitemap"></i> Gestion des Filières</a>
        <a href="/liste-emplois"><i class="fas fa-calendar-alt"></i> Gestion des Emplois du Temps</a>
        <a href="/audit"><i class="fas fa-cogs"></i> Audit des Opérations</a>
      </div>

      <!-- Content -->
      <div class="content">
        <div class="header">
          <h1>Bienvenue sur le tableau de bord</h1>
        </div>

        <div class="stats">
          <div class="stat-box">
            <h2>{{ $utilisateur }}</h2>
            <p>Utilisateurs</p>
          </div>
          <div class="stat-box">
            <h2>{{ $salle }}</h2>
            <p>Occupations</p>
          </div>
          <div class="stat-box">
            <h2>{{ $paiement }}</h2>
            <p>Paiements</p>
          </div>
          <div class="stat-box">
            <h2>{{ $filiere }}</h2>
            <p>Filières</p>
          </div>
          <div class="stat-box">
            <h2>{{ $emploi }}</h2>
            <p>Emplois du Temps</p>
          </div>
        </div>

        <div class="charts">
          <div class="chart-container">
            <h3>Répartition des Données</h3>
            <canvas id="myPieChart"></canvas>
          </div>
          <div class="chart-container">
            <h3>Évolution des Données</h3>
            <canvas id="myLineChart"></canvas>
          </div>
        </div>

        <div class="logout">
                <a href="/deconnexion/utilisateur">
                    <i class="fas fa-sign-out-alt" style="font-size: 20px;"></i> DECONNEXION
                </a>
        </div>
      </div>
    </div>

    <script>
      // Données partagées
      const labels = @json($data['labels']);
      const values = @json($data['values']);

      // Diagramme circulaire
      const pieCtx = document.getElementById('myPieChart').getContext('2d');
      new Chart(pieCtx, {
        type: 'pie',
        data: {
          labels: labels,
          datasets: [{
            data: values,
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', 'black']
          }]
        }
      });

      // Diagramme de courbe
      const lineCtx = document.getElementById('myLineChart').getContext('2d');
      new Chart(lineCtx, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: 'Données',
            data: values,
            borderColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', 'black'],
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', 'black'],
            fill: true,
            tension: 0.4
          }]
        },
        options: {
          scales: {
            x: {
              title: {
                display: true,
                text: 'Catégories'
              }
            },
            y: {
              title: {
                display: true,
                text: 'Valeurs'
              },
              beginAtZero: true
            }
          }
        }
      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
