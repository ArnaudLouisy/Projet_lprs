<?php

class Bdd{

    private $bdd;

    public function __construct(){
        $this->bdd = new PDO('mysql:host=localhost;dbname=projet_lprs;charset=utf8', 'root', '');
    }
//pensez a crée un utilisateur de base de données
    public function getBdd()
    {
        return $this->bdd;
    }

}