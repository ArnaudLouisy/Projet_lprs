<?php
session_start();
require_once '../class/Utilisateur.php';
require_once '../class/Bdd.php';

$bdd = new Bdd();
if (!empty($_POST[''])){

    if ($_POST['motdepasse'] == $_POST['mdpconfirme'] ){
        $utilisateur = new Utilisateur (array(
            'nom'=>strtoupper($_POST['nom']),
            'prenom'=>ucfirst(strtolower($_POST['prenom'])),
            'role' => 'eleves',
            'email'=>$_POST['email'],
            'motdepasse'=>$_POST['motdepasse'],
            'adresse'=>$_POST['adresse'],
            'domaineetude'=>$_POST['domaine'],
            'niveauetude'=>$_POST['niveau']
        ));
        $utilisateur->UtilisateurInscription($bdd);
    }else{
        $_SESSION['erreur'] = "les mots de passe ne sont pas identiques .";
        header('Location: ../form/dist/login.php');
    }

}else{
    $_SESSION['erreur'] = "Un champ est vide .";
    header('Location: ../form/dist/login.php');
}



