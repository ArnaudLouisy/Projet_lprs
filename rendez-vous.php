<?php
require_once 'class/RendezVous.php';
require_once 'class/Bdd.php';

?>

<!DOCTYPE html>
<html>
<body>

<h2>Formulaire creation d'un Rendez-vous</h2>

<form action="traitement/traitementrdv.php" method="post">




  <label>date :</label><br>
  <input type="date" name="date"><br>

  <label>heure :</label><br>
  <input type="time" name="heure"><br>

  <label>ref_offre :</label><br>
  <input type="number" name="ref_offre"><br>





  <input type="submit" value="Submit">


</form>



</body>
</html>

