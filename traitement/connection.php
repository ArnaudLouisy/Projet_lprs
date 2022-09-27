<?php
session_start();
require_once '../class/Eleves.php';
require_once '../class/Bdd.php';

$bdd = new Bdd();

$eleves = new Eleves (array(
    'email'=>$_POST['email'],
    'motdepasse'=>$_POST['motdepasse']
));
$res=$eleves->EleveConnexion($bdd);
if ($res){
    $_SESSION['id_eleves'] = $res['id_eleves'];
    $_SESSION['nom'] = $res['nom'];
    $_SESSION['prenom'] = $res['prenom'];
}