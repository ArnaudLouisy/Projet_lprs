<?php
require_once '../../class/Bdd.php';
require_once '../../class/Evenement.php';
$bdd = new Bdd();
$evenement = new Evenement(array(
    'idevenement'=>$_POST
));
$evenement->AffectSalle($bdd);

