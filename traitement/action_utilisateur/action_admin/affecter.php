<?php
require_once '../../../class/Bdd.php';
require_once '../../../class/Salle.php';
$bdd = new Bdd();
if (isset($_POST['valider'])){
    $salle = new salle(array(
        'nomsalle'=>$_POST['nom'],
        'nombreplace'=>$_POST['nombre_place'],
        'adresse'=>$_POST['adresse'],
        'cp'=>$_POST['cp'],
        'ville'=>$_POST['ville']
    ));
    $salle->creeSalle($bdd);

}elseif (isset($_POST['modifier'])){
    $salle = new salle(array(
        'idsalle'=>$_POST['modifier'],
        'nomsalle'=>$_POST['nom'],
        'nombreplace'=>$_POST['nombre_place'],
        'adresse'=>$_POST['adresse'],
        'cp'=>$_POST['cp'],
        'ville'=>$_POST['ville']
    ));
    $salle->modifierLaSalle($bdd);
}elseif (isset($_POST['supprime'])){
    $salle = new salle(array(
        'idsalle'=>$_POST['supprime'],
    ));
    $salle->supprimerLaSalle($bdd);
}

header('Location: ../../../admin/admin.salle.php');