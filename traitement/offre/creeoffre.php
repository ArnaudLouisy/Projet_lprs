<?php
session_start();
require_once '../../class/Bdd.php';
require_once '../../class/Offre.php';
$bdd = new Bdd();
$offre = new Offre (array(
    'titreoffre'=>$_POST['titreoffre'],
    'description'=>$_POST['description'],
    'typecontrat'=>$_POST['typecontrat'],
    'durecontrat'=>$_POST['durecontrat'],
    'refrepresentant'=>$_SESSION['id_representant']
));

$offre->ajouteroffre($bdd);
die();
header('Location: ../../index.php');