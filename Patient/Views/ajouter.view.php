
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/awesome/font-awesome/css/font.min.css">
    <link rel="stylesheet" href="../public/css/main.css">
    <title>Document</title>
</head>
<body>
<div id="ajout" class="container-fluid ">
<i><h3>AJOUTER UN PATIENT</h3></i>
        <form method="POST" action="<?= URL ?>admin/av" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="Nom" name="Nom">
                </div>

                <div class="form-group">
                    <label for="Prenom">Prenom</label>
                    <input type="text" class="form-control" name="Prenom" id="Prenom">
                </div>

                <div class="form-group">
                    <label for="Adresse">Adresse</label>
                    <input type="text" class="form-control" id="Adresse" name="Adresse">
                </div>

                <div class="form-group">
                    <label for="Ville">Ville</label>
                    <input type="text" class="form-control" id="Ville" name="Ville">
                </div>
            </div>  

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Telephone">Telephone</label>
                    <input type="text" class="form-control" id="Telephone" name="Telephone">
                </div>

                <div class="form-group">
                    <label for="cin">CIN</label>
                    <input type="text" class="form-control" id="cin" name="cin">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
            </div>
        </div>
            <button type="submit" class="btn btn-primary"><span class="icon-save"></span> Enregistrer</button>
        </form>

</div>

<script src="../public/css/jquery.min.js"></script>
<script src="../public/css/bootstrap.min.js"></script>
</body>
</html>





