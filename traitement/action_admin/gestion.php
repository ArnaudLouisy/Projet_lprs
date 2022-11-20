<?php
require_once '../../class/Bdd.php';
$bdd = new Bdd();
if ($_POST['action']){
    $res=explode("_",$_POST['action']);
    if ($res[1]=='eleves'){
        require_once '../../class/Eleves.php';
        $eleve = new Eleves(array(
            'ideleves'=>$res[0]
        ));
        $eleve->valider($bdd);
    }elseif ($res[1]=='entreprise'){
        require_once '../../class/Entreprise.php';
        $entreprise = new Entreprise(array(
            'idrepresentant'=>$res[0]
        ));
        $entreprise->validerentreprise($bdd);
    }elseif ($res[1]=='offre'){
        require_once '../../class/Offre.php';
        $offre = new Offre(array(
            'idoffre'=>$res[0]
        ));
        $offre->valider($bdd);
    }elseif ($res[1]=='evenement'){
        require_once '../../class/Evenement.php';
        $evenement = new Evenement(array(
            'idevent'=>$res[0]
        ));
        $evenement->valider($bdd);
    }
}

