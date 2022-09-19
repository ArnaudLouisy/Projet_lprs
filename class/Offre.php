<?php

class Offre{

    private $id_offre;
    private $titre_offre;
    private $description;
    private $date_publication;
    private $type_contrat;
    private $duree_contrat;
    private $pourvue;

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