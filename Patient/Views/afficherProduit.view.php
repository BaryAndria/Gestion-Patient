
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/main.css">
    <title>Patient</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <i><h3>DETAILS DU PATIENT</h3></i>
                <br>
                <p>TITRE : <?= $patient->getNom();?></p>
                <p>PRENOM : <?= $patient->getPrenom();?></p>
                <p>ADRESSE : <?= $patient->getAdresse();?>$</p>
                <p>VILLE : <?= $patient->getVille();?></p>
                <p>TELEPHONE : <?= $patient->getTelephone();?></p>
                <p>CIN : <?= $patient->getCin();?></p>
            </div>

            <div class="col-sm-6">
                <img class="img img-fluid" src="<?= URL ?>public/img/<?= $patient->getImage(); ?>">
            </div>   
        </div>
    </div>

<script src="../../public/css/jquery.min.js"></script>
<script src="../../public/css/bootstrap.min.js"></script>
</body>
</html>




