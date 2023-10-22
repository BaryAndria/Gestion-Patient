
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/awesome/font-awesome/css/font.min.css">
    <link rel="stylesheet" href="public/css/main.css">
    <title>Document</title>
</head>
<body>
    <br>
    <i><h1>LISTE DES PATIENTS</h1></i>
    <br>
<div class="container">
    <table class="table text-center " >
        <tr class="table-dark">
            <th class="justify-content-center"><span class="icon-picture"></span> IMAGE</th>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>ADRESSE</th>
            <th>VILLE</th>
            <th>TELEPHONE</th>
            <th>CIN</th>
            <th colspan="2">ACTIONS</th>
        </tr>

        <?php for($i=0; $i < count($Patients);$i++) :?>
            <tr>
                <td class="align-middle"><img src="public/img/<?= $Patients[$i]->getImage(); ?>" width="60px;"></td>
                <td class="align-middle"><a href="<?= URL ?>admin/l/<?= $Patients[$i]->getId();?>"><?= $Patients[$i]->getNom(); ?></td>
                <td class="align-middle"><?= $Patients[$i]->getPrenom();?></td>
                <td class="align-middle"><?= $Patients[$i]->getAdresse();?></td>
                <td class="align-middle"><?= $Patients[$i]->getVille(); ?></td>
                <td class="align-middle"><?= $Patients[$i]->getTelephone(); ?></td>
                <td class="align-middle"><?= $Patients[$i]->getCin(); ?></td>
                <td class="align-middle"><a href="<?= URL ?>admin/m/<?= $Patients[$i]->getId(); ?>" class="btn btn-warning"><span class="icon-pencil"></span> Modifier</a></td>
                <td class="align-middle">
                    <form method="POST" action="<?= URL ?>admin/s/<?= $Patients[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le livre ?');">
                        <button class="btn btn-danger" type="submit"><span class="icon-remove"></span> Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endfor;?>
    </table>
    <a href="<?= URL ?>admin/a" class="btn btn-success d-block"><span class="icon-plus"></span>  Ajouter</a>
</div>
<script src="public/css/jquery.min.js"></script>
<script src="public/css/bootstrap.min.js"></script>
</body>
</html>


