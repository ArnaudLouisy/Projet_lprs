<?php

class Entreprise{

    private $id_representant ;
    private $nom_entreprise ;
    private $adresse;
    private $email;
    private $Role_représentant;
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
}