<?php
require_once '../class/Eleves.php';
require_once '../class/Bdd.php';

$bdd = new Bdd();

$eleves = new Eleves (array(
    'nom'=>ucfirst(strtoupper($_POST['nom'])),
    'prenom'=>ucfirst($_POST['prenom']),
    'email'=>$_POST['email'],
    'motdepasse'=>$_POST['motdepasse'],
    'adresse'=>$_POST['adresse'],
    'domaineetude'=>$_POST['domaine'],
    'niveauetude'=>$_POST['niveau']

));

$eleves->EleveInscription($bdd);

