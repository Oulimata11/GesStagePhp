<?php

include '../connexionBD/bd.php';

$delete = "DELETE FROM evoluer WHERE Numero = '" . $_GET["Numero"] . "'";
$connexion->query($delete);
echo $delete;
if ($delete) {
    $location = $_SERVER['HTTP_REFERER'];
    header('Location: ../pages/listEvoluer.php?delete=1');
}
?>