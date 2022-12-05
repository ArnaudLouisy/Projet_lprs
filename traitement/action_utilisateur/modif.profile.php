<?php
session_start();
require_once 'class/Utilisateur.php';
require_once 'class/Bdd.php';
$bdd = new Bdd();
$utilisateur = new Utilisateur(array(
    'idutilisateur' => $_SESSION['id_utilisateur']
));
$utilisateur->modifiProfile($bdd);

