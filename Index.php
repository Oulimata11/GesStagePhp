<?php
session_start();
   @$username=$_POST["username"];
   @$password=md5($_POST["password"]);
   @$save=$_POST["save"];
   $message="";
   if(isset($save)){
      include("sessions/connexion.php");
      $sel=$connexion->prepare("SELECT * from users where username=? and password=? limit 1");
      $sel->execute(array($username,$password));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["autoriser"]="oui";
         header("location: pages/Acceuil.php");
      }
      else
         $erreur="Mauvais login ou mot de passe!";
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/cf6fa412bd.js"> </script>
</head>
<body>
  
<div id="best">
        <div class="buttonsForm">
                <div class="btnColor">  
                <button id="btnSignin"> Connexion </button> 
                </div>  
        </div>
            <form action="" method="POST" id="signin">
                <input type="text" name="username" id="username" placeholder="Nom d'utilisateur" required/>
                <i class="fas fa-user iLogin"> </i>
                <input type="password" name="password" id="password" placeholder="Password" required/>
                <i class="fas fa-lock  iPassword"> </i>
                <input type="submit" name="save" id="save" value="Connectez-Vous!">
                <p text-align="justify"> 
                  <h4>
                       <a href="pages/Inscription.php"> S'inscrire</a> 
                    </h4>
                </p>
            </form>
    </div>
    <?php if(!empty($message)){?>
  <div id="message"><?php echo $message?></div>
  <?php } ?> 
</body>
</html>