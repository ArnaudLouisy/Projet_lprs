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

    public function ComptNonValide(Bdd $base){

        $req = $base->getBdd()->prepare('SELECT * FROM utilisateur_eleves WHERE valider != 1');

        $req->execute(array());

        $res = $req->fetch();

        return $res;

    }

    public function Validercompte(Bdd $base){

    }
    public function Valideroffre(Bdd $base){}
    public function Affectersalle(Bdd $base){}
}