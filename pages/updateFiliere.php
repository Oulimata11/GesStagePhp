<?php
include '../connexionBD/bd.php';
$select= $connexion->query("SELECT * FROM filiere WHERE CodeF='" . $_GET["CodeF"] . "'");

while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
    $nomFiliere = $row['NomF'];
}

if (isset($_POST['update'])) {

    $nomFiliere = $_POST['nomFiliere'];

    $update = "UPDATE filiere SET NomF='$nomFiliere' WHERE CodeF= '" . $_GET["CodeF"] . "'";
    $connexion->exec($update);

    if ($update) {
        $success = "Modifié avec succès...";
        header('Location: ../pages/listFiliere.php?success=1');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Filière</title>
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
                Ajout Filière
            </div>
            <div class="card-body">
                <form action=" " method="post">
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nomFiliere" id="" class="form-control"
                        value="<?php echo $nomFiliere; ?>">
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Enregistrer" name="update">
                </form>
            </div>
        </div>
    </div>

</body>
</html>