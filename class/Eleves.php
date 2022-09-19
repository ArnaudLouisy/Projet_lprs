<?php

class Eleves{

    private $id_eleves;
    private $nom;
    private $prenom;
    private $email;
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

}