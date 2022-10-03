<?php

class Utilisateur{
    private $nom;
    private $prenom;
    private $email;
    private $motdepasse;
    private $adresse;
    private $valider;
    private $domaine_etude;
    private $niveau_etude;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    private function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function UtilisateurConnexion (Bdd $base){

        $req = $base->getBdd()->prepare('SELECT * FROM utilisateur_eleves WHERE email = :email  AND motdepasse = :motdepasse AND valider = 1 ');

        $req->execute(array(
            'email' => $this->email,
            'motdepasse' => $this->motdepasse
        ));

        $res = $req->fetch();

        if ($res) {

            if ($res['valide'] == 1) {
                header('Location: ../Erreur/dist/validation.html');
            }
            $_SESSION['id_eleves'] = $res['id_eleves'];
            $_SESSION['nom'] = $res['nom'];
            $_SESSION['prenom'] = $res['prenom'];
            header('Location: ../index.php');
        }

        if (!($res)){
            echo ('mot de passe ou email incorrecte');
        }

        return $res;

    }
}