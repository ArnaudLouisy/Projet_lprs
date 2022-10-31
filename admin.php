<?php
session_start();
require_once 'class/Eleves.php';
require_once 'class/Bdd.php';
$bdd = new Bdd();
$compt = new Eleves(array());
$compteleves = $compt->ComptNonValide($bdd);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>Numérot</th>
                <th>nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Géré</th>
            </tr>
            </thead>
            <tbody>
<?php foreach ($compteleves as $value){
    echo "<tr>
            <td>".$value['id_eleves']."</td>
            <td>".$value['nom']."</td>
            <td>".$value['prenom']."</td>
            <td>".$value['email']."</td>
            <td>
                <form action='traitement/action_admin/gestion' method='post'>
                     <button type='submit'  class='btn btn-outline-secondary' name='action' value=".$value['id_eleves']."_eleves"."><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-lg' viewBox='0 0 16 16'>
  <path d='M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z'/>
</svg></button>
                </form>
              
            </td>
            </tr>";};?>
            </tbody>
            <tfoot>
            <tr>
                <th>Numérot</th>
                <th>nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Géré</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script src="assets/js/js.data.js"></script>
</body>
</html>