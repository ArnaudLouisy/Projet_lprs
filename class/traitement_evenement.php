<?php
include_once "./Bdd.php";
include "./Evenement.php";

$evenement = new evenement();
$error = "";


if (
    isset($_POST['nom_event']) &&
    isset($_POST['description']) &&
    isset ($_POST['date']) &&
    isset($_POST['heure']) &&
    isset($_POST['duree']) &&
    isset($_POST['nombre_inscrit']) &&
    isset($_POST['salle'])
) {
    if (
        !empty($_POST['nom_event']) &&
        !empty($_POST['description']) &&
        !empty($_POST['date']) &&
        !empty($_POST['heure']) &&
        !empty($_POST['duree']) &&
        !empty($_POST['nombre_inscrit']) &&
        !empty($_POST['salle'])
    ) {

        $evenement->creeunevenement($_POST['nom_event'], $_POST['description'], $_POST['date'], $_POST['heure'], $_POST['duree'], $_POST['nombre_inscrit'], $_POST['salle']);
    } else
        $error = "Missing information";
}
