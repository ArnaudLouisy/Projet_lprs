<?php
session_start();
require_once 'class/Eleves.php';
require_once 'class/Bdd.php';
$bdd = new Bdd();
$eleve = new Eleves(array(
    'ideleves' => $_SESSION['id_eleves']
));
$profile=$eleve->profile($bdd)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile-modidification</title>
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

<div class="container">
  <div class="main-body">
    <div class="row">
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
              <div class="mt-3">
                <h4>John Doe</h4>
                <p class="text-secondary mb-1">Full Stack Developer</p>
                <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
              <?PHP
              if (isset($_SESSION['id_eleves'])){
                  echo ("
                  <div class='row mb-3'>
              <div class='col-sm-3'>
                <h6 class='mb-0'>Nom</h6>
              </div>
              <div class='col-sm-9 text-secondary'>
                <input type='text' class='form-control' value='".$profile['nom']."'>
              </div>
            </div>
            <div class='row mb-3'>
              <div class='col-sm-3'>
                <h6 class='mb-0'>Prenom</h6>
              </div>
              <div class='col-sm-9 text-secondary'>
                <input type='text' class='form-control' value='".$profile['prenom']."'>
              </div>
            </div>
            <div class='row mb-3'>
              <div class='col-sm-3'>
                <h6 class='mb-0'>Email</h6>
              </div>
              <div class='col-sm-9 text-secondary'>
                <input type='text' class='form-control' value='".$profile['email']."'>
              </div>
            </div>
            <div class='row mb-3'>
              <div class='col-sm-3'>
                <h6 class='mb-0'>Adresse</h6>
              </div>
              <div class='col-sm-9 text-secondary'>
                <input type='text' class='form-control' value='".$profile['adresse']."'>
              </div>
            </div>
            <div class='row mb-3'>
              <div class='col-sm-3'>
                <h6 class='mb-0'>Domaine Etudes</h6>
              </div>
              <div class='col-sm-9 text-secondary'>
                <input type='text' class='form-control' value='".$profile['domaine_etudes']."'>
              </div>
            </div>
            <div class='row mb-3'>
              <div class='col-sm-3'>
                <h6 class='mb-0'>Niveau Etudes</h6>
              </div>
              <div class='col-sm-9 text-secondary'>
                <input type='text' class='form-control' value='".$profile['niveau_etudes']."'>
              </div>
            </div>
                  ");
              }
              ?>

            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-9 text-secondary">
                <input type="button" class="btn btn-secondary px-4" value="Valider">
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