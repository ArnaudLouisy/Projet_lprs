<?php

class Evenement{

    private $id_event;
    private $nom_event;
    private $description;
    private $date;
    private $heure;
    private $duree;
    private $nombre_inscrit;
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