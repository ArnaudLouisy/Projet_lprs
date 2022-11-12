<?php

class Bdd{

    private $bdd;


//pensez a crée un utilisateur de base de données
    public function getBdd()
    {
        return $this->bdd = new PDO('mysql:host=localhost:3306;dbname=projet_lprs;charset=utf8', 'root', '');

    }


}