<?php
session_start();
$_SESSION['havemail']=false;
$_SESSION['mail']=htmlspecialchars($_GET['mail']);
    try
    {
    // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=baseDeDonne1', 'root', 'Tsaramanga1&');
     //   mysql_connect("localhost", "root", "");
       // mysql_select_db("baseDeDonne");
// -------
    }
    catch(Exception $e)
    {
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->POSTMessage());
    }
    // Si tout va bien, on peut continuer

    $req = $bdd->query('SELECT * FROM utilisateur');
   while($donne=$req->fetch())
   {
       if($donne['mail']==htmlspecialchars($_GET['mail']))
       {
        $_SESSION['havemail']=true;
       }
       
   }

   $req->closeCursor();
   
   if($_SESSION['havemail']==true)
        header('Location: ./../page/singin/singin.php');
   else
       header('Location: ./../page/singup/singup.php'); 
 ?>