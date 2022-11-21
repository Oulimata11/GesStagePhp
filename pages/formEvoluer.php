<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Evolutions</title>
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
                Ajout Evolution
            </div>
            <div class="card-body">
                <form action="../traitements/addEvoluer.php" method="post">
                    <div class="form-group">
                        <label for="">Date de Début</label>
                        <input type="date" name="dateDebut" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Date de Fin</label>
                        <input type="date" name="dateFin" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Prime de Transport</label>
                        <input type="text" name="primeTransport" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Matricule</label>
                        <select name="matEtudiant" class="form-control">
                            <?php 
                            include '../connexionBD/bd.php';
                            $select=$connexion->query("SELECT * FROM etudiant");
                            while ($row= $select->fetch()) {?>
                            <option value="<?php echo $row['Matricule'];?>">
                            <?php echo $row['Matricule'];?> </option>
                            <?php 
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Entreprise</label>
                        <select name="numEntreprise" class="form-control">
                            <?php 
                            include '../connexionBD/bd.php';
                            $select=$connexion->query("SELECT * FROM entreprise");
                            while ($row= $select->fetch()) {?>
                            <option value="<?php echo $row['NumE'];?>">
                            <?php echo $row['NomE'];?> </option>
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