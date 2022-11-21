<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Acceuil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand fw-bold text-warning" href="#">
      <img src="../images/logoUahb.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
      UAHB
    </a>
    <div class="collapse navbar-collapse fw-bold" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Etudiants
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./formEtudiant.php">Ajout Etudiants</a></li>
            <li><a class="dropdown-item" href="./listEtudiant.php">Liste des Etudiants</a></li>
          </ul>
        </li> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Entreprises
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./formEntreprise.php">Ajout Entreprises </a></li>
            <li><a class="dropdown-item" href="./listEntreprise.php">Liste des Entreprises</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Evolutions
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./formEvoluer.php">Ajout Evolutions</a></li>
            <li><a class="dropdown-item" href="./listEvoluer.php">Liste des évolutions</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Filières
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./formFiliere.php">Ajout filières</a></li>
            <li><a class="dropdown-item" href="./listFiliere.php">Liste des filières</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning" href="../sessions/deconnexion.php" style="margin-left:50%;"> Deconnexion</a>
        </li>
      </ul>
     
    </div>
  </div>
</nav>



    <div class="shadow-lg p-3 mb-5 rounded" style="margin-left:20%;margin-right:20%; margin-top:5%; font-family:poppins; background-color:#F9E79F;">
        Bienvenue Dans le Gestionnaire des Stages de l'UAHB</div>
    <img src="../images/uahb.jpg" class="shadow-lg " style="height: 250px; width: 400px; margin-right:50%;margin-left:5%;">
    <img src="../images/FST.jpg"  class="shadow-lg " style="height: 250px; width: 400px; margin-left:50%; margin-top:-280px;" >
</body>
</html>