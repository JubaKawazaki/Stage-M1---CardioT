<?php

$connect = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connect, "cardiot");
mysqli_set_charset($connect, "utf8");

$currentdate = Date('Y-m-d');

$query5 = "SELECT Count(*) AS count FROM messages";
$query_run5 = mysqli_query($connect, $query5);


$query = "SELECT * FROM `patients` WHERE type='patient'";
$query_run = mysqli_query($connect, $query);

$result_per_page = 8;
$number_of_result = mysqli_num_rows($query_run);
$number_of_page = ceil($number_of_result / $result_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$this_page_first_result = ($page - 1) * $result_per_page;

$query = "SELECT * FROM `patients` WHERE type='patient' LIMIT " . $this_page_first_result . ',' . $result_per_page;
$query_run = mysqli_query($connect, $query);



if (isset($_POST['valider'])) {

    $idp = $_POST['idpat'];
    $dtrdv = $_POST['rdvpat'];
    $stat = "Rendez-vous Definis";

    $querry = "INSERT INTO `rdv`(`Date_rdv`, `Statut`, `ID_pats`)
     VALUES ('$dtrdv','$stat','$idp') ";
    $querry_run = mysqli_query($connect, $querry);

    if ($querry_run) {
        header("Location:Patients.php");
    }
}

if (isset($_POST['save'])) {

    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $DateNaissance = $_POST['DateNaissance'];
    $LieuNaissance = $_POST['LieuNaissance'];
    $Tel = $_POST['Tel'];
    $Email = $_POST['username'];
    $Mtdp = $_POST['Mtdp'];
    $type = "patient";

    $query2 = "INSERT INTO `patients`(`DateNaissance`, `LieuNaissance`, `Nom`, `Prenom`, `Tel`, `username`, `Mdp`, `type`) 
        VALUES  ('$DateNaissance','$LieuNaissance','$Nom','$Prenom','$Tel','$Email','$Mtdp','$type')";
    $query_run2 = mysqli_query($connect, $query2);

    if ($query_run2) {
        header("Location: Patients.php");
    }
}


if (isset($_POST['delete'])) {

    $idpat = $_POST['idpat'];

    $querydel = "DELETE FROM `patients` WHERE ID_Pats=$idpat";
    $querydel_run = mysqli_query($connect, $querydel);

    if ($querydel_run) {
        header("Location: Patients.php");
    }
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
    <link href="assets/css/bulma.css" rel="stylesheet">
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
                <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="Dashboard">
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
                            <a href="#" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " href="Dashboard.php">
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
                            <a class="nav-link active">
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

                </div>
            </div>
        </nav>
        <!-- Main content -->

        <!-- Modal ajouter patient  -->
        <div class="modal" id="nvpatient">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Contenu du modal -->
                    <div class="modal-header">
                        <h3 class="modal-title">Nouveau patient</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <label class="text-dark"><strong>Nom</strong></label>
                            <input id="titre" type="text" name="Nom" class="form-control" placeholder="Nom du patient" required>
                            <label class="text-dark"><strong>Prénom</strong></label>
                            <input id="titre" type="text" name="Prenom" class="form-control" placeholder="Prénom du patient" required>
                            <label class="text-dark"><strong>Date de Naissance</strong></label>
                            <input type="date" name="DateNaissance" id="date" class="form-control" required>
                            <label class="text-dark"><strong>Lieu de Naissance</strong></label>
                            <input id="titre" type="text" name="LieuNaissance" class="form-control" placeholder="" required>
                            <label class="text-dark"><strong>Numéro de telephone</strong></label>
                            <input id="titre" type="number" name="Tel" class="form-control" placeholder="" required>
                            <label class="text-dark"><strong>Nom d'utilisateur</strong></label>
                            <input id="titre" type="text" name="username" class="form-control" placeholder="" required>
                            <label class="text-dark"><strong>Mot de passe</strong></label>
                            <input id="titre" type="password" name="Mtdp" class="form-control" placeholder="" required>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-danger form-control close" data-dismiss="modal">Annuler </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary form-control" type="submit" name="save">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- modal supprimer patient -->

        <div class="modal" id="dtepatient">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Contenu du modal -->
                    <div class="modal-header">
                        <h3 class="modal-title">Definir la date de rendez-vous du patient :</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <input id="ID_utls" type="hidden" name="ID_utls" class="form-control" required>
                            <input type="datetime-Local" class="btn form-control" name="rdvpat">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success form-control" type="submit" name="valider" value="">Valider</button>
                        <button class="btn btn-muted form-control close" data-dismiss="modal">Annuler </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Patients</h1><br>
                            </div>
                            <!-- Actions -->
                            <div class="col-sm-6 col-12 text-sm-end">
                                <div class="mx-n1">

                                    <a data-toggle="modal" data-target="#nvpatient" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                        <span class=" pe-2">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                        <span>Nouveau patient</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Nav -->

                    </div>
                </div>

            </header><br>

            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!-- Card stats -->

                    <div class="card shadow border-0 mb-7">

                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nom et Prenom</th>
                                        <th scope="col">Date de naissance</th>
                                        <th scope="col">Lieu de naissance</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Definir RDV</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($query_run)) {
                                    ?>
                                        <tr>
                                            <td class="text-dark"><?php echo $row['Nom'] . " " . $row['Prenom'] ?></td>
                                            <td class="text-dark"><?php echo $row['DateNaissance'] ?></td>
                                            <td class="text-dark"><?php echo $row['LieuNaissance'] ?></td>
                                            <td class="text-dark"><?php echo $row['Tel'] ?> </td>
                                            <td class="text-dark"><?php echo $row['username'] ?></td>
                                            <td class="text-dark">

                                                <!--  data-toggle data-target='#dirassm' -->
                                                <form method="POST">
                                                    <div class="input-icons">
                                                        <input type="hidden" name="idpat" value="<?php echo $row['ID_pats']; ?>">
                                                        <input type="datetime-Local" name="rdvpat">
                                                        <button style="margin-left:5px;" class="button is-success is-small" type="submit" name="valider">
                                                            <i class="bi bi-check2-square"></i>
                                                        </button>
                                                        <button class="button is-danger is-small" type="submit" name="delete">
                                                            <i class="bi bi-calendar-x"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>

                                    <?php   } ?>


                                </tbody>
                            </table>
                        </div>
                        <div class="column">
                            <nav class="pagination" role="navigation" aria-label="pagination">
                                <?php
                                for ($page = 1; $page <= $number_of_page; $page++) {
                                ?>
                                    <ul class="pagination-list">
                                    <?php
                                    echo '<li><a class="pagination-link" href="Patients.php?page=' . $page . '">' . $page . '</a></li> ';
                                }
                                    ?>
                                    <li>
                                        <span class="pagination-ellipsis">&hellip;</span>
                                    </li>
                                    </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>
</body>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>