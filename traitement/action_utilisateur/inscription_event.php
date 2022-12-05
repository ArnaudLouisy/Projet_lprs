<?php
session_start();
require_once '../../class/Bdd.php';
require_once '../../class/Inscription.php';
$bdd = new Bdd();
$inscrire = new Inscription(array(
    'refutilisateur' => $_SESSION['id_utilisateur'],
    'refevent' => $_POST['inscrire']
));
$inscrire->inscrire($bdd);
header('Location: ../../../index.php');
