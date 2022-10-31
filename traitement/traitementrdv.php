<?php
require_once '../class/Entreprise.php';
require_once '../class/Eleves.php';
require_once '../class/Bdd.php';

$bdd = new Bdd();
$rendezvous = new RendezVous (array(
    'date'=>$_POST['date'],
    'heure'=>$_POST['heure'],
    'ref_offre'=>$_POST['ref_offre']
));