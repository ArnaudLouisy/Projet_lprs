<?php
session_start();
require_once '../../class/Bdd.php';
require_once '../../class/Offre.php';
$bdd = new Bdd();
if (isset($_POST['creer'])){
    $offre = new Offre (array(
        'titreoffre'=> ucfirst(strtolower($_POST['titreoffre'])),
        'description'=>ucfirst(strtolower($_POST['description'])),
        'typecontrat'=>$_POST['typecontrat'],
        'durecontrat'=>$_POST['durecontrat'],
        'refutilisateur'=>$_SESSION['id_utilisateur']
    ));
    $offre->ajouteroffre($bdd);
}elseif (isset($_POST['supprimer']) && $_POST['supprimer'] != null){
    $offre = new Offre (array(
        'idoffre'=>$_POST['supprimer'],
        'refrepresentant'=>$_SESSION['id_representant']
    ));
    $offre->supprimeroffre($bdd);
}


header('Location: ../../index.php');