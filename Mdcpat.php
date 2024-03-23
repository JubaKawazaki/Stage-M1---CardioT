<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Favicons -->
    <link href="assets/img/1title.png" rel="icon">

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
                <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                    <img src="assets\img\Docteur1.svg" alt="...">
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
                            <a class="nav-link" href="Dashpat">
                                <i class="bi bi-house"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="rdvpatient">
                                <i class="bi bi-bar-chart"></i> Rendez-vous
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Msgpat">
                                <i class="bi bi-chat"></i> Messages
                                <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto"><?php echo $Count ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="Servpat">
                                <i class="bi bi-file-earmark-text"></i> Services
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" >
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
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">

            <!-- modal ajouter -->

            <div class="modal" id="amine">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Contenu du modal -->
                        <div class="modal-header">
                            <h5 class="modal-title">Ajouter un message</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <label class="text-dark"><strong>Objet</strong></label>
                                <input id="titre" name="Objet" class="form-control" required>
                                <input type="hidden" name="Nom" value="<?php echo $_SESSION['Nom'] ?>">
                                <input type="hidden" name="Email" value="<?php echo $_SESSION['Email'] ?>">
                                <input type="hidden" name="ID_pats" value="<?php echo $_SESSION['ID'] ?>">
                                <label class="text-dark"><strong>Message</strong></label>
                                <textarea id="contenu" name="Contenu" class="form-control" style="height: 200px;border-width: 2px; border-style: solid; font-weight: bold;" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success form-control" type="submit" name="envoyer">Envoyer</button>
                            <button class="btn btn-danger form-control close" data-dismiss="modal">Annuler </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Supprimer -->
            <div class="modal" id="supprimer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Contenu du modal -->
                        <div class="modal-header">
                            <h3 class="modal-title">Etes-vous sur de vouloir supprimer cet elément ?</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                
                                <input type="hidden" id="id_messgsupp" name="Id_messg" class="form-control" required>
                                <button class="btn btn-danger form-control" style="margin-bottom:1em;" type="submit" name="delete">Supprimer</button>
                                <button class="btn btn-dark form-control close" data-dismiss="modal">Annuler </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Eléments envoyés</h1><br>
                            </div>
                            <!-- Actions -->
                            <div class="col-sm-6 col-12 text-sm-end">
                                <div class="mx-n1">

                                    <a data-toggle="modal" data-target="#amine" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                        <span class=" pe-2">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                        <span>Ajouter un nouveau message</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Nav -->

                    </div>
                </div>
            </header>
            <!-- Main -->

            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!-- Card stats -->

                    <div class="card shadow border-0 mb-7">

                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Objet</th>
                                        <th scope="col">Etat</th>
                                        <th scope="col">Date du message</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Messages as $Messages) : ?>
                                        <tr>


                                            <td class="text-dark"><?php echo $Messages['Objet'] ?></td>
                                            <td class="text-dark"><?php echo $Messages['Etat'] ?></td>
                                            <td class="text-dark"><?php echo $Messages['Date_env'] ?></td>
                                            <td class="text-dark">
                                                <a title="Consulter" href="ServiceDetail?id=<?php echo $Svc['ID_pats'] ?>" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1" style="margin-bottom: 0.5em;"><i class="bi bi-eye"></i></a>
                                                <a class="delete text-dark" data-toggle="modal" data-target="#supprimer" data-id="<?php echo $Messages['Id_messg'] ?>"><i style="font-size:2em;" class="bi bi-trash"></i></a>


                                            </td>


                                        </tr>
                                    <?php endforeach; ?>


                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </main>
        </div>
    </div>
</body>


<script>
    var modalBtns = document.getElementsByClassName("delete");

    // Bouclez sur tous les boutons et ajoutez un gestionnaire d'événement
    for (var i = 0; i < modalBtns.length; i++) {
        modalBtns[i].addEventListener("click", function() {
            var id = this.getAttribute("data-id"); // Obtenez l'ID du bouton cliqué
            document.getElementById("id_messgsupp").value = id;

        });
    }
</script>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>