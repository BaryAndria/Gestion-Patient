
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/awesome/font-awesome/css/font.min.css">
    <link rel="stylesheet" href="../../public/css/main.css">
    <title>Document</title>
</head>
<body>

<div class="container-fluid">
    <form method="POST" action="<?= URL ?>admin/mv" enctype="multipart/form-data">
    <i><h3>MODIFIER PATIENTS</h3></i>
        <div class="row">        
            <div class="col-sm-6">            
                <div class="form-group">
                <br>
                    <label for="Nom">Nom</label>
                    <input type="text" class="form-control" id="Nom" name="Nom" value="<?= $patient->getNom(); ?>">
                </div>

                <div class="form-group">
                    <label for="Prenom">Prenom</label>
                    <input type="text" class="form-control" name="Prenom" id="Prenom" value="<?= $patient->getPrenom(); ?>">
                </div>

                <div class="form-group">
                    <label for="Adresse">Adresse</label>
                    <input type="text" class="form-control" id="Adresse" name="Adresse" value="<?= $patient->getAdresse(); ?>">
                </div>

                <div class="form-group">
                    <label for="Ville">Ville</label>
                    <input type="text" class="form-control" id="Ville" name="Ville" value="<?= $patient->getVille(); ?>">
                </div>

                <div class="form-group">
                    <label for="Telephone">Telephone</label>
                    <input type="text" class="form-control" id="Telephone" name="Telephone" value="<?= $patient->getTelephone(); ?>">
                </div>

                <div class="form-group">
                    <label for="cin">CIN</label>
                    <input type="text" class="form-control" id="cin" name="cin" value="<?= $patient->getCin(); ?>">
                </div>

            </div>

            <div class="col-sm-6">
            <br>
                <img class="img img-fluid" src="<?= URL ?>public/img/<?= $patient->getImage(); ?>">
                <div class="form-group">
                    <br>
                    <label for="image">Changer l'image : </label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <input type="hidden" name="identifiant" value="<?= $patient->getId(); ?>"><br>
            </div>
            <button id="valider" name="valider" type="submit" class="btn btn-primary"><span class="icon-ok"></span> Valider</button>
        </div>
    </form>
</div>

<script src="../../public/css/jquery.min.js"></script>
<script src="../../public/css/bootstrap.min.js"></script>
</body>
</html>
