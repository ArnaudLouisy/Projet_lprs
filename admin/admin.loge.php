<?php
session_start();
require_once '../class/Logs.php';
require_once '../class/Bdd.php';
$bdd = new Bdd();
$logs = new Logs(array());
$logsvue = $logs->VoireLoge($bdd);
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
                        <a class="nav-link active" href="admin.entreprise.php">Salle</a>
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
    <h1>Logs</h1>
    <div class="row">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>Id_utilisateur</th>
                <th>Date et heure</th>
                <th>Adresse ip</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($logsvue as $value){
                echo "<tr>
            <td>".$value['id_compte']."</td>
            <td>".$value['date']."</td>
            <td>".$value['adresse_ip']."</td>
            </td>
            </tr>";};?>
            </tbody>
            <tfoot>
            <tr>
                <th>Id_utilisateur</th>
                <th>Date</th>
                <th>Adresse ip</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script src="../assets/js/js.data.js"></script>
</body>
</html>
