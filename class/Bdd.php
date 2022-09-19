<?php

class Bdd{

    private $bdd;

    public function __construct(){
        $this->bdd = new PDO('mysql:host=localhost;dbname=projet_lprs;charset=utf8', 'root', '');
    }

    public function getBdd()
    {
        return $this->bdd;
    }

}