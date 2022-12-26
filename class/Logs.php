<?php

class Logs{

    private $ref_compte;
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

    public function logs(Bdd $base){
        $req = $base->getBdd()->prepare('INSERT INTO logs (ref_compte,adresse_ip) values (:ref_compte,:adresse_ip)');

        $req->execute(array(
            'ref_compte' => $this->ref_compte ,
            'adresse_ip' => $this->adresse_ip
        ));
    }

    public function VoireLoge(Bdd $base){
        $req = $base->getBdd()->prepare('SELECT * FROM logs');
        $req->execute(array());

        return$req->fetchAll();
    }

    /**
     * @param mixed $ref_compte
     */
    public function setRefCompte($ref_compte): void
    {
        $this->ref_compte = $ref_compte;
    }

    /**
     * @param mixed $adresse_ip
     */
    public function setAdresseIp($adresse_ip)
    {
        $this->adresse_ip = $adresse_ip;
    }

}