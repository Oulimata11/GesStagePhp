<?php
if (isset($_POST['saved'])) {

    include '../connexionBD/bd.php';
    $nomEntreprise = $_POST['nomEntreprise'];
    $descripEntreprise = $_POST['descripEntreprise'];

    $add = "INSERT INTO entreprise (NomE,Description) 
        values ('$nomEntreprise','$descripEntreprise')";
    $connexion->exec($add);

    $location = $_SERVER['HTTP_REFERER'];
    if ($add) {
        $success = "Ajouté avec succès...";
        header('Location: ../pages/formEntreprise.php?success=1');
    }
}
?>