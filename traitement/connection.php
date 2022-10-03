<?php
session_start();
require_once '../class/Eleves.php';
require_once '../class/Entreprise.php';
require_once '../class/Bdd.php';

$bdd = new Bdd();

$eleves = new Eleves (array(
    'email'=>$_POST['email'],
    'motdepasse'=>$_POST['motdepasse']
));
$res=$eleves->EleveConnexion($bdd);
var_dump($res);
exit();
die();
if ($res){

}
elseif ($res == null){
    $entreprise = new Entreprise(array(
        'email'=>$_POST['email'],
        'motdepasse'=>$_POST['motdepasse']
    ));
    $ent = $entreprise->EntrepriseConnexion($bdd);
    if ($ent){
        $_SESSION['id_eleves'] = $ent['id_eleves'];
        $_SESSION['nom'] = $ent['nom'];
        $_SESSION['prenom'] = $ent['prenom'];
    }
}