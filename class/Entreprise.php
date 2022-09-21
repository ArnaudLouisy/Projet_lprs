<?php

class Entreprise{

    private $id_representant ;
    private $nom_entreprise ;
    private $adresse;
    private $email;
    private $motdepasse;
    private $role_representant;
    private $valider;


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

    public function EntrepriseConnexion (Bdd $base){

        $req = $base->getBdd()->prepare('SELECT * FROM utilisateur_entreprise WHERE email = :email  AND motdepasse = :motdepasse AND valider = 1 ');

        $req->execute(array(
            'email' => $this->email,
            'motdepasse' => $this->motdepasse
        ));

        $res = $req->fetch();

        if ($res) {
            $_SESSION['id_representant'] = $res['id_representant'];
            header('Location: ../index.php');
        }
        if ($res['valide'] != 1) {
            header('Location: ../Erreur/dist/validation.html');
        }
        else{
            echo ('mot de passe ou email incorrecte');
        }

        return $res;

    }

}