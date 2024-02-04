<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Evenement</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/price_rangs.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<html>
<body>

<h2>Formulaire evenement</h2>

<form action="traitement/evenement/creeevenement.php" method="post">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class='row mb-3'>
                    <div class='col-sm-3'>
                        <h6 class='mb-0'>Nom event</h6>
                    </div>
                    <div class='col-sm-9 text-secondary'>
                        <input type="text" name="nom_event">
                    </div>
                </div>

                <div class='row mb-3'>
                    <div class='col-sm-3'>
                        <h6 class='mb-0'>Description</h6>
                    </div>
                    <div class='col-sm-9 text-secondary'>
                        <input type="text" name="description">
                    </div>
                </div>

                <div class='row mb-3'>
                    <div class='col-sm-3'>
                        <h6 class='mb-0'>Date</h6>
                    </div>
                    <div class='col-sm-9 text-secondary'>
                        <input type="date" name="date">
                    </div>
                </div>

                <div class='row mb-3'>
                    <div class='col-sm-3'>
                        <h6 class='mb-0'>Heure</h6>
                    </div>
                    <div class='col-sm-9 text-secondary'>
                        <input type="time" name="heure">
                    </div>
                </div>

                <div class='row mb-3'>
                    <div class='col-sm-3'>
                        <h6 class='mb-0'>Duree</h6>
                    </div>
                    <div class='col-sm-9 text-secondary'>
                        <input type="time" name="duree">
                    </div>
                </div>

                <div class="col-sm-"></div>
                <div class="col-sm-9 text-secondary">
                    <button name="creer" type="submit" class="btn btn-secondary px-4" value="Submit">Valider</button>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>




