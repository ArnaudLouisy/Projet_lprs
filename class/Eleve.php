<?php

class Eleve{

    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $rue;
    private $ville;
    private $cp;
    private $valider;
    private $domaine;
    private $niveau;

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