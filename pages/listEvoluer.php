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
        <p>Evolution Supprimée</p>
    </div>
    <?php unset($_GET['delete']);
    } ?>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-warning corner-radius container mt-4'
    style="background-color:rgb(246, 219, 245); margin-top: 300px;">
        <p>Evolution Ajoutée</p>
    </div>
    <?php unset($_GET['success']);
    } ?>
    <div class="container mt-3">
            <div class="debut" style="margin-top:40px ;position: relative; border-radius: 30px;
            box-shadow: 0 0 7px 0 blueviolet; background:linear-gradient(45deg,#EFD21B 40%,#4C4D4C  60%);
            border:none; padding:10px 29px; width:50%;">
                Liste des Evolutions
            </div>
            <div class="milieu" style="margin-top:30px ;">
                <table class="table" >
                    <tr>
                        <th>Numero</th>
                        <th>Date de Début</th>
                        <th>Date de Fin</th>
                        <th>Prime de Transport</th>
                        <th>Matricule</th>
                        <th>Entreprise</th>
                    </tr>
                    <tr>
                        <?php
                        include '../connexionBD/bd.php';
                        $stmt = $connexion->query ("SELECT * FROM evoluer");
                        while ($row = $stmt->fetch()) { ?>
                    <tr>
                        <td><?php echo $row["Numero"]; ?></td>
                        <td><?php echo $row["DateDebut"]; ?></td>
                        <td><?php echo $row["DateFin"]; ?></td>
                        <td><?php echo $row["PrimeTransport"]; ?></td>
                        <td><?php echo $row["Matricule"]; ?></td>
                        <td><?php echo $row["NumE"]; ?></td>
                        <td><a class="btn"
                        style="background-color:#EFD21B; color:black;border-radius:30px;
                        width:100%;border:none;outline:none;padding:8px 0 8px 15px;font-size:15px;cursor:pointer;"
                                href="../pages/updateEvoluer.php?Numero=<?php echo $row['Numero']; ?>">
                                Modifier</a></td>
                        <td><a class="btn"
                        style="background-color:#4C4D4C; color:white;border-radius:30px;
                        width:100%;border:none;outline:none;padding:8px 0 8px 15px;font-size:15px;cursor:pointer;"
                                href="../traitements/deleteEvoluer.php?Numero=<?php echo $row['Numero']; ?>"
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