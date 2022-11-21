<?php

include '../connexionBD/bd.php';

$delete = "DELETE FROM entreprise WHERE NumE= '" . $_GET["NumE"] . "'";
$connexion->query($delete);
echo $delete;
if ($delete) {
    $location = $_SERVER['HTTP_REFERER'];
    header('Location: ../pages/listEntreprise.php?delete=1');
}
?>