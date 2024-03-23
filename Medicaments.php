<?php

$connect = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connect, "cardiot");
mysqli_set_charset($connect, "utf8");

$query5 = "SELECT Count(*) AS count FROM messages";
$query_run5 = mysqli_query($connect, $query5);

if (isset($_POST['add'])) {

    $Nom_med = $_POST['Nom_med'];
    $Desc_med = $_POST['Description_med'];

    $query1= " INSERT INTO `medicaments`(`Nom`, `Description`) VALUES ('$Nom_med','$Desc_med')";
    $query_run1 = mysqli_query($connect, $query1);

    if ($query_run1) {
        header("Location: Medicaments.php");
    }
}

if (isset($_POST['delete'])) {

    $idm = $_POST['idm'];

    $query3 = "DELETE FROM `medicaments` WHERE ID_Medicament=$idm";
    $query_run3 = mysqli_query($connect, $query3);

    if ($query_run3) {
        header("Location: Medicaments.php");
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
    <script src="javascript.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
                            <a class="nav-link" href="Dashboard.php">
                                <i class="bi bi-house"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="rendezvous.php">
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
                            <a class="nav-link active">
                                <i class="bi bi-capsule"></i>Médicaments
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







        <!-- Modal Ajouter -->
        <div class="modal" id="amine">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Contenu du modal -->
                    <div class="modal-header">
                        <h3 class="modal-title">Nouveau médicament</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <label class="text-dark"><strong>Designation</strong></label>
                            <input id="titre" name="Nom_med" class="form-control" placeholder="Nom du médicament" required>
                            <label class="text-dark"><strong>Description</strong></label>
                            <textarea id="contenu" name="Description_med" class="form-control" placeholder="Description sur le médicament" style="height: 100px;border-width: 2px; border-style: solid; font-weight: bold;" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary form-control" type="submit" name="add">Enregistrer</button>
                        <button class="btn btn-danger form-control close" data-dismiss="modal">Annuler </button>
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
                                <h1 class="h2 mb-0 ls-tight">Médicaments</h1><br>
                            </div>
                            <!-- Actions -->
                            <div class="col-sm-6 col-12 text-sm-end">
                                <div class="mx-n1">

                                    <a data-toggle="modal" data-target="#amine" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                        <span class=" pe-2">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                        <span>Nouveau médicament</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Nav -->

                    </div>
                </div>

            </header><br>


            <!-- Modal Ajouter -->
            <div class="modal" id="amine">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Contenu du modal -->
                        <div class="modal-header">
                            <h3 class="modal-title">Nouveau médicament</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <label class="text-dark"><strong>Designation</strong></label>
                                <input id="titre" name="Nom" class="form-control" placeholder="Nom du médicament" required>
                                <label class="text-dark"><strong>Description</strong></label>
                                <textarea id="contenu" name="Description" class="form-control" placeholder="Description sur le médicament" style="height: 100px;border-width: 2px; border-style: solid; font-weight: bold;" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary form-control" type="submit" name="add">Enregistrer</button>
                            <button class="btn btn-danger form-control close" data-dismiss="modal">Annuler </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!-- Card stats -->
                    <div class="row">
                        <?php
                        $query = "SELECT * FROM `medicaments`";
                        $query_run = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_array($query_run)) {
                        ?>
                            <div class="col-4">
                                <div class="card" style="background-color:#9ccff9; margin-bottom:1em;">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-10">
                                                <h2><?php echo $row['Nom'] ?></h2>
                                                <p class="text-dark"><?php echo $row['Description']; ?></p>
                                            </div>
                                            <div class="col-2">
                                                <form method="POST">
                                                    <input type="hidden" name="idm" value=" <?php echo $row['ID_Medicament']; ?>">
                                                    <button class="button is-link is-small" type="submit" name="delete">
                                                        <i style="font-size:2em;" class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </main>

        </div>
    </div>


</body>


</html>