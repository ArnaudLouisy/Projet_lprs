<?php
session_start();
require_once '../class/Eleves.php';
require_once '../class/Bdd.php';

$bdd = new Bdd();

$eleves = new Eleves (array(
    'email'=>$_POST['email'],
    'motdepasse'=>$_POST['motdepasse']
));
$eleves->EleveConnexion($bdd);
if ($res){
    $_SESSION['id_eleve'] = $res['id_eleve'];
}
