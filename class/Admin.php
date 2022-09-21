<?php

class Admin{

    private $id_admin;
    private $nom;
    private $prenom;
    private $email;
    private $motdepasse;

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

    public function EleveConnexion (Bdd $base){

        $req = $base->getBdd()->prepare('SELECT * FROM utilisateur_eleves WHERE email = :email  AND motdepasse = :motdepasse');

        $req->execute(array(
            'email' => $this->email,
            'motdepasse' => $this->motdepasse
        ));

        $res = $req->fetch();

        if ($res) {
            $_SESSION['id_admin'] = $res['id_admin'];
            header('Location: ../index.php');
        }
        else{
            echo ('mot de passe ou email incorrecte');
        }

        return $res;

    }
}