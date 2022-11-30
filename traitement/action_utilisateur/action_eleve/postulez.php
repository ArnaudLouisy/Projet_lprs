<?php
session_start();
require_once '../../../class/Bdd.php';
require_once '../../../class/Postule.php';
$bdd = new Bdd();
$postulez = new Postule(array(
    'idutilisateur'=>$_SESSION['id_utilisatue'],
    'idoffre'=>$_POST['postulez']
));
