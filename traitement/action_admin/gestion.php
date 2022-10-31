<?php
require_once '../../class/Eleves.php';
require_once '../../class/Bdd.php';
$bdd = new Bdd();
if ($_POST['action']){
    $res=explode("_",$_POST['action']);
    echo ($res[0].$res[1]);
    if ($res[1]='eleves'){
        $eleve = new Eleves(array(
            'ideleves'=>$res[0]
        ));
        $eleve->valider($bdd);
    }
}

