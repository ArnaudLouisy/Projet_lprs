<?php
session_start();
require_once '../../class/Utilisateur.php';
require_once '../../class/File.php';
require_once '../../class/Bdd.php';

$bdd = new Bdd();

$erreur = false;
foreach ($_POST as $value){
    if (empty($value)){
        $erreur = true;
        break;
    }
}
if (!$erreur) {
    if ($_POST['motdepasse'] == $_POST['mdpconfirme']) {
        if (isset($_FILES['photo'])){
            $nameFile = $_FILES['photo']['name'];
            $sizeFile = $_FILES['photo']['size'];
            $typeFile = $_FILES['photo']['type'];
            $tmpFile = $_FILES['photo']['tmp_name'];
            $erreurFile = $_FILES['photo']['error'];

            $photo = new File($nameFile,$sizeFile,$typeFile,$erreurFile,$tmpFile);
            $nom = $photo ->fileChequ();
        }else{
            $nom = 'assets/img/icon/Profile.jpg';
        }
        $utilisateur = new Utilisateur (array(
            'nom' => strtoupper($_POST['nom']),
            'prenom' => ucfirst(strtolower($_POST['prenom'])),
            'role' => ucfirst($_POST['role']),
            'logo' => $nom,
            'email' => $_POST['email'],
            'motdepasse' => password_hash($_POST['motdepasse'],PASSWORD_DEFAULT),
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





