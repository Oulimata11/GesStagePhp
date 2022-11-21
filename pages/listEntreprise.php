<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>
</head>

<body>
    <?php include '../navigation/nav.php' ?>

    <?php if (isset($_GET['delete']) && $_GET['delete'] == 1) { ?>
    <div class='alert alert-danger corner-radius container mt-4'
    style="background-color:rgb(246, 219, 245); margin-top: 300px;">
        <p>Entreprise Supprimée</p>
    </div>
    <?php unset($_GET['delete']);
    } ?>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-warning corner-radius container mt-4'
    style="background-color:rgb(246, 219, 245); margin-top: 300px;">
        <p>Entreprise Ajouté</p>
    </div>
    <?php unset($_GET['success']);
    } ?>
    <div class="container mt-3">
            <div class="debut" style="margin-top:40px ;position: relative; border-radius: 30px;
            box-shadow: 0 0 7px 0 blueviolet; background:linear-gradient(45deg,#EFD21B 40%,#4C4D4C  60%);
            border:none; padding:10px 29px; width:50%;">
                Liste des Entreprises
            </div>
            <div class="milieu" style="margin-top:30px ;">
                <table class="table" >
                    <tr>
                        <th>Numero</th>
                        <th>Nom</th>
                        <th>Description</th>
                    </tr>
                    <tr>
                        <?php
                        include '../connexionBD/bd.php';
                        $stmt = $connexion->query ("SELECT * FROM entreprise");
                        while ($row = $stmt->fetch()) { ?>
                    <tr>
                        <td><?php echo $row["NumE"]; ?></td>
                        <td><?php echo $row["NomE"]; ?></td>
                        <td><?php echo $row["Description"]; ?></td>
                        <td><a class="btn"
                        style="background-color:#EFD21B; color:black;border-radius:30px;
                        width:100%;border:none;outline:none;padding:8px 0 8px 15px;font-size:15px;cursor:pointer;"
                                href="../pages/updateEntreprise.php?NumE=<?php echo $row['NumE']; ?>">
                                Modifier</a></td>
                        <td><a class="btn"
                        style="background-color:#4C4D4C; color:white;border-radius:30px;
                        width:100%;border:none;outline:none;padding:8px 0 8px 15px;font-size:15px;cursor:pointer;"
                                href="../traitements/deleteEntreprise.php?NumE=<?php echo $row['NumE']; ?>"
                                onclick="return confirm('Vous voulez vraiment supprimer ?');">Supprimer</a>
                        </td>

                    </tr>

                    <?php
                        }

                ?>
                    </tr>
                </table>
            </div>
    </div>

</body>
</html>