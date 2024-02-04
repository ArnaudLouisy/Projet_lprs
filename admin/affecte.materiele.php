<?php
session_start();
require_once '../class/Materiele.php';
require_once '../class/Bdd.php';
$bdd = new Bdd();
$materiele = new Materiele(array());
$materielevue = $materiele->voirMateriele($bdd);
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
                            <a class="nav-link active" href="admin.salle.cree.php">Salle</a>
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

    <?php if (isset($_POST['modif']) && $_POST['modif']!=null):?>

        <div class="container ">
            <h4> Modification de Materiele </h4>
            <form action="../traitement/action_utilisateur/action_admin/affecter.php" method="post">
                <div class="mb-3 col-3">
                    <label for="exampleInputPassword1" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" value="<?=$lasalle['nom_salle']?>" id="exampleInputPassword1">
                </div>
                <div class="mb-3 col-3">
                    <label for="exampleInputPassword1" class="form-label">Nombre de place</label>
                    <input type="number" name="nombre_place" class="form-control" value="<?=$lasalle['nombre_place']?>"id="exampleInputPassword1">
                </div>
                <div class="mb-3 col-3">
                    <label for="exampleInputPassword1" class="form-label">Adresse</label>
                    <input type="text" name="adresse" class="form-control" value="<?=$lasalle['adresse']?>" id="exampleInputPassword1">
                </div>
                <div class="mb-3 col-3">
                    <label for="exampleInputPassword1" class="form-label">Code postal</label>
                    <input type="number" name="cp" class="form-control" value="<?=$lasalle['cp']?>" id="exampleInputPassword1">
                </div>
                <div class="mb-3 col-3">
                    <label for="exampleInputPassword1" class="form-label">Ville</label>
                    <input type="text" name="ville" class="form-control" value="<?=$lasalle['ville']?>" id="exampleInputPassword1">
                </div>
                <button type="submit" name="modifier" value="<?=$lasalle['id_salle']?>">Modifier</button>
            </form>
        </div>

    <?php else:?>
        <div class="container ">
            <h4> Affecté Materele </h4>
            <form action="../traitement/action_utilisateur/action_admin/ajoutMateriele.php" method="post">
                <div class="mb-3 col-3">
                    <label for="exampleInputPassword1" class="form-label"></label>
                    <input type="text" name="nom" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 col-3">
                    <label for="exampleInputPassword1" class="form-label">Materiele</label>
                    <select name="materiele" >
                        <?php foreach ($materielevue as $value):?>
                        <option value="<?=$value['id']?>"> <?=$value['nom']?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <input type="submit" name="valider" value="Valider">

            </form>
        </div>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="../assets/js/js.data.js"></script>
    </body>
    </html>
<?php else:?>

<?php endif; ?>
