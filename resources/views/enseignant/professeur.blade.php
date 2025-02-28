<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tableau de Bord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9179c9d0f1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body>
    <div class="container-fluid">
        <!-- Sidebar -->
        <div class="sidebar">
            <h1>Tableau de Bord</h1> <br>
            
            <!-- User Icon and Name -->
            <div class="user-info">
                <i class="fas fa-user" style="font-size: 20px; margin-right: 10px;"></i>
                <p class="nom" style="margin-top:20px;">{{ $nom }} {{ $prenoms }}</p>
            </div>
            <br><br>

            <!-- Links with icons -->
            <div class="sidebar-links">
                <a href="/professeur-emploi">
                    <i class="fas fa-calendar-alt" style="font-size: 20px;"></i> EMPLOI DU TEMPS
                </a>
                <br><br>
                <a href="{{ route('professeur.paiements') }}">
                    <i class="fas fa-credit-card" style="font-size: 20px;"></i> MES PAIEMENTS
                </a>
                <br><br>
                <a href="/professeur/password">
                    <i class="fas fa-key" style="font-size: 20px;"></i> MODIFIER MON MOT DE PASSE
                </a>
                <br><br>
            </div>

            <!-- Deconnexion Button -->
        </div>

        <!-- Main Content -->
        <div class="content" id="content">
            <div class="header">
                <h1>Bienvenue sur le tableau de bord</h1>
            </div>
            <div class="logout">
                <a href="/deconnexion/utilisateur">
                    <i class="fas fa-sign-out-alt" style="font-size: 20px;"></i> DECONNEXION
                </a>
            </div>
            <br>

            <div class="stats">
                <div class="stat-box">
                    <p>PAIEMENTS</p>
                    <h1 class="user-count" style="color:green">{{ $nbrePaiements }}</h1>
                </div>
                <div class="stat-box">
                    <p>EMPLOI DU TEMPS</p>
                    <h1 class="user-count" style="color:green">{{ $nbre }}</h1>
                </div>
            </div>

            <div class="charts">
                <div class="chart-container">
                    <h3>Répartition des Données</h3>
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialisation de l'animation d'entrée pour le contenu principal
        window.onload = function() {
            document.getElementById('content').style.opacity = 1;
        };

        // Animation des cartes de statistiques
        const stats = document.querySelectorAll('.stat-box');
        window.addEventListener('scroll', function() {
            stats.forEach(function(stat) {
                const position = stat.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (position < windowHeight - 100) {
                    stat.style.opacity = 1;
                    stat.style.transform = 'translateY(0)';
                }
            });
        });

        // Animation des graphiques
        const charts = document.querySelectorAll('.chart-container');
        window.addEventListener('scroll', function() {
            charts.forEach(function(chart) {
                const position = chart.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (position < windowHeight - 100) {
                    chart.style.opacity = 1;
                    chart.style.transform = 'translateY(0)';
                }
            });
        });

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
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

  <style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
    }

    .container-fluid {
        display: flex;
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
        color: #ecf0f1;
    }

    .user-info {
        display: flex;
        align-items: center;
        margin-top: 10px;
    }

    .user-info i {
        font-size: 20px;
        color: #ecf0f1;
    }

    .nom {
        font-size: 18px;
        color: #ecf0f1;
        font-weight: bold;
    }

    .sidebar-links a {
        display: block;
        color: #ecf0f1;
        text-decoration: none;
        padding: 12px 20px;
        margin-bottom: 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
        font-size: 18px;
    }

    .sidebar-links a:hover {
        background-color: #34495e;
    }

    .content {
        margin-left: 250px;
        flex: 1;
        padding: 30px;
        overflow-y: auto;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .header {
        margin-bottom: 30px;
    }

    .header h1 {
        font-size: 28px;
        color: #2c3e50;
    }

    .stats {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .stat-box {
        background-color: #fff;
        padding: 20px;
        width: 48%;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .stat-box p {
        font-size: 18px;
        color: #7f8c8d;
    }

    .stat-box h1 {
        font-size: 36px;
        color: #2c3e50;
    }

    .charts {
        display: flex;
        justify-content: space-between;
    }

    .chart-container {
        width: 48%;
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }

    /* Modification pour le bouton de déconnexion */
    .logout {
        margin-top: -70px;
        clear: both;
        text-align: right;
    }

    .logout a {
        display: inline-block;
        background-color: #e74c3c;
        color: white;
        padding: 15px 30px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .logout a:hover {
        background-color: #c0392b;
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
    .logout a:hover {
        background-color: #c0392b;
        transform: scale(1.05);
      }
  </style>
</html>
