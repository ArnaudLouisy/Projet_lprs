<?php
session_start();
require_once '../../class/Bdd.php';
require_once '../../class/Evenement.php';
$bdd = new Bdd();
var_dump($_POST);
if (isset($_POST['valider']) && $_POST['valider'] != null){
    $evenement = new Evenement (array(
        'idevent'=>$_POST['valider'],
        'nomevent'=>$_POST['nom_event'],
        'description'=>$_POST['description'],
        'date'=>$_POST['date'],
        'heure'=>$_POST['heure'],
        'duree'=>$_POST['duree'],
    ));
    $evenement->modifierevenement($bdd);
}
