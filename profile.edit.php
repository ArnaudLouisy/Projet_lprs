<?php
session_start();
require_once 'class/Utilisateur.php';
require_once 'class/Bdd.php';
$bdd = new Bdd();
$utilisateur = new Utilisateur(array(
    'idutilisateur' => $_SESSION['id_utilisateur']
));
$profile=$utilisateur->profile($bdd);
if (isset($_POST['modifieroffre']) && $_POST['modifieroffre'] != null){
    require_once 'class/Offre.php';
    $offre = new Offre(array(
        'idoffre'=> $_POST['modifieroffre']
    ));
    $afficheoffre = $offre->offredetaile($bdd);
}
elseif (isset($_POST['modifierevent']) && $_POST['modifierevent'] != null){
    require_once 'class/Evenement.php';
    $evenement = new Evenement(array(
        'idevent'=> $_POST['modifierevent']
    ));
    $afficheevent = $evenement->voirUnEvenement($bdd);
}

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
<?PHP if (isset($_SESSION['id_utilisateur']) && $_SESSION['role'] == "Eleve"):?>
<div class="container">
  <div class="main-body">
    <div class="row">
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="assets/img/icon/Profile.jpg" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
              <div class="mt-3">
                <h4><?=$profile['nom']." ".$profile['prenom']?></h4>
                <p class="text-secondary mb-1">Etudiant en <?=$profile['domaine_etude']?> </p>
                <p class="text-muted font-size-sm"><?=$profile['adresse']." ".$profile['cp']." ".$profile['ville']?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <form action="traitement/action_utilisateur/modif.profile.php" method="post">
          <div class="col-lg-8">
              <div class="card">
                  <div class="card-body">
                      <div class='row mb-3'>
                          <div class='col-sm-3'>
                              <h6 class='mb-0'>Nom</h6>
                          </div>
                          <div class='col-sm-9 text-secondary'>
                              <input name="nom" type='text' class='form-control' value='<?=$profile['nom']?>'>
                          </div>
                      </div>
                      <div class='row mb-3'>
                          <div class='col-sm-3'>
                              <h6 class='mb-0'>Prenom</h6>
                          </div>
                          <div class='col-sm-9 text-secondary'>
                              <input name="prenom" type='text' class='form-control' value='<?=$profile['prenom']?>'>
                          </div>
                      </div>
                      <div class='row mb-3'>
                          <div class='col-sm-3'>
                              <h6 class='mb-0'>Email</h6>
                          </div>
                          <div class='col-sm-9 text-secondary'>
                              <input name="email" type='email' class='form-control' value='<?=$profile['email']?>'>
                          </div>
                      </div>
                      <div class='row mb-3'>
                          <div class='col-sm-3'>
                              <h6 class='mb-0'>Adresse</h6>
                          </div>
                          <div class='col-sm-9 text-secondary'>
                              <input name="adresse" type='text' class='form-control' value='<?=$profile['adresse']?>'>
                          </div>
                      </div>
                      <div class='row mb-3'>
                          <div class='col-sm-3'>
                              <h6 class='mb-0'>Ville</h6>
                          </div>
                          <div class='col-sm-9 text-secondary'>
                              <input name="ville" type='text' class='form-control' value='<?=$profile['ville']?>'>
                          </div>
                      </div>
                      <div class='row mb-3'>
                          <div class='col-sm-3'>
                              <h6 class='mb-0'>Code postale</h6>
                          </div>
                          <div class='col-sm-9 text-secondary'>
                              <input name="cp" type='text' class='form-control' value='<?=$profile['cp']?>'>
                          </div>
                      </div>
                      <div class='row mb-3'>
                          <div class='col-sm-3'>
                              <h6 class='mb-0'>Domaine Etudes</h6>
                          </div>
                          <div class='col-sm-9 text-secondary'>
                              <input name="domaine" type='text' class='form-control' value='<?=$profile['domaine_etude']?>'>
                          </div>
                      </div>
                      <div class='row mb-3'>
                          <div class='col-sm-3'>
                              <h6 class='mb-0'>Niveau Etudes</h6>
                          </div>
                          <div class='col-sm-9 text-secondary'>
                              <input name="niveau" type='text' class='form-control' value='<?=$profile['niveau_etude']?>'>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-3"></div>
                          <div class="col-sm-9 text-secondary">
                              <button name="valider" type="button" class="btn btn-secondary px-4" value="<?=$profile['id_utilisateur']?>">Valider</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </form>
    </div>
  </div>
</div>
<?php endif;?>

