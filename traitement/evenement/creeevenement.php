<?php
session_start();
require_once '../../class/Bdd.php';
require_once '../../class/Evenement.php';
$bdd = new Bdd();
if (isset($_POST['creer']) && $_POST['creer'] != null){
    $evenement = new Evenement (array(
        'nomevent'=>$_POST['nom_event'],
        'description'=>$_POST['description'],
        'date'=>$_POST['date'],
        'heure'=>$_POST['heure'],
        'duree'=>$_POST['duree'],
        'refutilisateur' => $_SESSION['id_utilisateur']
    ));
$evenement->creeunevenement($bdd);
}
header('Location: ../../index.php');

