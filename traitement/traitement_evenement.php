<?php
include_once "./Bdd.php";
include "./Evenement.php";

$evenement = new evenement();
var_dump(GET);
        $evenement->creeunevenement($_GET["nom_event"], $_POST['description'], $_POST['date'], $_POST['heure'], $_POST['duree'], $_POST['nombre_inscrit'], $_POST['salle']);