<?PHP if (isset($_SESSION['id_utilisateur']) && $_SESSION['role'] == "Entreprise"):?>
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="assets/img/icon/Profile.jpg" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <h4><?=$profile['nom']." ".$profile['prenom']?></h4>
                                    <p class="text-secondary mb-1">Poste de <?=$profile['poste']?> </p>
                                    <p class="text-muted font-size-sm"><?=$profile['adresse']." ".$profile['cp']." ".$profile['ville']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="traitement/action_utilisateur/modif.profile.php" method="post">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class='row mb-3'>
                                    <div class='col-sm-3'>
                                        <h6 class='mb-0'>Nom</h6>
                                    </div>
                                    <div class='col-sm-9 text-secondary'>
                                        <input name="nom" type='text' class='form-control' value='<?=$profile['nom']?>'>
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <div class='col-sm-3'>
                                        <h6 class='mb-0'>Poste</h6>
                                    </div>
                                    <div class='col-sm-9 text-secondary'>
                                        <input name="prenom" type='text' class='form-control' value='<?=$profile['poste']?>'>
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <div class='col-sm-3'>
                                        <h6 class='mb-0'>Email</h6>
                                    </div>
                                    <div class='col-sm-9 text-secondary'>
                                        <input name="email" type='email' class='form-control' value='<?=$profile['email']?>'>
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <div class='col-sm-3'>
                                        <h6 class='mb-0'>Adresse</h6>
                                    </div>
                                    <div class='col-sm-9 text-secondary'>
                                        <input name="adresse" type='text' class='form-control' value='<?=$profile['adresse']?>'>
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <div class='col-sm-3'>
                                        <h6 class='mb-0'>Ville</h6>
                                    </div>
                                    <div class='col-sm-9 text-secondary'>
                                        <input name="ville" type='text' class='form-control' value='<?=$profile['ville']?>'>
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <div class='col-sm-3'>
                                        <h6 class='mb-0'>Code postale</h6>
                                    </div>
                                    <div class='col-sm-9 text-secondary'>
                                        <input name="cp" type='text' class='form-control' value='<?=$profile['cp']?>'>
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <div class='col-sm-3'>
                                        <h6 class='mb-0'>Lien vers votre logo</h6>
                                    </div>
                                    <div class='col-sm-9 text-secondary'>
                                        <input name="domaine" type='text' class='form-control' value='<?=$profile['logo']?>'>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <button name="valider" type="button" class="btn btn-secondary px-4" value="<?=$profile['id_utilisateur']?>">Valider</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif;?>

<?PHP if (isset($_POST['modifieroffre']) && $_POST['modifieroffre'] != null && isset($_SESSION['id_utilisateur']) && $_SESSION['role'] == "Entreprise"):?>
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="assets/img/icon/Profile.jpg" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <h4><?=$profile['nom']." ".$profile['poste']?></h4>
                                    <p class="text-secondary mb-1">Modification de l'offre <?=$afficheoffre['titre_offre']?> </p>
                                    <p class="text-muted font-size-sm"><?=$profile['adresse']." ".$profile['cp']." ".$profile['ville']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="traitement/action_utilisateur/modif.profile.php" method="post">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class='row mb-3'>
                                    <div class='col-sm-3'>
                                        <h6 class='mb-0'>Titre offre</h6>
                                    </div>
                                    <div class='col-sm-9 text-secondary'>
                                        <input name="titre_offre" type='text' class='form-control' value='<?=$afficheoffre['titre_offre']?>'>
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <div class='col-sm-3'>
                                        <h6 class='mb-0'>Description</h6>
                                    </div>
                                    <div class='col-sm-9 text-secondary'>
                                        <input name="description" type='text' class='form-control' value='<?=$afficheoffre['description']?>'>
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <div class='col-sm-3'>
                                        <h6 class='mb-0'>Type de contrat</h6>
                                    </div>
                                    <div class='col-sm-9 text-secondary'>
                                        <input name="type_contrat" type='text' class='form-control' value='<?=$afficheoffre['type_contrat']?>'>
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <div class='col-sm-3'>
                                        <h6 class='mb-0'>durée du contrat</h6>
                                    </div>
                                    <div class='col-sm-9 text-secondary'>
                                        <input name="dure_contrat" type='text' class='form-control' value='<?=$afficheoffre['dure_contrat']?>'>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <button name="valider" type="button" class="btn btn-secondary px-4" value="<?=$profile['id_utilisateur']?>">Valider</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif;?>

<?PHP if (isset($_POST['modifierevnt']) && $_POST['modifierevnt'] != null && isset($_SESSION['id_utilisateur'])):?>
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="assets/img/icon/Profile.jpg" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <h4><?=$profile['nom']." ".$profile['poste']?></h4>
                                    <p class="text-secondary mb-1">Modification de l'offre <?=$afficheoffre['titre_offre']?> </p>
                                    <p class="text-muted font-size-sm"><?=$profile['adresse']." ".$profile['cp']." ".$profile['ville']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="traitement/action_utilisateur/modif.profile.php" method="post">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class='row mb-3'>
                                    <div class='col-sm-3'>
                                        <h6 class='mb-0'>Titre evenement</h6>
                                    </div>
                                    <div class='col-sm-9 text-secondary'>
                                        <input name="nom_event" type='text' class='form-control' value='<?=$afficheevent['nom_event']?>'>
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <div class='col-sm-3'>
                                        <h6 class='mb-0'>Description</h6>
                                    </div>
                                    <div class='col-sm-9 text-secondary'>
                                        <input name="description" type='text' class='form-control' value='<?=$afficheoffre['description']?>'>
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <div class='col-sm-3'>
                                        <h6 class='mb-0'>Type de contrat</h6>
                                    </div>
                                    <div class='col-sm-9 text-secondary'>
                                        <input name="type_contrat" type='text' class='form-control' value='<?=$afficheoffre['type_contrat']?>'>
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <div class='col-sm-3'>
                                        <h6 class='mb-0'>durée du contrat</h6>
                                    </div>
                                    <div class='col-sm-9 text-secondary'>
                                        <input name="dure_contrat" type='text' class='form-control' value='<?=$afficheoffre['dure_contrat']?>'>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <button name="valider" type="button" class="btn btn-secondary px-4" value="<?=$profile['id_utilisateur']?>">Valider</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif;?>
</body>
</html>