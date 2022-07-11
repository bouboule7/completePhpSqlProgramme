<?php
session_start();
$_SESSION['havemail']=false;
$_SESSION['mail']=htmlspecialchars($_POST['mail']);
    
include("./../fonction/connectionBDD.php");

    $bdd= connectionBDD();
    // Si tout va bien, on peut continuer

    $req = $bdd->query('SELECT * FROM utilisateur');
   while($donne=$req->fetch())
   {
       if($donne['mail']==htmlspecialchars($_POST['mail']))
       {
        $_SESSION['havemail']=true;
       }
       
   }

   $req->closeCursor();
   
   if($_SESSION['havemail']==true)
        header('Location: ./../page/singin');
   else
       header('Location: ./../page/singup'); 
 ?>