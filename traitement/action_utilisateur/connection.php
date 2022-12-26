<?php
session_start();
require_once '../../class/Utilisateur.php';
require_once '../../class/Logs.php';
require_once '../../class/Bdd.php';

$bdd = new Bdd();

$eleves = new Utilisateur (array(
    'email'=>$_POST['email'],
    'motdepasse'=>$_POST['motdepasse']
));
$res=$eleves->UtilisateurConnexion($bdd);
$loge = new Logs(array(
    'refcompte'=>$res['id_utilisateur'],
    date_default_timezone_set('Europe/Paris'),
    'date'=>date("d-m-y" ),
    date_default_timezone_set('Europe/Paris'),
    'heure'=>date("H:i:s"),
    'adresseip'=>$_SERVER['REMOTE_ADDR']
));
$loge->logs($bdd);



