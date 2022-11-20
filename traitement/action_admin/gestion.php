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
    }
}

