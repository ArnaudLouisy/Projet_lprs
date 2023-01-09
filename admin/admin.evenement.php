<?php
session_start();
require_once '../class/Evenement.php';
require_once '../class/Salle.php';
require_once '../class/Bdd.php';
$bdd = new Bdd();
$salle = new Salle(array());
$lessalle = $salle->voirSalle($bdd);
$even = new Evenement(array());
$evenement = $even->EvenementNonValide($bdd);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">

    <!-- CSS here -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/price_rangs.css">
    <link rel="stylesheet" href="../assets/css/flaticon.css">
    <link rel="stylesheet" href="../assets/css/slicknav.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/slick.css">
    <link rel="stylesheet" href="../assets/css/nice-select.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>

<body>

<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin.php">Utilisateur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin.salle.php">Salle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin.evenement.php">Evenement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin.offre.php">Emploi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin.loge.php">Logs</a>
                    </li>
                    <a class="nav-link active" href="../traitement/action_utilisateur/deco.php">Deco </a>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container">
    <h1>Evenement</h1>
    <div class="row">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>Numéro</th>
                <th>Titre</th>
                <th>Date</th>
                <th>Durée</th>
                <th>Géré</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($evenement as $value):?>
            <tr>
            <td><?=$value['id_event']?></td>
            <td><?=$value['nom_event']?></td>
            <td><?=$value['date']?></td>
            <td><?=$value['duree']?></td>
            <td>
                <form action='../traitement/action_utilisateur/action_admin/gestion.php' method='post'>
                     <div class="input-group mb-3">
                         <select class="js-example-basic-single" name="salle" id="salle">
                             <option value="0">--Selectionez une salle--</option>
                             <?php foreach ($lessalle as $valeur): ?>
                             <option value="<?=$valeur['id_salle'].'_'.$valeur['nombre_place']?>"><?=$valeur['nom_salle']?></option>
                             <?php endforeach;?>
                         </select>
                         <button class="btn btn-outline-secondary" name="valider" type="submit" value="<?=$value['id_event']?>" id="button-addon2">Button</button>
                         <button type='submit'  class='btn btn-outline-secondary' name='supprime' value=".$value['id_event']."_evenement"."><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                             <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                             <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                         </svg></button>
                     </div>
                </form>
              
            </td>
            </tr><?php endforeach;?>
            </tbody>
            <tfoot>
            <tr>
                <th>Numéro</th>
                <th>nom</th>
                <th>Poste</th>
                <th>Email</th>
                <th>Géré</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script src="../assets/js/js.data.js"></script>
</body>
</html>
