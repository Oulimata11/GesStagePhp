<?php
if (isset($_POST['saved'])) {

    include '../connexionBD/bd.php';
    $dateDebut = $_POST['dateDebut'];
    $dateFin = $_POST['dateFin'];
    $primeTransport = $_POST['primeTransport'];
    $matEtudiant = $_POST['matEtudiant'];
    $numEntreprise = $_POST['numEntreprise'];

    $add = "INSERT INTO evoluer (DateDebut,DateFin,PrimeTransport,Matricule,NumE) 
        values ('$dateDebut','$dateFin','$primeTransport','$matEtudiant','$numEntreprise')";
    $connexion->exec($add);

    $location = $_SERVER['HTTP_REFERER'];
    if ($add) {
        $success = "Ajouté avec succès...";
        header('Location: ../pages/formEvoluer.php?success=1');
    }
}
?>