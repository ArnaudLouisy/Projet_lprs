<?php
session_start();
require_once '../../class/Utilisateur.php';
require_once '../../class/Logs.php';
require_once '../../class/Bdd.php';

$bdd = new Bdd();
if (!empty($_POST['email']) && !empty($_POST['motdepasse'])){

    $eleves = new Utilisateur (array(
        'email'=>$_POST['email'],
        'motdepasse'=>$_POST['motdepasse']
    ));
    $res=$eleves->UtilisateurConnexion($bdd);
    if (isset($_POST['remenber'])){
        //conexion persistante
        $user = null;
        setcookie('user_id',$user->$res['id_utilisateur'],time() + 3600 * 24 * 3 , '/','localhost',false,true);
    }

    $loge = new Logs(array(
        'refcompte'=>$res['id_utilisateur'],
        date_default_timezone_set('Europe/Paris'),
        'date'=>date("d-m-y" ),
        date_default_timezone_set('Europe/Paris'),
        'heure'=>date("H:i:s"),
        'adresseip'=>$_SERVER['REMOTE_ADDR']
    ));
    $loge->logs($bdd);
}else{
    header('Location: ../../form/dist/login.php');
    $_SESSION['erreurconnexion'] = "Un champ est vide";
}




