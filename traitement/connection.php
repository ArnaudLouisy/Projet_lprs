<?php
require_once '../class/Eleves.php';
require_once '../class/Bdd.php';

$bdd = new Bdd();

$eleves = new Eleves (array(
    'email'=>$_POST['email'],
    'motdepasse'=>$_POST['motdepasse']
));