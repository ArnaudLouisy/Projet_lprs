<?php
session_start();
require_once '../../class/Bdd.php';
require_once '../../class/Evenement.php';
$bdd = new Bdd();
if (isset($_POST['creer'])){
    $evenement = new Evenement (array(
        'nomevent'=>$_POST['nom_event'],
        'description'=>$_POST['description'],
        'date'=>$_POST['date'],
        'heure'=>$_POST['heure'],
        'duree'=>$_POST['duree'],
        'nombreinscrit'=>$_POST['nombre_inscrit']
    ));


var_dump($_POST,$evenement);
$evenement->creeunevenement($bdd);
}


