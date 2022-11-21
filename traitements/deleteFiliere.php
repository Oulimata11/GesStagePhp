<?php

include '../connexionBD/bd.php';

$delete = "DELETE FROM filiere WHERE CodeF = '" . $_GET["CodeF"] . "'";
$connexion->query($delete);
echo $delete;
if ($delete) {
    $location = $_SERVER['HTTP_REFERER'];
    header('Location: ../pages/listFiliere.php?delete=1');
}
?>