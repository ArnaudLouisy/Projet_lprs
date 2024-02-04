<?php
session_start();
require_once '../../../class/Materiele.php';
require_once '../../../class/Bdd.php';
$bdd = new Bdd();

$materiele = new Materiele(array(
    'nom' => strtoupper($_POST['nom']),
    'numerot' => ucfirst(strtolower($_POST['numero_serie'])),
    'description' => ucfirst($_POST['description']),
));

$materiele->creerMateriele($bdd);
header('Location: ../../../admin/admin.materiele.php');


