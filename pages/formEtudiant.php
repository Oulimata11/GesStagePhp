<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Etudiants</title>
</head>
<body>
    <!--inclusion de la barre de navigation-->
    <?php include '../navigation/nav.php' ?> 

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container mt-3'>
        <p>Ajouté avec succés</p>
    </div>
    <?php unset($_GET['success']);} ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-warning text-black">
                Ajout Etudiant
            </div>
            <div class="card-body">
                <form action="../traitements/addEtudiant.php" method="post">
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nomEtudiant" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Prenom</label>
                        <input type="text" name="prenomEtudiant" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Naissance</label>
                        <input type="date" name="naissancEtudiant" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Sexe</label>
                        <select name="sexEtudiant" id="" class="form-control">
                            <option value="masculin">Masculin</option>
                            <option value="feminin">Feminin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Lieu Naissance</label>
                        <input type="text" name="lieuNaissEtudiant" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Filière</label>
                        <select name="codeFiliere" class="form-control">
                            <?php 
                            include '../connexionBD/bd.php';
                            $select=$connexion->query("SELECT * FROM filiere");
                            while ($row= $select->fetch()) {?>
                            <option value="<?php echo $row['CodeF'];?>">
                            <?php echo $row['NomF'];?> </option>
                            <?php 
                            }
                            ?>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Enregistrer" name="saved">
                </form>
            </div>
        </div>
    </div>

</body>
</html>