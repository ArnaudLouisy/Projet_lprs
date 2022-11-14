<?php
session_start();
require_once 'class/Offre.php';
require_once 'class/Bdd.php';

?>
<!DOCTYPE html>
<html>
<body>

<h2>Formulaire Offre</h2>

<form action="traitement/offre/creeoffre.php" method="post">




    <label>titre_offre  :</label><br>
    <input type="text" name="titreoffre"><br>

    <label>description :</label><br>
    <input type="text" name="description"><br>

    <label>date_publication :</label><br>
    <input type="date" name="datepublication"><br>

    <label>type_contrat :</label><br>
    <input type="text" name="typecontrat"><br>

    <label>dure_contrat :</label><br>
    <input type="number" name="durecontrat"><br>





    <input type="submit" value="Submit">


</form>



</body>
</html>

