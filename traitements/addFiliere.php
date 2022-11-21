<?php
if (isset($_POST['saved'])) {
    include '../connexionBD/bd.php';
    $nomFiliere = $_POST['nomFiliere'];

    $add = "INSERT INTO filiere (NomF) 
        values ('$nomFiliere')";
    $connexion->exec($add);

    $location = $_SERVER['HTTP_REFERER'];
    if ($add) {
        $success = "Ajout Effectué...";
        header('Location: ../pages/formFiliere.php?success=1');
    }
}
?>