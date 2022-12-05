<?php
session_start();
require_once '../../class/Bdd.php';
require_once '../../class/Evenement.php';
$bdd = new Bdd();
if (isset($_POST['supprimer']) && $_POST['supprimer'] != null){
    $evenement = new Evenement (array(
        'idevent'=>$_POST['supprimer'],
    ));
    $evenement->supprimerevenemnt($bdd);
}