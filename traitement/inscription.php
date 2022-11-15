<?php
session_start();
require_once '../class/Utilisateur.php';
require_once '../class/Bdd.php';

$bdd = new Bdd();
var_dump($_POST);

if (!empty($_POST['']) || $_POST[''] != ' ') {
    if ($_POST['motdepasse'] == $_POST['mdpconfirme']) {
        if (isset($_POST['eleve'])) {
            $utilisateur = new Utilisateur (array(
                'nom' => strtoupper($_POST['nom']),
                'prenom' => ucfirst(strtolower($_POST['prenom'])),
                'role' => 'eleves',
                'email' => $_POST['email'],
                'motdepasse' => $_POST['motdepasse'],
                'adresse' => $_POST['adresse'],
                'domaineetude' => $_POST['domaine'],
                'niveauetude' => $_POST['niveau']
            ));
            $utilisateur->UtilisateurInscription($bdd);
        } elseif (isset($_POST['entreprise'])) {
            $entreprise = new Utilisateur (array(
                'nom' => strtoupper($_POST['nom']),
                'post' => $_POST['post'],
                'role' => 'entreprise',
                'email' => $_POST['email'],
                'motdepasse' => $_POST['motdepasse'],
                'adresse' => $_POST['adresse'],

            ));
            $entreprise->UtilisateurInscription($bdd);
        }


    }
}




