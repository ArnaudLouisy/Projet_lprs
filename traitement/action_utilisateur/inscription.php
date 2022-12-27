<?php
session_start();
require_once '../../class/Utilisateur.php';
require_once '../../class/Bdd.php';

$bdd = new Bdd();
$validext = array('.jpg','.jpeg','.png','.gif');

$erreur = false;
foreach ($_POST as $value){
    if (empty($value)){
        $erreur = true;
        break;
    }
}

if (!$erreur) {
    if ($_POST['motdepasse'] == $_POST['mdpconfirme']) {
        $utilisateur = new Utilisateur (array(
            'nom' => strtoupper($_POST['nom']),
            'prenom' => ucfirst(strtolower($_POST['prenom'])),
            'role' => ucfirst($_POST['role']),
            'logo' => $_POST['photo'],
            'email' => $_POST['email'],
            'motdepasse' => $_POST['motdepasse'],
            'adresse' => $_POST['adresse'],
            'cp'=>$_POST['cp'],
            'ville'=>$_POST['ville'],
            'post'=>$_POST['post'],
            'domaineetude' => ucfirst(strtolower($_POST['domaine'])),
            'niveauetude' => strtoupper($_POST['niveau'])

        ));
        $utilisateur->UtilisateurInscription($bdd);
    }else{
        header('Location: ../../form/dist/inscription.php');
        $_SESSION['erreurmotdepasse'] = "Mot de passe non identique";
    }
}else{
    header('Location: ../../form/dist/inscription.php');
    $_SESSION['erreurinscription'] = "Un champ est vide";
}





