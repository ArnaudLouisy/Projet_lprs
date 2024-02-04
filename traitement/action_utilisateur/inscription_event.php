<?php
session_start();
require_once '../../class/Bdd.php';
require_once '../../class/Inscription.php';
$bdd = new Bdd();
$sep = explode("_",$_POST['inscrire']);
$inscrire = new Inscription(array(
    'refutilisateur' => $_SESSION['id_utilisateur'],
    'refevent' => $sep['0'],
    'nbplace' =>$sep['1']
));
$inscrire->inscrire($bdd);
header('Location: ../../index.php');
