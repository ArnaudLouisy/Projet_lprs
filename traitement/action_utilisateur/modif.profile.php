<?php
session_start();
require_once '../../class/Utilisateur.php';
require_once '../../class/File.php';
require_once '../../class/Bdd.php';
$bdd = new Bdd();

$res = explode('_',$_POST['valider']);


if (isset($_POST['valider']) && $res[1]=='entreprise' || $res[1]=='eleve'){
    if (isset($_FILES['photo'])&& $_FILES['photo']!=null) {
        $nameFile = $_FILES['photo']['name'];
        $sizeFile = $_FILES['photo']['size'];
        $typeFile = $_FILES['photo']['type'];
        $tmpFile = $_FILES['photo']['tmp_name'];
        $erreurFile = $_FILES['photo']['error'];

        $photo = new File($nameFile, $sizeFile, $typeFile, $erreurFile, $tmpFile);
        $nom = $photo->fileChequ();
    }else {
        $nom = $_SESSION['photo'];
    }
    if ($res[1]=='entreprise'){
        $utilisateur = new Utilisateur(array(
            'idutilisateur' => $_SESSION['id_utilisateur'],
            'nom' => strtoupper($_POST['nom']),
            'logo' => $nom,
            'email' => $_POST['email'],
            'adresse' => $_POST['adresse'],
            'cp'=>$_POST['cp'],
            'ville'=>$_POST['ville'],
            'post'=>$_POST['post'],
            'prenom'=>null,
            'domaineetude' => null,
            'niveauetude' => null));
        $utilisateur->modifiProfile($bdd);
    }elseif ($res[1]=='eleve'){
        $utilisateur = new Utilisateur(array(
            'idutilisateur' => $_SESSION['id_utilisateur'],
            'nom' => strtoupper($_POST['nom']),
            'logo' => $nom,
            'email' => $_POST['email'],
            'adresse' => $_POST['adresse'],
            'cp'=>$_POST['cp'],
            'ville'=>$_POST['ville'],
            'post'=>null,
            'prenom'=>$_POST['prenom'],
            'domaineetude' => $_POST['domaine'],
            'niveauetude' => $_POST['niveau']));
        $utilisateur->modifiProfile($bdd);
    }

}