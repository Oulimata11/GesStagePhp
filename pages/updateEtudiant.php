<?php
include '../connexionBD/bd.php';
$select= $connexion->query("SELECT * FROM etudiant WHERE Matricule='" . $_GET["Matricule"] . "'");

while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
    $nomEtudiant = $row['Nom'];
    $prenomEtudiant = $row['Prenom'];
    $naissancEtudiant = $row['Naissance'];
    $sexEtudiant = $row['Sexe'];
    $lieuNaissEtudiant = $row['Lieu'];
    $codeFiliere = $row['CodeF'];
}

if (isset($_POST['update'])) {

    $nomEtudiant = $_POST['nomEtudiant'];
    $prenomEtudiant = $_POST['prenomEtudiant'];
    $naissancEtudiant = $_POST['naissancEtudiant'];
    $sexEtudiant = $_POST['sexEtudiant'];
    $lieuNaissEtudiant = $_POST['lieuNaissEtudiant'];
    $codeFiliere = $_POST['codeFiliere'];



    $update = "UPDATE etudiant SET Nom='$nomEtudiant',Prenom='$prenomEtudiant',
    Naissance='$naissancEtudiant',Sexe='$sexEtudiant',
    Lieu='$lieuNaissEtudiant',CodeF='$codeFiliere' WHERE Matricule= '" . $_GET["Matricule"] . "'";
    $connexion->exec($update);

    if ($update) {
        $success = "Modifié avec succès...";
        header('Location: ../pages/listEtudiant.php?success=1');
    }
}
?>
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
                <form action=" " method="post">
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nomEtudiant" id="" class="form-control"
                        value="<?php echo $nomEtudiant; ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Prenom</label>
                        <input type="text" name="prenomEtudiant" id="" class="form-control"
                        value="<?php echo $prenomEtudiant; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Naissance</label>
                        <input type="date" name="naissancEtudiant" id="" class="form-control"
                        value="<?php echo $naissancEtudiant; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Sexe</label>
                        <select name="sexEtudiant" id="" class="form-control"
                        value="<?php echo $sexEtudiant; ?>">
                            <option value="masculin">Masculin</option>
                            <option value="feminin">Feminin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Lieu Naissance</label>
                        <input type="text" name="lieuNaissEtudiant" id="" class="form-control"
                        value="<?php echo $lieuNaissEtudiant; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Filière</label>
                        <select name="codeFiliere" class="form-control"
                         value="<?php echo $codeFiliere; ?>">
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
                    <input type="submit" class="btn btn-primary mt-3" value="Enregistrer" name="update">
                </form>
            </div>
        </div>
    </div>

</body>
</html>