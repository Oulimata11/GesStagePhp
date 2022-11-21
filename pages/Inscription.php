<?php
session_start();
@$nom=$_POST['nom'];
@$prenom=$_POST['prenom'];
@$username=$_POST['username'];
@$password=$_POST['password'];
@$repass=$_POST['repass'];
@$save=$_POST['saved'];
$afficher='';
if(isset($save)){
    if(empty($nom)) $afficher="<li>Nom incorrect</li>";
    if(empty($prenom)) $afficher="<li>Prenom incorrect</li>";
    if(empty($username)) $afficher="<li>Login incorrect</li>";
    if(empty($password)) $afficher="<li>Mot de Pass incorrect</li>";
    if($password!=$repass) $afficher="<li>mot de Pass non identique</li>";
    if(empty($message)){
        include("../sessions/connexion.php");
        $res=$connexion->prepare("SELECT  idUser from users where username=? limit 1");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute(array($username));
        $tab=$res->fetchAll();
        if(count($tab)>0)
        $afficher="<li>lNom d'utilisateur existant</li>";
        else{
         
    $insert="INSERT INTO users(idUser,nom,prenom,dateInscription,username,password)
             values('','$nom','$prenom',now(),'$username',md5('$password'))";
             $connexion->exec($insert);
              
            header("location:../Index.php");
        }
      
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="../css/styleInscription.css">
    <script src="https://kit.fontawesome.com/cf6fa412bd.js"> </script>
</head>
<body>
        <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
        <div class='alert alert-success corner-radius mt-4'
         style="background-color:rgb(246, 219, 245); margin-top:-300px;">
                <p>Inscrit avec Succés!</p>
        </div>
        <?php unset($_GET['success']);} ?>

    <div class="best">
        <div class="buttonsForm">
            <div class="btnColor">  
            <button id="btnSignin"> Inscription</button> </div>  
        </div>
        <form action=" " id="signin" method="post">
        <label for="">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="Nom" required/>
        <label for="">Prenom</label>
            <input type="text" name="prenom" id="prenom" placeholder="Prenom" required/>
        <label for="">Login</label>
            <input type="text" name="username"  id="username" placeholder="UserName" required/>
        <label for="">Mot de Passe</label>
            <input type="password" name="password" id="password" placeholder="Password" required/>
        <label for="">Confirmer le Mot de Pass</label>
            <input type="password" name="repass" id="repass" placeholder="Password" required/>
                <input type="submit" value="Enregistrer"  id="saved" name="saved">
            </form>
            <p> 
                  <h5>
                       <a href="../Index.php">Deja un Compte?Se connecter</a> 
                    </h5>
            </p>
    </div>
    <?php if(!empty($message)){?>
  <div id="message"><?php echo $message?></div>
  <?php } ?>
</body>
</html>