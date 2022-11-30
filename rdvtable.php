<?php
session_start();
require_once 'class/RendezVous.php';
require_once 'class/Bdd.php';

?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Espace admin</title>
    <link href="css/a.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
</ul>
</nav>
<div class="d-flex justify-content-center">

    <!-- form ajouter vol -->

    <form action="" method="POST" enctype="multipart/form-data" class="w-50">
        <br>
        <input type="date" name="date_depart" id="date_depart" class="form-control"  placeholder="date_depart" autocomplete="off">

        <input type="time" name="heure_depart" id="heure_depart" class="form-control"  placeholder="heure_depart " autocomplete="off">

        <input type="time" name="heure_arrivee" id="heure_arrivee" class="form-control"  placeholder="heure_arrivee " autocomplete="off">

        <input type="number" name="ref_pilote" id="ref_pilote" class="form-control"  placeholder="ref_pilote " autocomplete="off">

        <input type="number" name="ref_avion" id="ref_avion" class="form-control"  placeholder="ref_avion " autocomplete="off">

        <div class="d-flex justify-content-center">
            <input  type="submit"  class="btn btn-success" value="ajouter" name="ajouter">
        </div>
    </form>
    <?php
    $user =new RendezVous();

    if(
        isset($_POST['date']) &&
        isset($_POST['heure']) &&
        isset ($_POST['ref-offre'])

    )
    {
        if(
            !empty($_POST['date']) &&
            !empty($_POST['heure']) &&
            !empty($_POST['ref_offre'])
        )
        {
            // user is an object
            $user = new RendezVous(
                $_POST['date'],
                $_POST['heure'],
                $_POST['ref_offre']
            );

            // remplissage et ajout de les attribue  added in database
            $user->creerendezvous($user);
        }
        else
            $error = "Missing information";

    }
    ?>


</div>
<div class="card-body">
</div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i id="liste" class="fas fa-table mr-1"></i>
        Liste des Rendez-Vous
        <a style="position:absolute; right:4%;" href="exportProduit.php">export</a>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>date</th>
                    <th>heure</th>
                    <th>ref_offre</th>

                </tr>
                </thead>
                <tbody>
                <?php
                // afficher tous les produit dans une booucle

                foreach($listeUsers as $user) {
                    ?>

                    <tr>

                        <td><?php echo $user['date_depart'] ;?></td>
                        <td><?php echo $user['heure_depart'] ;?></td>
                        <td><?php echo $user['heure_arrivee'] ;?></td>
                        <td><?php echo $user['ref_pilote']; ?></td>
                        <td><?php echo $user['ref_avion']; ?></td>

                        <td>
                            <form method="POST" action="supprod.php">
                                <i class="fas fa-trash-alt btndelete"></i>	<input  type="submit" name="supprimer" value="supprimer">
                                <input type="hidden" value=<?PHP echo $user['ref_avion']; ?> name="idproduit">
                            </form>
                        </td>
                        <td><i class="fas fa-edit btnedit"></i>
                            <a href="update.php?ref_avion=<?PHP echo $user['ref_avion']; ?>">modifier</a>

                        </td>


                        <td>

                        </td>

                    </tr>
                <?php } ?>




                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2020</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>

<!-- Uncomment below if you wan to use dynamic maps -->
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-lg-3 col-md-4">

            <div class="info">
                <div>
                    <i class="bi bi-geo-alt"></i>
                    <p>A108 Adam Street<br>New York, NY 535022</p>

                </div>
            </div>




            </body>
            </html>
        </div>
