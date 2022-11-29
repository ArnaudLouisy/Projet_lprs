<?php
session_start();
require_once '../../class/Utilisateur.php';
require_once '../../class/Bdd.php';

$bdd = new Bdd();

if (!empty($_POST['']) || $_POST[''] != ' ') {
    if ($_POST['motdepasse'] == $_POST['mdpconfirme']) {
            $utilisateur = new Utilisateur (array(
                'nom' => strtoupper($_POST['nom']),
                'prenom' => ucfirst(strtolower($_POST['prenom'])),
                'role' => ucfirst($_POST['role']),
                'logo' => $_POST['logo'],
                'email' => $_POST['email'],
                'motdepasse' => $_POST['motdepasse'],
                'adresse' => $_POST['adresse'],
                'cp'=>$_POST['cp'],
                'ville'=>$_POST['ville'],
                'post'=>$_POST['post'],
                'domaineetude' => ucfirst(strtolower($_POST['domaine'])),
                'niveauetude' => strtoupper($_POST['niveau'])

            ));
            $utilisateur->UtilisateurInscription($bdd);
    }
}




