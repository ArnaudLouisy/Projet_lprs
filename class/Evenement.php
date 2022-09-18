<?php

class Evenement{

    private $id;
    private $nom;
    private $description;
    private $date;
    private $heure;
    private $duree;
    private $inscrit;
    private $autorise;

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