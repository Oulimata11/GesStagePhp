<?php
include '../connexionBD/bd.php';
$select= $connexion->query("SELECT * FROM entreprise WHERE Numero='" . $_GET["Numero"] . "'");

while ($row = $select ->fetch (PDO::FETCH_ASSOC)) {
    $dateDebut = $row['DateDebut'];
    $dateFin = $row['DateFin'];
    $primeTransport = $row['PrimeTransport'];
    $matEtudiant = $row['Matricule'];
    $numEntreprise = $row['NumE'];
}

if (isset($_POST['update'])) {

    $dateDebut = $_POST['dateDebut'];
    $dateFin = $_POST['dateFin'];
    $primeTransport = $_POST['primeTransport'];
    $matEtudiant = $_POST['matEtudiant'];
    $numEntreprise = $_POST['numEntreprise'];



    $update = "UPDATE evoluer SET DateDebut='$dateDebut',DateFin='$dateFin',
    PrimeTransport='$primeTransport',Matricule='$matEtudiant',NumE='$numEntreprise'
     WHERE Numero= '" . $_GET["Numero"] . "'";
    $connexion->exec($update);

    if ($update) {
        $success = "Modifié avec succès...";
        header('Location: ../pages/listEntreprise.php?success=1');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Evolution</title>
</head>
<body>
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
                <form action=" " method="post">
                    <div class="form-group">
                        <label for="">Date de Début</label>
                        <input type="date" name="dateDebut" id="" class="form-control"
                        value="<?php echo $dateDebut; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Date de Fin</label>
                        <input type="date" name="dateFin" id="" class="form-control"
                        value="<?php echo $dateFin; ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Prime de Transport</label>
                        <input type="text" name="primeTransport" id="" class="form-control"
                        value="<?php echo $primeTransport; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Matricule</label>
                        <select name="matEtudiant" class="form-control" value="<?php echo $matEtudiant; ?>">
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
                        <select name="numEntreprise" class="form-control" value="<?php echo $numEntreprise; ?>">
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
                    <input type="submit" class="btn btn-primary mt-3" value="Enregistrer" name="update">
                </form>
            </div>
        </div>
    </div>

</body>
</html>