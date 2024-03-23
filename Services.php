<?php


$param = null;
$data = new SvcController();

$DB = DB::connect();
$query = "SELECT Count(*) as Nbr FROM messages WHERE Etat = 'New' ";
$stmt = $DB->prepare($query);
$stmt->execute();
$row = $stmt->fetch();
$Count = $row['Nbr'];

$DB = DB::connect();
$query = "SELECT Count(*) as Nbrr FROM rdv WHERE Statut = 'nouveau' ";
$stmt = $DB->prepare($query);
$stmt->execute();
$row = $stmt->fetch();
$CountRDV = $row['Nbrr'];



if (isset($_POST['delete'])) {
    $serviceN = $_POST['Id_servc2'];
    $data->Supprimer($serviceN);
    header('Location: ' . Djalix . '://' . $_SERVER['HTTP_HOST'] . "/Services");
}


$Svcs = $data->getAll($param);

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

    <style>
        .aminecss {
            border: 2px;
            border-radius: 35px;
            padding: 8px;

        }
    </style>

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
                                <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto"><?php echo $CountRDV ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active">
                                <i class="bi bi-file-earmark-text"></i> Services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Messages.php">
                                <i class="bi bi-chat"></i> Messages
                                <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto"><?php echo $Count ?></span>
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
                    <ul class="navbar-nav mb-md-4">
                        <li>
                            <div class="nav-link text-xs font-semibold text-uppercase text-muted ls-wide" href="#">
                                A venir
                                <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-4">13</span>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="nav-link d-flex align-items-center">
                                <div class="me-4">
                                    <div class="position-relative d-inline-block text-white">
                                        <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar rounded-circle">
                                        <span class="position-absolute bottom-2 end-2 transform translate-x-1/2 translate-y-1/2 border-2 border-solid border-current w-3 h-3 bg-success rounded-circle"></span>
                                    </div>
                                </div>
                                <div>
                                    <span class="d-block text-sm font-semibold">
                                        Marie Claire
                                    </span>
                                    <span class="d-block text-xs text-muted font-regular">
                                        Paris, FR
                                    </span>
                                </div>
                                <div class="ms-auto">
                                    <i class="bi bi-chat"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link d-flex align-items-center">
                                <div class="me-4">
                                    <div class="position-relative d-inline-block text-white">
                                        <span class="avatar bg-soft-warning text-warning rounded-circle">JW</span>
                                        <span class="position-absolute bottom-2 end-2 transform translate-x-1/2 translate-y-1/2 border-2 border-solid border-current w-3 h-3 bg-success rounded-circle"></span>
                                    </div>
                                </div>
                                <div>
                                    <span class="d-block text-sm font-semibold">
                                        Michael Jordan
                                    </span>
                                    <span class="d-block text-xs text-muted font-regular">
                                        Bucharest, RO
                                    </span>
                                </div>
                                <div class="ms-auto">
                                    <i class="bi bi-chat"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link d-flex align-items-center">
                                <div class="me-4">
                                    <div class="position-relative d-inline-block text-white">
                                        <img alt="..." src="https://images.unsplash.com/photo-1610899922902-c471ae684eff?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar rounded-circle">
                                        <span class="position-absolute bottom-2 end-2 transform translate-x-1/2 translate-y-1/2 border-2 border-solid border-current w-3 h-3 bg-danger rounded-circle"></span>
                                    </div>
                                </div>
                                <div>
                                    <span class="d-block text-sm font-semibold">
                                        Heather Wright
                                    </span>
                                    <span class="d-block text-xs text-muted font-regular">
                                        London, UK
                                    </span>
                                </div>
                                <div class="ms-auto">
                                    <i class="bi bi-chat"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- Push content down -->
                    <div class="mt-auto"></div>

                </div>
            </div>
        </nav>

        <!-- Modal supprimer -->
        <div class="modal" id="delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Contenu du modal -->
                    <div class="modal-header">
                        <h3 class="modal-title">Etes-vous sur de vouloir supprimer ce service ?</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <input type="hidden" id="id_service2" name="Id_servc2" class="form-control" placeholder="Nom du médicament" required>
                            <button class="btn btn-danger form-control" type="submit" name="delete">Supprimer</button>
                            <button class="btn btn-muted form-control close" data-dismiss="modal">Annuler </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Mes services</h1><br>
                            </div>
                            <!-- Actions -->
                            <div class="col-sm-6 col-12 text-sm-end">
                                <div class="mx-n1">

                                    <a href="NService" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                        <span class=" pe-2">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                        <span>Nouveau</span>
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
                    <div class="row" style="margin-bottom:1em;">
                        <div class="col-4">
                            <input type="text" id="search" class="form-control" placeholder="Rechercher un service">
                        </div>
                    </div>
                    <!-- Card stats -->
                    <div class="row ">
                        <?php foreach ($Svcs as $Svc) : $Date = $Svc['Date'] ?>
                            <div class="col-4">
                                <div class="card" style="background-color:#9ccff9; margin-bottom:1em;">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-8">
                                                <span class="h6 font-semibold text-dark text-sm d-block mb-2">N° <?php echo $Svc['Id_servc'] ?></span>
                                                <span class="h3 font-bold mb-0"><?php echo $Svc['Nom'] . " " . $Svc['Prenom'] ?></span><br>
                                                <span class="h3 font-bold text-xs mb-0"><?php echo $Svc['Date'] ?></span>
                                            </div>
                                            <div class="col-2">
                                                <a title="Consulter" href="ServiceDetail?id=<?php echo $Svc['Id_servc'] ?>" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1" style="margin-bottom: 0.5em;"><i class="bi bi-eye"></i></a>
                                                <a title="Modifier" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1" style="margin-bottom: 0.5em;"><i class="bi bi-pencil"></i></a>
                                                <a data-toggle="modal" data-target="#delete" data-id="<?php echo $Svc['Id_servc'] ?>" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1 open-modal-btn"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- ---------------------- pour modal supprimer -------------------  -->

    <script>
        // Obtenez tous les boutons avec la classe "open-modal-btn"
        var modalBtns = document.getElementsByClassName("open-modal-btn");

        // Bouclez sur tous les boutons et ajoutez un gestionnaire d'événement
        for (var i = 0; i < modalBtns.length; i++) {
            modalBtns[i].addEventListener("click", function() {
                var idservice = this.getAttribute("data-id"); // Obtenez l'ID du bouton cliqué
                console.log(idservice);
                document.getElementById("id_service2").value = idservice; // Mettez à jour la valeur du champ d'entrée "test" avec l'ID

            });
        }
    </script>


    <!-- javascript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>