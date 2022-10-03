<?php
session_start();
require_once '../class/Utilisateur.php';
require_once '../class/Logs.php';
require_once '../class/Bdd.php';

$bdd = new Bdd();

$eleves = new Utilisateur (array(
    'email'=>$_POST['email'],
    'motdepasse'=>$_POST['motdepasse']
));
$res=$eleves->UtilisateurConnexion($bdd);

$loge = new Logs(array(
    'idcompte'=>$res['id_eleves'],
    'date'=>setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro'),
    'heure'=>date("H:i:s"),
    'adresseip'=>$_SERVER['REMOTE_ADDR']
));
$loge->logs($bdd);



