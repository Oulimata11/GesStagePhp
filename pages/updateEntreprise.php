<?php
include '../connexionBD/bd.php';
$select= $connexion->query("SELECT * FROM entreprise WHERE NumE='" . $_GET["NumE"] . "'");

while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
    $nomEntreprise = $row['NomE'];
    $descripEntreprise = $row['Description'];
}

if (isset($_POST['update'])) {

    $nomEntreprise = $_POST['nomEntreprise'];
    $descripEntreprise = $_POST['descripEntreprise'];


    $update = "UPDATE entreprise SET NomE='$nomEntreprise',Description='$descripEntreprise'
    WHERE NumE= '" . $_GET["NumE"] . "'";
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
    <title> Entreprise</title>
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
                Ajout Entreprise
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nomEntreprise" id="" class="form-control"
                        value="<?php echo $nomEntreprise; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="descripEntreprise" id="" class="form-control"
                        value="<?php echo $descripEntreprise; ?>">
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Enregistrer" name="update">
                </form>
            </div>
        </div>
    </div>

</body>
</html>