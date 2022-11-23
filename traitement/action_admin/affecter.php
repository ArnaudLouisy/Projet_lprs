<?php
require_once '../../class/Bdd.php';
$bdd = new Bdd();
$res=explode("_",$_POST['action']);
if ($res[1]=='eleves'){
    require_once '../../class/Eleves.php';
    $entreprise = new Entreprise(array(
        'identreprise'=>$res[0]
    ));
    $entreprise->AddLogo($bdd);
}
