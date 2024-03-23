<?php


$connect = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connect, "cardiot");
mysqli_set_charset($connect, "utf8");

if (isset($_POST['envoyer'])) {

  $nompat = $_POST['Nom'];
  $prenompat = $_POST['Prenom'];
  $telpat = $_POST['Tel'];
  $mailpat = $_POST['Email'];
  $objpat = $_POST['Objet'];
  $msgpat =  $_POST['Message'];
  $dateenv = Date('Y-m-d');

  $query = "INSERT INTO `messages`(`Nom`, `Email`, `Objet`, `Contenu`, `Date_env`, `tel`, `prenom`) 
  VALUES ('$nompat','$mailpat','$objpat','$msgpat','$dateenv','$telpat','$prenompat' )";

  $query_run = mysqli_query($connect, $query);


  if ($query_run) {
    header("Location: home.php");
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>مرحبا بك</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logoc.svg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="C:\Users\PC\Desktop\Dentapoint\Dentapoint\assets\css\new.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:cardiotcardio@gmail.com">cardiotcardio@gmail.com</a>
      </div>
      <div>
        <button type="button" class="btn btn-primary" style="background-color :black">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
            <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286H4.545zm1.634-.736L5.5 3.956h-.049l-.679 2.022H6.18z" />
            <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2zm7.138 9.995c.193.301.402.583.63.846-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6.066 6.066 0 0 1-.415-.492 1.988 1.988 0 0 1-.94.31z" />
          </svg><a href="homearb.php" style=" color: white; font-family: Arial;"> Arabe</a>
        </button>
        <button type="button" class="btn btn-primary" style="background-color :black">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
            <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286H4.545zm1.634-.736L5.5 3.956h-.049l-.679 2.022H6.18z" />
            <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2zm7.138 9.995c.193.301.402.583.63.846-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6.066 6.066 0 0 1-.415-.492 1.988 1.988 0 0 1-.94.31z" />
          </svg><a href="home.php" style=" color: white; font-family: Helvetica;"> Français</a>
        </button>

      </div>

    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="homearb.php" class="logo me-auto"><img src="assets/img/cardologo.svg"></a> <a href="homearb.php">CardioT</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->



      <a href="Login.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">تسجيل دخول</span></a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Bienvenue sur CardioT</h1>
      <h2>توفير حل شامل للرعاية الصحية
        <strong>لقلبك</strong>
      </h2>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h4><strong>من نحن؟</strong></h4>
              <p>
                <strong>CrdioT</strong> مكتب طبي متخصص في أمراض القلب. الفحص أو إجراء أمراض القلب هو دائمًا مصدر للتوتر. من أجل إعلامك وطمأنتك، تم وضع هذا الموقع على الإنترنت.
                ستجد الكثير من المعلومات حول أمراض القلب لدى البالغين والأطفال ولكن أيضًا الوصول إلى الخطط ومعلومات الاتصال بالإضافة إلى مقاطع الفيديو التفسيرية.
              </p>

            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class='bx bx-edit-alt'></i>
                    <h4>موعد</h4>
                    <p>ما عليك سوى الاتصال بنا أو زيارة المكتب لإنشاء حسابك الذي سيسمح لك بمتابعة مواعيدك بالإضافة إلى استشارة في الموقع.
                    </p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-user-pin"></i>
                    <h4>تواصل</h4>
                    <p>لا تتردد في الاتصال بنا عن طريق ملء النموذج أدناه وسنجيب عليك في أقرب وقت ممكن.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>خدمات</h4>
                    <p>
                      لا تنس التحقق من خدمات CardioT الخاصة بنا لمعرفة مدى التزامنا بتحسين الصحة الكلية لقلبك
                    </p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->



    <!-- End Appointment Section -->


    <!-- ======= Gallery Section ======= -->
    <section class="section featured">
      <div class="container">

        <div class="section-title">
          <h2>خدمات</h2>
        </div>




        <!-- /.service-image -->
        <div class="row" style="padding-left:15%;">
          <div class="card bg-primary mb-3" style="width: 21rem;margin:2%;">
            <img class="card-img-top" src="assets/img/slider.jpg" alt="Card image cap">
            <div class="card-body border-primary bg-primary text-white">
              <h5 class="card-title"><strong>تخطيط القلب الكهربائي</strong></h5>
              <p class="card-text">تخطيط القلب الكهربائي (ECG) هو التمثيل الرسومي للنشاط الكهربائي لعضلة القلب الذي يتم جمعه بواسطة الأقطاب الكهربائية الموضوعة على سطح الجلد.</p>
              <a href="Electroarb.php" class="btn btn-info">اقرأ المزيد</a>
            </div>
          </div>

          <div class="card bg-primary mb-3" style="width: 18rem;margin:2%;">
            <img class="card-img-top" src="assets/img/echograph.jpg" alt="Card image cap">
            <div class="card-body border-primary bg-primary text-white">
              <h5 class="card-title"><strong>الموجات فوق الصوتية</strong></h5>
              <p class="card-text">الموجات فوق الصوتية القلبية أو صدى القلب أو تخطيط صدى القلب هو التمثيل التصويري لجميع أنسجة القلب.</p>
              <a href="Echoarb.php" class="btn btn-info">اقرأ المزيد</a>
            </div>
          </div>

          <div class="card bg-primary mb-3" style="width: 18rem;margin:2%;">
            <img class="card-img-top" src="assets/img/tensional.jpg" alt="Card image cap">
            <div class="card-body border-primary bg-primary text-white">
              <h5 class="card-title"><strong>الرصد التيني</strong></h5>
              <p class="card-text">مراقبة التوتر أو المراقبة الإسعافية للوادعة الشريانية (تسمى عادة <strong>MAPA</strong> )</p><br>
              <a href="Tensionarb.php" class="btn btn-info">اقرأ المزيد</a>
            </div>
          </div>
        </div>
        <br><br>
        <div class="row" style="padding-left:15%;">
          <div class="card bg-primary mb-3" style="width: 18rem;margin:2%;">
            <img class="card-img-top" src="assets/img/ecodoplaire.png" alt="Card image cap">
            <div class="card-body border-primary bg-primary text-white">
              <h5 class="card-title"><strong>ECHO-DOPPLER الشرايين والوريدية</strong></h5>
              <p class="card-text">لا يوجد تحضير خاص، باستثناء الموجات فوق الصوتية دوبلر من الشريان الأبهر أو الكلى،</p>
              <a href="Echodoparb.php" class="btn btn-info">اقرأ المزيد</a>
            </div>
          </div>

          <div class="card bg-primary mb-3" style="width: 18rem;margin:2%;">
            <img class="card-img-top" src="assets/img/ECG.jpg" alt="Card image cap">
            <div class="card-body border-primary bg-primary text-white">
              <h5 class="card-title"><strong>24 ساعة ECG Holter</strong></h5>
              <p class="card-text">التسجيل المستمر لمخطط القلب الكهربائي أو Holter ECG هو تقنية للقياس التلقائي للنشاط الكهربائي</p>
              <a href="Ucgharb.php" class="btn btn-info">اقرأ المزيد</a>
            </div>
          </div>

          <div class="card bg-primary mb-3" style="width: 18rem;margin:2%;">
            <img class="card-img-top" src="assets/img/effort.jpg" alt="Card image cap">
            <div class="card-body border-primary bg-primary text-white">
              <h5 class="card-title"><strong>اختبار الاجهاد</strong></h5>
              <p class="card-text">اختبار الإجهاد هو فحص تكميلي لأمراض القلب يتكون من التسجيل</p><br>
              <a href="Effortarb.php" class="btn btn-info">اقرأ المزيد</a>
            </div>
          </div>
        </div>


      </div>
      <!-- End Gallery Section -->
    </section>
    <div class="container-fluid">
      <div class="row g-0">


        <section class="section featured">
          <div class="container">
            <div class="section-title">
              <h2>أخبار</h2>
            </div>
            <div class="row">
              <?php
              $connect = mysqli_connect("localhost", "root", "");
              $db = mysqli_select_db($connect, "cardiot");
              mysqli_set_charset($connect, "utf8");

              $query = "SELECT * FROM articles";
              $query_run = mysqli_query($connect, $query);
              while ($row = mysqli_fetch_array($query_run)) { ?>



                <div class="col-12 col-md-6 col-lg-4">
                  <div class="card border-black bg-light mb-3" style="max-width: 20rem;">
                    <div class="card-header border-primary bg-dark text-white"><strong><?php echo $row['Titre'] ?></strong></div>
                    <div class="card-body bg-dark text-white">
                      <p class="card-text " ><?php echo $row['Contenu'] ?></p>
                    </div>
                    <div class="card-footer border-primary bg-dark text-primary"><?php echo $row['Date_pub'] ?></div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </section>














        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
          <div class="container">
            <div class="section-title">
              <h2>اتصال</h2>
              <p>لا تتردد في كتابة رسالتك</p>
            </div>



            <div class="container">
              <div class="row mt-5">

                <div class="col-lg-4">
                  <div class="info">
                    <div class="address">
                      <i class="bi bi-geo-alt"></i>
                      <h4>الموقع</h4>
                      <p>شارع ملاح علي، جسر قسنطينة، الجزائر</p>
                    </div>

                    <a href="mailto:cardiotcardio@gmail.com">
                      <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>البريد الإلكتروني</h4>
                        <p>cardiotcardio@gmail.com</p>
                      </div>
                    </a>

                    <a href="tel:+213550505050">
                      <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4>مكالمة</h4>
                        <p>+213 50505050</p>
                    </a>
                  </div>

                </div>

              </div>

              <div class="col-lg-8 mt-5 mt-lg-0">

                <form method="POST">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="text" name="Nom" class="form-control" id="name" placeholder="Votre nom " required>
                    </div>
                    <br> <br>
                    <div class="col-md-6 form-group">
                      <input type="text" name="Prenom" class="form-control" id="prenom" placeholder="Votre prenom" required>
                    </div>
                    <br>
                    <div class="col-md-6 form-group">
                      <input type="number" name="Tel" class="form-control" id="tel" placeholder="Votre numero de telephone" required>
                    </div>
                    <br>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <input type="email" class="form-control" name="Email" id="email" placeholder="Votre adresse email" required>
                    </div>
                    <br>
                  </div>
                  <div class="form-group mt-3">
                    <input class="form-control" type="text" name="Objet" placeholder="Objet du message">
                    <br>
                    <textarea class="form-control" name="Message" rows="5" placeholder="Message" required></textarea>
                  </div>
                  <br>
                  <div class="text-center"><button type="submit" name="envoyer">Envoyer</button></div>
                </form>
              </div>
            </div>
          </div>
        </section>
        <div class="wpb_gmaps_widget wpb_content_element">
          <div class="wpb_wrapper">
            <div class="wpb_map_wraper">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d199.92702709634287!2d3.0772824449067726!3d36.702564343160546!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fad1fecd822e3%3A0xff7f39efc590f03c!2sRue%20Mellah%20Ali%2C%20Djasr%20Kasentina!5e0!3m2!1sfr!2sdz!4v1687731223349!5m2!1sfr!2sdz" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <iframe style="border: 0px none; pointer-events: none;" allowfullscreen="" aria-hidden="false" tabindex="0" width="600" height="450" frameborder="0"></iframe>
            </div>
          </div>
        </div>
      </div> <!-- End Contact Section -->

  </main><br><br><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <center>
      <div class="container d-md-flex py-4">
        <div class="me-md-auto text-center text-md-start">
          <div class="copyright">
            &copy; Copyright <strong><span>CardioT</span></strong>
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
            2023</a>
          </div>
        </div>
      </div>
    </center>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->


  <!-- Template Main JS File -->
  <script src="assets/main.js"></script>

</body>

</html>