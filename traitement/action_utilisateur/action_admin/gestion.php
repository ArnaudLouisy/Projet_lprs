<?php
require_once '../../../class/Bdd.php';
$bdd = new Bdd();
var_dump($_POST);

if (isset($_POST['action'])){
    $res=explode("_",$_POST['action']);
    if ($res[1]=="utilisateur"){
        require_once '../../../class/Utilisateur.php';
        $utilisateur = new Utilisateur(array(
            'idutilisateur'=>$res[0]
        ));
        header('Location: ../../../admin/admin.php');
        $utilisateur->valider($bdd);
        header('Location: ../../../admin/admin.php');
    }elseif ($res[1]=='offre'){
        require_once '../../../class/Offre.php';
        $offre = new Offre(array(
            'idoffre'=>$res[0]
        ));
        $offre->valider($bdd);
        header('Location: ../../../admin/admin.offre.php');
    }
}elseif (isset($_POST['supprime'])){
    $res=explode("_",$_POST['supprime']);

    if($res[1]=='utilisateur'){
        require_once '../../../class/Utilisateur.php';
        $utilisateur = new Utilisateur(array(
            'idutilisateur'=>$res[0]
        ));
        $utilisateur->supprimer($bdd);
        header('Location: ../../../admin/admin.php');
    }elseif ($res[1]=='offre'){
        require_once '../../../class/Offre.php';
        $offre = new Offre(array(
            'idoffre'=>$res[0]
        ));
        $offre->supprimeroffre($bdd);
        header('Location: ../../../admin/admin.offre.php');
    }elseif ($res[1]=='evenement'){
        require_once '../../../class/Evenement.php';
        $evenement = new Evenement(array(
            'idevent'=>$res[0],
        ));
        $evenement->supprimerevenemnt($bdd);
        header('Location: ../../../admin/admin.evenement.php');
    }
}elseif (isset($_POST['valider']) && $_POST['valider'] != null){
    require_once '../../../class/Evenement.php';
    $salle = explode('_',$_POST['salle']);
    $evenement = new Evenement(array(
        'idevent'=>$_POST['valider'],
        'refsalle'=>$salle[0],
        'nombreinscrit'=>$salle[1]
    ));
    $evenement->validerEtAffectezSalle($bdd);
    header('Location: ../../../admin/admin.evenement.php');
}


