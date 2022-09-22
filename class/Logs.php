<?php

class Logs{

    private $id_compte;
    private $date;
    private $heure;
    private $adresse_ip;

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

    private function addlogs(Bdd $base){
        $req = $base->getBdd()->prepare('INSERT INTO logs () values ()');

        $req->execute(array(
            'id_compte' => $this->id_compte ,
            'date' => $this->date,
            'heure' => $this->heure,
            'adresse_ip' => $this->adresse_ip
        ));
    }
}