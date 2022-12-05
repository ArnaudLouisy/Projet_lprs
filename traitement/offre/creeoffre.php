<?php
session_start();
require_once '../../class/Bdd.php';
require_once '../../class/Offre.php';
$bdd = new Bdd();
if (isset($_POST['creer'])){
    $offre = new Offre (array(
        'titreoffre'=> ucfirst(strtolower($_POST['titreoffre'])),
        'description'=>ucfirst(strtolower($_POST['description'])),
        'typecontrat'=>$_POST['type_contrat'],
        'durecontrat'=>$_POST['dure_contrat'],
        'refutilisateur'=>$_SESSION['id_utilisateur']
    ));
    $offre->ajouteroffre($bdd);
}elseif (isset($_POST['supprimer']) && $_POST['supprimer'] != null){
    $offre = new Offre (array(
        'idoffre'=>$_POST['supprimer'],
        'refrepresentant'=>$_SESSION['id_representant']
    ));
    $offre->supprimeroffre($bdd);

}elseif (isset($_POST['modifier']) && $_POST['modifier'] != null){
    $offre = new Offre (array(
        'idoffre'=> $_POST['modifier'],
        'titreoffre'=> ucfirst(strtolower($_POST['titreoffre'])),
        'description'=>ucfirst(strtolower($_POST['description'])),
        'typecontrat'=>$_POST['type_contrat'],
        'durecontrat'=>$_POST['dure_contrat'],
    ));
    $offre->modifieroffre($bdd);

}
header('Location: ../../index.php');