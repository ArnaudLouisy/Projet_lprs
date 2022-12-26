<?php

require_once '../vendor/autoload.php';

class Email{
    private $destinataire;
    private $titre;
    private $expediteur;
    private $corps;

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

    public function motDePasseOublier () {

    }

    public function compteCreer(){
        
    }

    public function compteValider(){

    }
}

