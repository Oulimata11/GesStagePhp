<?php

include '../connexionBD/bd.php';

$delete = "DELETE FROM etudiant WHERE Matricule = '" . $_GET["Matricule"] . "'";
$connexion->query($delete);
echo $delete;
if ($delete) {
    $location = $_SERVER['HTTP_REFERER'];
    header('Location: ../pages/listEtudiant.php?delete=1');
}
?>