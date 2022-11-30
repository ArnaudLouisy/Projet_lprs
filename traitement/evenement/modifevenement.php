<?php
session_start();
require_once '../../class/Bdd.php';
require_once '../../class/Evenement.php';

$bdd = new Bdd();
if (isset($_POST['modifier'])){
    $evenement = new Evenement (array(
        'idevent'=>$_POST['id_event'],
        'nomevent'=>$_POST['nom_event'],
        'description'=>$_POST['description'],
        'date'=>$_POST['date'],
        'heure'=>$_POST['heure'],
        'duree'=>$_POST['duree'],
        'nombreinscrit'=>$_POST['nombre_inscrit']
    ));


    var_dump($_POST,$evenement);
    $evenement->modifierevenement($bdd);
}

