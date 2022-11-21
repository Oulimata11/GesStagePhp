<?php
        
        try
        { $connexion= new PDO('mysql:host=127.0.0.1;dbname=ges_stage','root','');
          
        }   
        catch(PDOException $e){
             echo $e->getMessage();
             exit();
        }

       
?>