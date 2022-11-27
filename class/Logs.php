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

    public function logs(Bdd $base){
        $req = $base->getBdd()->prepare('INSERT INTO logs (id_compte,date,heure,adresse_ip) values (:id_compte,CURRENT_TIME,CURRENT_DATE,:adresse_ip)');

        $req->execute(array(
            'id_compte' => $this->id_compte ,
            'adresse_ip' => $this->adresse_ip
        ));
        var_dump($this);
    }

    public function VoireLoge(Bdd $base){
        $req = $base->getBdd()->prepare('SELECT * FROM loge');
        $req->execute(array());

        return$req->fetchAll();
    }

    /**
     * @param mixed $id_compte
     */
    public function setIdCompte($id_compte)
    {
        $this->id_compte = $id_compte;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $heure
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;
    }

    /**
     * @param mixed $adresse_ip
     */
    public function setAdresseIp($adresse_ip)
    {
        $this->adresse_ip = $adresse_ip;
    }

}