<!DOCTYPE html>
<html>
<body>

<h2>Formulaire evenement</h2>

<form action="traitement/evenement/creeevenement.php" method="post">




    <label>nom_event  :</label><br>
    <input type="text" name="nom_event"><br>

    <label>description :</label><br>
    <input type="text" name="description"><br>

    <label>date :</label><br>
    <input type="date" name="date"><br>

    <label>heure :</label><br>
    <input type="time" name="heure"><br>

    <label>duree :</label><br>
    <input type="number" name="duree"><br>

    <label>nombre_inscrit :</label><br>
    <input type="text" name="nombre_inscrit"><br>


    <input type="submit" name="creer" value="Submit">

</form>



</body>
</html>




