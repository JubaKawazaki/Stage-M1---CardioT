<?php 

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
// Inclusion de la bibliothèque PHPMailer
require APP_PATH . '/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require APP_PATH . '/vendor/phpmailer/phpmailer/src/SMTP.php';
require APP_PATH . '/vendor/phpmailer/phpmailer/src/Exception.php';
require APP_PATH . '/vendor/autoload.php';



  include APP_PATH . "/Views/inc/alerts.php";

$Param = 1;
$Id = null;
$data = new DemandeController();
$Demandes = $data->getAll($Param,$Id);

if(isset($_POST['send'])){
 $DateRDV = $_POST['Date'];
 $Heure = $_POST['Time'];
 $Id = $_POST['Id'];

 // Définir l'envoie d'email, PHPMailer

  // Instantiation et configuration de l'objet PHPMailer
  $mail = new PHPMailer(true);
  $mail->SMTPDebug = 0;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'dentapointement@gmail.com';
  $mail->Password = 'lfjratfcxrumvrdj';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

          // Destinataire
  $to = $_POST['Email'];
  $Patient = $_POST['Nom'];
  $mail->addAddress($to);

  // Sujet et corps du message
  $mail->Subject = "Rendez-vous Dentapoint ";
  $mail->Body = 'Bonjour (Mr/Mme) ' . $Patient . ', Vous avez un rendez-vous chez le dentiste de DENTAPOINT le : ' .$DateRDV .' à ' . $Heure .' . Bienvenue';

  if($mail->send()) {
      echo 'Le message a bien été envoyé';
      $db = DB::connect();
      $sql1 = "UPDATE Patients SET Date = :Date, Heure = :Heure,Etat='Envoyé' WHERE ID_Patient = :ID";
      $res1 = $db->prepare($sql1);
      $res1->bindParam(':ID', $Id, PDO::PARAM_STR);
      $res1->bindParam(':Heure', $Heure, PDO::PARAM_STR); 
      $res1->bindParam(':Date', $DateRDV, PDO::PARAM_STR);
      $res1->execute();
      Session::set("success","Rendez-vous envoyé");

  } else {
      echo 'Erreur : ' . $mail->ErrorInfo;
  }
  header('Location: ' . Djalix.'://'.$_SERVER['HTTP_HOST']."/Demandes");

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Liste des demandes</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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

  <!-- Template Main CSS File -->
  <link href="assets/css/Demande.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>



  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a>CardioT</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="Dashboard">Home</a></li>
          <li><a class="nav-link scrollto active">Demandes de rendez-vous</a></li>
          <li><a class="nav-link scrollto" href="Messages">Message de contact</a></li>
            <ul>
            </ul>
          </li>
          <li></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->


    </div>
  </header><!-- End Header -->

  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
   <div class="container">
    <h1 style="background-color: rgba(255, 255, 255, 0.5); padding: 10px;">Rendez-vous</h1>
    <h2 style="background-color: rgba(255, 255, 255, 0.5); padding: 10px;">Demandes de prises de rendez-vous</h2>
    <a href="#rdv" class="btn-get-started scrollto">Consulter</a>
   </div>
  </section><!-- End Hero -->
  
  <section></section>
<section></section>

<div id="rdv" class="container">
   <H2>Listes des demandes</H2>
  <div class="row">
    <div class="col">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Etat</th>
            <th scope="col">Date</th>
            <th scope="col">L'heure</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
<?php if($Demandes){ $i = 1 ;foreach($Demandes as $Demande){ ?>
 <form method="post">
          <?php $Etat = $Demande['Etat']; ?>
          <tr >
            <th scope="row"><?php echo $i ?></th>
            <td><?php echo $Demande['Nom'] ?></td>
            <td><?php echo $Demande['Email'] ?></td>
            <td><?php echo $Demande['Telephone'] ?></td>
            <td <?php if($Etat == 'New'){?>class="text-primary"<?php }else{?>class="text-success"<?php } ?>><strong><?php echo $Etat ?></strong></td>
            <td><input class="form-control" style="width: 130px;" name="Date" type="Date" <?php if($Etat == 'Envoyé'){?>value="<?php echo $Demande['Date'] ?>" Disabled <?php } ?>required></td>
            <td><input class="form-control" style="width: 100px;" name="Time" type="Time" <?php if($Etat == 'Envoyé'){?>value="<?php echo $Demande['Heure'] ?>" Disabled <?php } ?>required></td>
            <td>
             <input type="hidden" name="Nom" value="<?php echo $Demande['Nom'] ?>">
             <input type="hidden" name="Email" value="<?php echo $Demande['Email'] ?>">
             <input type="hidden" name="Id" value="<?php echo $Demande['ID_Patient'] ?>">
              <button type="submit" class="btn" name="send" style="font-size: 1.5em;" title = "consult" title="Envoyer" <?php if($Etat == 'Envoyé'){ echo 'disabled';} ?>><i class='bx bx-mail-send'></i></button>
            </td>
          </tr>
</form>
<?php $i++; }} ?>
        </tbody>
      </table>
      <?php if(!$Demandes){?>
        <center><h2>Aucun résultat !</h2></center>  
      <?php } ?>
    </div>
  </div>
</div>

<section></section>
  
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

