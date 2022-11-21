<?php
if (isset($_POST['saved'])) {

    include '../connexionBD/bd.php';
    $nomEtudiant = $_POST['nomEtudiant'];
    $prenomEtudiant = $_POST['prenomEtudiant'];
    $naissancEtudiant = $_POST['naissancEtudiant'];
    $sexEtudiant = $_POST['sexEtudiant'];
    $lieuNaissEtudiant = $_POST['lieuNaissEtudiant'];
    $codeFiliere = $_POST['codeFiliere'];

    $add = "INSERT INTO etudiant (Nom,Prenom,Naissance,Sexe,Lieu,CodeF) 
        values ('$nomEtudiant','$prenomEtudiant',
        '$naissancEtudiant','$sexEtudiant','$lieuNaissEtudiant','$codeFiliere')";
    $connexion->exec($add);

    $location = $_SERVER['HTTP_REFERER'];
    if ($add) {
        $success = "Ajouté avec succès...";
        header('Location: ../pages/formEtudiant.php?success=1');
    }
}
?>