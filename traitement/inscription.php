<?php
session_start();
require_once '../class/Utilisateur.php';
require_once '../class/Bdd.php';

$bdd = new Bdd();
if ($_POST['motdepasse'] == $_POST['mdpconfirme'] ){
    $utilisateur = new Utilisateur (array(
    'nom'=>ucfirst(strtoupper($_POST['nom'])),
    'prenom'=>ucfirst($_POST['prenom']),
    'email'=>$_POST['email'],
    'motdepasse'=>$_POST['motdepasse'],
    'adresse'=>$_POST['adresse'],
    'domaineetude'=>$_POST['domaine'],
    'niveauetude'=>$_POST['niveau']
    ));
    $utilisateur->UtilisateurInscription($bdd);
}else{
    $_SESSION['erreurmotdepasse'] = "les mots de passe ne sont pas identiques .";
    header('Location: ../form/dist/login.php');
}


