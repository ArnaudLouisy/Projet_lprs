<?php
session_start();
require_once '../../../class/Bdd.php';
require_once '../../../class/Postule.php';
$bdd = new Bdd();
$postulez = new Postule(array(
    'refutilisateur'=>$_SESSION['id_utilisateur'],
    'refoffre'=>$_POST['postulez']
));
$postulez->Postulez($bdd);
header('Location: ../../../index.php');
