<?php
ob_start();

$connect = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connect, "cardiot");
mysqli_set_charset($connect, "utf8");



$query5 = "SELECT Count(*) AS count FROM messages";
$query_run5 = mysqli_query($connect, $query5);


if (isset($_POST['Logout'])) {
    header("location:Login.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Favicons -->
    <link href="assets/img/logoc.svg" rel="icon">

    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/Mycss.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Template Main CSS File -->
</head>

<body>
    <!-- Banner -->

    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
            <div class="container-fluid">
                <!-- Toggler -->
                <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#" style="background-color: #FFFFFF;">
                    <img src="assets/img/doctor-files-medical-svgrepo-com.svg" alt="..." style="width: 200px; height: 100px;">
                </a>
                <!-- User menu (mobile) -->
                <div class="navbar-user d-lg-none">
                    <!-- Dropdown -->
                    <div class="dropdown">
                        <!-- Toggle -->
                        <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar-parent-child">
                                <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle">
                                <span class="avatar-child avatar-badge bg-success"></span>
                            </div>
                        </a>
                        <!-- Menu -->
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                            <a href="#" class="dropdown-item">Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Billing</a>
                            <hr class="dropdown-divider">
                            <form method="GET">
                                <button class="button is-danger" name="logout">Logout</button>
                            </form>
                            <?php

                            if (isset($_GET['logout'])) {
                                session_destroy();
                                header('location: home.php');
                            } ?>
                        </div>
                    </div>
                </div>
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="Dashboard.php">
                                <i class="bi bi-house"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="rendezvous.php">
                                <i class="bi bi-bar-chart"></i> Rendez-vous

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Messages.php">
                                <i class="bi bi-chat"></i> Messages
                                <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto">
                                    <?php if ($query_run5 && mysqli_num_rows($query_run5) > 0) {
                                        $row = mysqli_fetch_assoc($query_run5);
                                        $count = $row["count"];
                                        echo $count;
                                    }
                                    ?> </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Actualite.php">
                                <i class="bi bi-bookmarks"></i> Actualité
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Patients.php">
                                <i class="bi bi-people"></i> Patients
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Medicaments.php">
                                <i class="bi bi-capsule"></i> Médicaments
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="navbar-divider my-5 opacity-20">
                    <!-- Navigation -->

                    <!-- Push content down -->
                    <div class="mt-auto"></div>
                    <!-- User (md) -->
                    <ul class="navbar-nav">
                        <form method="POST">
                            <li class="nav-item">
                                <button type="submit" name="Logout" class="btn btn-form-control nav-link">
                                    <i class="bi bi-box-arrow-left"></i> Logout
                                </button>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <?php
                    function countRdvByMonth()
                    {
                        $connect = mysqli_connect("localhost", "root", "");
                        $db = mysqli_select_db($connect, "cardiot");
                        mysqli_set_charset($connect, "utf8");

                        $query = "SELECT COUNT(*) as nbr, DATE_FORMAT(Date_rdv, '%Y-%m') as mois
              FROM rdv
              GROUP BY mois";

                        $result = mysqli_query($connect, $query);

                        if ($result) {
                            // Tableaux pour stocker les résultats
                            $months = array();
                            $counts = array();

                            // Parcourir les lignes de résultat
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Ajouter chaque mois et nombre au tableau correspondant
                                $months[] = $row['mois'];
                                $counts[] = $row['nbr'];
                            }

                            // Retourner les tableaux des résultats
                            return array(
                                'months' => $months,
                                'counts' => $counts
                            );
                        } else {
                            // En cas d'erreur, afficher un message d'erreur ou retourner false
                            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($connect);
                            // return false;
                        }

                        // Fermer la connexion
                        mysqli_close($connect);
                    }
                    ?>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <div>
                        <canvas id="myChart"></canvas>
                    </div>

                    <script>
                        // Appel de la fonction
                        var results = <?php echo json_encode(countRdvByMonth()); ?>;

                        // Récupérer les données des résultats
                        var months = results.months;
                        var counts = results.counts;

                        // Créer le contexte du graphique
                        var ctx = document.getElementById('myChart').getContext('2d');

                        // Dessiner le graphique
                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: months,
                                datasets: [{
                                    label: 'Nombre de RDV',
                                    data: counts,
                                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        precision: 0,
                                        stepSize: 1
                                    }
                                }
                            }
                        });
                    </script>
                </div>



            </header>
            <!-- Main -->

            <h1 class='text-center'> Nombre de rendez vous par mois </h1><br>
            <div class="h-screen flex-grow-1 overflow-y-lg-auto">
                <!-- Header -->
                <header class="bg-surface-primary border-bottom pt-6">

                    <?php
                    function ccountRdvByMonth()
                    {
                        $connect = mysqli_connect("localhost", "root", "");
                        $db = mysqli_select_db($connect, "cardiot");
                        mysqli_set_charset($connect, "utf8");

                        $query = "SELECT COUNT(*) as nbr, statut
              FROM rdv
              GROUP BY statut";

                        $result = mysqli_query($connect, $query);

                        if ($result) {
                            // Tableaux pour stocker les résultats
                            $statuses = array();
                            $counts = array();

                            // Parcourir les lignes de résultat
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Ajouter chaque statut et nombre au tableau correspondant
                                $statuses[] = $row['statut'];
                                $counts[] = $row['nbr'];
                            }

                            // Retourner les tableaux des résultats
                            return array(
                                'statuses' => $statuses,
                                'counts' => $counts
                            );
                        } else {
                            // En cas d'erreur, afficher un message d'erreur ou retourner false
                            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($connect);
                            // return false;
                        }

                        // Fermer la connexion
                        mysqli_close($connect);
                    }
                    ?>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


                    <canvas id="Chart" style="width: 500px;"></canvas>


                    <script>
                        // Appel de la fonction
                        var results = <?php echo json_encode(ccountRdvByMonth()); ?>;

                        // Récupérer les données des résultats
                        var statuses = results.statuses;
                        var counts = results.counts;

                        // Créer le contexte du graphique
                        var ctx = document.getElementById('Chart').getContext('2d');

                        // Dessiner le graphique
                        new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: statuses,
                                datasets: [{
                                    label: 'Nombre de RDV',
                                    data: counts,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.5)', // Couleur pour le statut 1
                                        'rgba(54, 162, 235, 0.5)', // Couleur pour le statut 2
                                        'rgba(75, 192, 192, 0.5)' // Couleur pour le statut 3
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)', // Couleur de bordure pour le statut 1
                                        'rgba(54, 162, 235, 1)', // Couleur de bordure pour le statut 2
                                        'rgba(75, 192, 192, 1)' // Couleur de bordure pour le statut 3
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                width: 400 // Définit la largeur du graphique à 400 pixels
                            }
                        });
                    </script>


                </header>
                <!-- Main -->

                <h1 class='text-center'> Rendez-vous par etat (Valide, Refuse, RDV Definis) </h1>
            </div>

            <title>Tableau Statique</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <div class="h-screen flex-grow-1 overflow-y-lg-auto">
                <h1>Services demandees</h1>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Services</th>
                            <th scope="col">Nombre de demandes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Holter ECG</strong></td>
                            <td><strong>35</strong></td>
                        </tr>
                        <tr>
                            <td><strong>MONITORING TENSIONNEL</strong></td>
                            <td><strong>30</strong></td>
                        </tr>
                        <tr>
                            <td><strong>ÉCHOGRAPHIE</strong></td>
                            <td><strong>22</strong></td>
                        </tr>
                        <tr>
                            <td><strong>ÉLECTROCARDIOGRAPHIE</strong></td>
                            <td><strong>10</strong></td>
                        </tr>
                        <tr>
                            <td><strong>ECHO-DOPPLER ARTÉRIEL ET VEINEUX</strong></td>
                            <td><strong>9</strong></td>
                        </tr>
                        <tr>
                            <td><strong>ÉPREUVE D’EFFORT</strong></td>
                            <td><strong>5</strong></td>
                        </tr>
                        <!-- Ajoutez d'autres lignes de données ici -->
                    </tbody>
                </table>
            </div>



</body>

<head>



    </body>








</html>