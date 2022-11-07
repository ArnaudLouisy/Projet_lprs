<?php
require_once '../class/Bdd.php';
require_once '../class/RendezVous.php';


$bdd = new Bdd();
$rendezvous = new RendezVous (array(
    'date'=>$_POST['date'],
    'heure'=>$_POST['heure'],
    'ref_offre'=>$_POST['ref_offre']
));
$rendezvous->creerendezvous($bdd);
var_dump($_POST);