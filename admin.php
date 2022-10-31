<?php
session_start();
require_once 'class/Admin.php';
require_once 'class/Bdd.php';
$bdd = new Bdd();
$compt = new Admin(array());
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
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
            </tr>
            </thead>
            <tbody>
            <tr>
<?php foreach ($compteleves as $value){
    echo "<tr>
            <td>".$value['id_eleves']."</td>
            <td>".$value['nom']."</td>
            <td>".$value['prenom']."</td>
            <td>".$value['email']."</td>
            </tr>";};?>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
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