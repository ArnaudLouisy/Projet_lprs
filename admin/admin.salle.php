<?php
session_start();
require_once '../class/Salle.php';
require_once '../class/Bdd.php';
$bdd = new Bdd();
$salle = new Salle(array());
$sallevue = $salle->voirSalle($bdd);
?>
<?php if (isset($_SESSION["role"])&&($_SESSION["role"]==='Admin')): ?>
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
                        <a class="nav-link active" href="admin.salle.php">Salle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin.materiele.php">Materiele</a>
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
    <div class="m-2"  >
        <h1 class="col-3">Salle</h1>
        <a href="admin.salle.cree.php"><button class="btn head-btn2 border border-dark border-"> Cree une salle</button></a>
        </br>
    </div>

    <div class="row">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>Id_salle</th>
                <th>Nom</th>
                <th>Nombre de place</th>
                <th>Adresse</th>
                <th>Gére</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($sallevue as $value):?>

            <tr>
            <td><?=$value['id_salle']?></td>
            <td><?=$value['nom_salle']?></td>
            <td><?=$value['nombre_place']?></td>
            <td><?=$value['adresse'].",".$value['ville']." ".$value['cp']?></td>
            <td>
                <div class="input-group mb-3"><form action='admin.salle.cree.php' method='post'>
                     <button type="submit" class="btn btn-outline-secondary" name="modif" value="<?=$value['id_salle']?>">Modifier</button></form>

                <form action='../traitement/action_utilisateur/action_admin/affecter.php' method='post'><button type='submit'  class='btn btn-outline-secondary' name='supprime' value="<?=$value['id_salle']?>"><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                    <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                </svg></button>
                </form></div>
            </td>
            </tr><?php endforeach;?>
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
<?php else:?>

<?php endif; ?>