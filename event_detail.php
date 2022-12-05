<?php
session_start();
$_GET['id'];
require_once 'class/Bdd.php';
$bdd = new Bdd();
if (isset($_GET['id']) && $_GET['id'] != null){
    require_once 'class/Evenement.php';
    $evenement = new Evenement(array(
        'idevent'=> $_GET['id']
    ));
    $detaileresulta=$evenement->voirUnEvenement($bdd);
}
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Detaile d'evenement </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/price_rangs.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/logo.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['id_utilisateur']) && $_SESSION['role'] == "Eleve"){
                        echo ("<div class='col-lg-9 col-md-9'>
                            <div class='menu-wrapper'>
                                <!-- Main-menu -->
                                <div class='main-menu'>
                                    <nav class='d-none d-lg-block'>
                                        <ul id='navigation'>
                                            <li><a href='index.php'>Accueil</a></li>
                                            <li><a href='job_listing.php'>Trouver une offre </a></li>
                                            <li><a href='crea.php'>Evénements</a></li>
                                           <li><a href='#'>Page</a>
                                            <ul class='submenu'>
                                                    <li><a href='blog.html'>Blog</a></li>
                                                    <li><a href='single-blog.html'>Blog Details</a></li>
                                                    <li><a href='elements.php'>Elements</a></li>
                                                </ul>
                                            </li>
                                            <li><a href='contact.html'>Contact</a></li>
                                            <li><a href='#'><img src='assets/img/icon/Profile.jpg' width='55'>" .$_SESSION['nom']." ".$_SESSION['prenom']. " </a>
                                            <ul class='submenu'>
                                                    <li><a href='profile.php'>Profil</a></li>
                                                    <li><a href='traitement/action_utilisateur/deco.php'>Se déconnecter <img src='assets/logout.jpg' width='20'></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>");}
                    //session entreprise
                    elseif (isset($_SESSION['id_utilisateur']) && $_SESSION['role'] == "Entreprise"){
                        echo ("<div class='col-lg-9 col-md-9'>
                            <div class='menu-wrapper'>
                                <!-- Main-menu -->
                                <div class='main-menu'>
                                    <nav class='d-none d-lg-block'>
                                        <ul id='navigation'>
                                            <li><a href='index.php'>Accueil</a></li>
                                            <li><a href='job_listing.php'>Nos offre</a></li>
                                            <li><a href='crea.php'>Evénements</a></li>
                                            <li><a href='#'>Prospect</a>
                                            <ul class='submenu'>
                                                    <li><a href='blog.html'>Blog</a></li>
                                                    <li><a href='single-blog.html'>Blog Details</a></li>
                                                    <li><a href='elements.php'>Elements</a></li>
                                                </ul>
                                            </li>
                                            <li><a href='contact.html'>Contact</a></li>
                                            <li><a href='#'><img src='assets/img/icon/Profile.jpg' width='55'>" .$_SESSION['nom'].' '.$_SESSION['post']. " </a>
                                            <ul class='submenu'>
                                                    <li><a href='profile.php'>Profil</a></li>
                                                    <li><a href='traitement/action_utilisateur/deco.php'>Se déconnecter <img src='assets/logout.jpg' width='20'></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>");}
                    //aucune session
                    else{echo ("<div class='col-lg-9 col-md-9'>
                            <div class='menu-wrapper'>
                                <!-- Main-menu -->
                                <div class='main-menu'>
                                    <nav class='d-none d-lg-block'>
                                        <ul id='navigation'>
                                            <li><a href='index.php'>Home</a></li>
                                            <li><a href='job_listing.php'>Emploi</a></li>
                                            <li><a href='crea.php'>Creation </a></li>
                                            <li><a href='#'>Page</a>
                                <ul class='submenu'>
                                                    <li><a href='rendezvous.html'>Blog</a></li>
                                                    <li><a href='single-blog.html'>Blog Details</a></li>
                                                    <li><a href='elements.php'>Elements</a></li>
                                                </ul>
                                            </li>
                                            <li><a href='contact.html'>Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class='header-btn d-none f-right d-lg-block'>
                                    <a href='form/dist/inscription.php' class='btn head-btn1'>S'inscrire</a>
                                    <a href='form/dist/login.php' class='btn head-btn2'>Se connecter</a>
                                </div>");}

                    ?>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div class="col-12">
                <div class="mobile_menu d-block d-lg-none"></div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Header End -->
</header>
<main>

    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>detaille</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <?php if (isset($_GET['id']) && $_GET['id'] != null):?>
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="assets/img/icon/un-evenement.php" style="width: 100px " alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4><?= $detaileresulta['nom_event']?></h4>
                                    </a>
                                    <ul>
                                        <li</li>

                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- job single End -->

                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Description De L'Evenement</h4>
                                </div>
                                <p><?=$detaileresulta['description']?></p>
                            </div>
                            <div class="post-details2  mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">

                                </div>
                                <ul>

                                </ul>
                            </div>
                            <div class="post-details2  mb-50">
                                <!-- Small Section Tittle -->

                                <ul>

                            </div>
                        </div>
                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Evenement</h4>
                            </div>
                            <ul>
                                <li>Date : <span><?=$detaileresulta['date']?></span></li>
                                <li>Durée : <span><?=$detaileresulta['duree']?></span></li>
                                <li>Location : <span>New York</span></li>
                                <li>Nombre de place : <span>02</span></li>
                                <li>Salary :  <span>$7,800 yearly</span></li>
                            </ul>
                            <div class="apply-btn2">
                                <?php if ($_SESSION['role'] == "Eleve" || $_SESSION['role'] == "Entreprise"):?>
                                    <form action="traitement/action_utilisateur/action_eleve/postulez.php" method="post">
                                        <button name="postulez" type="submit" class="btn head-btn1" value="<?= $detaileresulta['id_event'] ?>">S'inscrire</button>
                                    </form>
                                <?php elseif ($_SESSION['id_utilisateur'] == $detaileresulta['ref_utilisateur'] || $_SESSION['role']=="Admin"):?>
                                    <form action="traitement/offre/creeoffre.php" method="post">
                                        <button type="submit" name="supprimer" value="<?= $detaileresulta['id_offre'] ?>" class="btn head-btn2">Supprimer</button>
                                    </form>
                                    <form action="profile.edit.php" method="post">
                                        <button name="modifieroffre" type="submit" value="<?= $detaileresulta['id_event'] ?>" class="btn head-btn1">Modifier</button>
                                    </form>
                                <?php elseif ($detaileresulta['ref_utilisateur'] != $_SESSION['id_utilisateur'] ):?>
                                    <button disabled  class="btn head-btn1">Modifier</button>
                                    <button disabled  class="btn head-btn2">Supprimer</button>
                                <?php endif;?>

                            </div>
                        </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;?>
    <!-- job post company End -->

</main>
<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-bg footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <div class="footer-tittle">
                                <h4>About Us</h4>
                                <div class="footer-pera">
                                    <p>Heaven frucvitful doesn't cover lesser dvsays appear creeping seasons so behold.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Contact Info</h4>
                            <ul>
                                <li>
                                    <p>Address :Your address goes
                                        here, your demo address.</p>
                                </li>
                                <li><a href="#">Phone : +8880 44338899</a></li>
                                <li><a href="#">Email : info@colorlib.com</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Important Link</h4>
                            <ul>
                                <li><a href="#"> View Project</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Testimonial</a></li>
                                <li><a href="#">Proparties</a></li>
                                <li><a href="#">Support</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Newsletter</h4>
                            <div class="footer-pera footer-pera2">
                                <p>Heaven fruitful doesn't over lesser in days. Appear creeping.</p>
                            </div>
                            <!-- Form -->
                            <div class="footer-form" >
                                <div id="mc_embed_signup">
                                    <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                          method="get" class="subscribe_form relative mail_part">
                                        <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                                               class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = ' Email Address '">
                                        <div class="form-icon">
                                            <button type="submit" name="submit" id="newsletter-submit"
                                                    class="email_icon newsletter-submit button-contactForm"><img src="assets/img/icon/form.png" alt=""></button>
                                        </div>
                                        <div class="mt-10 info"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="row footer-wejed justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <!-- logo -->
                    <div class="footer-logo mb-20">
                        <a href="index.php"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span>5000+</span>
                        <p>Talented Hunter</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span>451</span>
                        <p>Talented Hunter</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <!-- Footer Bottom Tittle -->
                    <div class="footer-tittle-bottom">
                        <span>568</span>
                        <p>Talented Hunter</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom area -->
    <div class="footer-bottom-area footer-bg">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-10 col-lg-10 ">
                        <div class="footer-copy-right">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <div class="footer-social f-right">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<script src="./assets/js/price_rangs.js"></script>

<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="./assets/js/jquery.scrollUp.min.js"></script>
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>

<!-- contact js -->
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>

</body>
</html>