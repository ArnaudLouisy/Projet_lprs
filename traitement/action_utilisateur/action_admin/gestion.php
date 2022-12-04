<?php
require_once '../../../class/Bdd.php';
$bdd = new Bdd();
if ($_POST['action']){
    $res=explode("_",$_POST['action']);
    if ($res[1]=="utilisateur"){
        require_once '../../../class/Utilisateur.php';
        $utilisateur = new Utilisateur(array(
            'idutilisateur'=>$res[0]
        ));
        $utilisateur->valider($bdd);
        header('Location: ../../../admin/admin.php');
    }elseif ($res[1]=='offre'){
        require_once '../../../class/Offre.php';
        $offre = new Offre(array(
            'idoffre'=>$res[0]
        ));
        $offre->valider($bdd);
        header('Location: ../../../admin/admin.offre.php');
    }elseif ($res[1]=='evenement'){
        require_once '../../../class/Evenement.php';
        $evenement = new Evenement(array(
            'idevent'=>$res[0],
        ));
        $evenement->valider($bdd);
        header('Location: ../../../admin/admin.evenement_form.php');
    }
}


