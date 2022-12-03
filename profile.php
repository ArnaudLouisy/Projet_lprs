<?php
session_start();
require_once 'class/Bdd.php';
require_once 'class/Utilisateur.php';
$bdd = new Bdd();
$utilisateur = new Utilisateur(array(
    'idutilisateur' => $_SESSION['id_utilisateur']
));
$profile=$utilisateur->profile($bdd)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/price_rangs.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

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
                    <!--session eleve-->
                    <?php if (isset($_SESSION['id_utilisateur']) && $_SESSION['role'] == "Eleve"){
                                    echo ("<div class='col-lg-9 col-md-9'>
                    <div class='menu-wrapper'>
                        <!-- Main-menu -->
                        <div class='main-menu'>
                            <nav class='d-none d-lg-block'>
                                <ul id='navigation'>
                                    <li><a href='index.php'>Accueil</a></li>
                                    <li><a href='job_listing.php'>Trouver un Jobs </a></li>
                                    <li><a href='crea.html'>Evénements</a></li>
                                    <li><a href='#'>Page</a>
                                        <ul class='submenu'>
                                            <li><a href='blog.html'>Blog</a></li>
                                            <li><a href='single-blog.html'>Blog Details</a></li>
                                            <li><a href='elements.html'>Elements</a></li>
                                            <li><a href='job_details.php'>job Details</a></li>
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
                                        <li><a href='crea.html'>Evénements</a></li>
                                        <li><a href='#'>Prospect</a>
                                            <ul class='submenu'>
                                                <li><a href='blog.html'>Blog</a></li>
                                                <li><a href='single-blog.html'>Blog Details</a></li>
                                                <li><a href='elements.html'>Elements</a></li>         
                                            </ul>
                                        </li>
                                        <li><a href='contact.html'>Contact</a></li>
                                        <li><a href='#'><img src='assets/img/icon/Profile.jpg' width='55'>" .$_SESSION['nom_entreprise']." ".$_SESSION['role_representant']. " </a>
                                        <ul class='submenu'>
                                            <li><a href='profile.php'>Profil</a></li>
                                            <li><a href='traitement/action_utilisateur/deco.php'>Se déconnecter <img src='assets/logout.jpg' width='20'></a></li>
                                        </ul>
                                    </li>
                                    </ul>
                                </nav>
                            </div>");}?>
                            </div>
                        </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
</header>

<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="assets/img/icon/Profile.jpg" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <?php
                                if(isset($_SESSION['id_utilisateur']) && $_SESSION['role'] == "Eleve"):
                                    echo ("<H4>".$_SESSION["nom"]." ".$_SESSION['prenom']."</h4>
                                           <p class='text-secondary mb-1'>Etudiant en ".$profile['domaine_etude']."</p>
                                           <p class='text-muted font-size-sm'>".$profile['adresse']." ".$profile['cp']." ".$profile['ville']."</p>
                                            ");
                                elseif(isset($_SESSION['id_utilisateur']) && $_SESSION['role'] == "Entreprise"):
                                    echo ("<H4>".$_SESSION['nom_entreprise']."</h4>
                                           <p class='text-secondary mb-1'>".$_SESSION['role_representant']." chez ".$_SESSION['nom_entreprise']."</p>
                                           <p class='text-muted font-size-sm'>".$_SESSION['adresse']."</p>
                                            ");
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                            <span class="text-secondary">https://bootdey.com</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                            <span class="text-secondary">bootdey</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                            <span class="text-secondary">@bootdey</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                            <span class="text-secondary">bootdey</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                            <span class="text-secondary">bootdey</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <?PHP
                        if(isset($_SESSION['id_utilisateur']) && $_SESSION['role'] == "Eleve"){
                            echo ("
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Nom</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                                ".$profile['nom']."
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>prenom</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                                ".$profile['prenom']."
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Email</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                                ".$profile['email']."
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Adresse</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                                ".$profile['adresse']."
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Ville</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                                ".$profile['ville']."
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Code postale</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                                ".$profile['cp']."
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Domaine Etudes</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                                ".$profile['domaine_etude']."
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Niveau Etudes</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                                ".$profile['niveau_etude']."
                            </div>
                        </div>
                        <hr>
                        ");}
                        elseif (isset($_SESSION['id_representant'])){
                            echo ("<div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Nom</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                                ".$_SESSION['nom_entreprise']."
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>prenom</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                                ".$_SESSION['role_representant']."
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Email</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                                ".$_SESSION['email']."
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Adresse</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                                ".$_SESSION['adresse']."
                            </div>
                        </div>
                        <hr>");
                        }
                        ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn head-btn1 " href="profile.edit.php">modifié</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>