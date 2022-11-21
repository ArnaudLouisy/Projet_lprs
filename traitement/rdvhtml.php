<?php
session_start();
require_once 'class/RendezVous.php';
require_once 'class/Bdd.php';

?>
<!DOCTYPE html>
<html>
<body>

<h2>Formulaire Rendez-vous</h2>

<form action="traitement/traitementrdv.php" method="post">




    <label>date</label><br>
    <input type="date" name="date"><br>

    <label>heure</label><br>
    <input type="time" name="heure"><br>







    <input type="submit" value="Submit">


</form>



</body>
</html>
