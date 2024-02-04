<?php

class Bdd{

    private $bdd;


    public function getBdd()
    {
        return $this->bdd = new PDO('mysql:host=localhost:3306;dbname=projet_lprs;charset=utf8', 'root', '');

    }


}