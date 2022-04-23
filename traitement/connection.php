<?php 
session_start();
if(htmlspecialchars($_GET['mail'])){
    $_SESSION['mail']=htmlspecialchars($_GET['mail']);
    $_SESSION['havemail']=false;
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
    $req = $bdd->query('SELECT mail FROM utilisateur');
    while($donne=$req->fetch())
    {
        if($donne['mail']==$_SESSION['mail']){
            $_SESSION['havemail']=true;
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
            $req = $bdd->prepare('SELECT motdepasse FROM utilisateur WHERE mail=?');
            $req->execute(array($_SESSION['mail']));
            
            while($donne=$req->fetch())
           {
               
               if ($donne['motdepasse']==htmlspecialchars($_GET['password']))
               {
                   header('Location: ./../page/accueil/accueil.php');
                    $_SESSION['statue']=1;
               }
                else
                    header('Location: ./../page/singin/singin.php?mdp=error');  
                       
           }  
           break;
            $req->closeCursor();
        
        }
    }
    if($_SESSION['havemail']==false)
        header('Location: ./../page/singup/singup.php'); 
    $req->closeCursor();
}
try{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=baseDeDonne1', 'root', 'Tsaramanga1&');
    //   mysql_connect("localhost", "root", "");
    // mysql_select_db("baseDeDonne");
    // -------
}
catch(Exception $e){
// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->POSTMessage());
}
// Si tout va bien, on peut continuer
    $req = $bdd->prepare('SELECT motdepasse FROM utilisateur WHERE mail=?');
    $req->execute(array($_SESSION['mail']));
           
    while($donne=$req->fetch())
    {
               
        if ($donne['motdepasse']==htmlspecialchars($_GET['password']))
       {
           header('Location: ./../page/accueil/accueil.php');
            $_SESSION['statue']=1;
       }
        else
            header('Location: ./../page/singin/singin.php?mdp=error');  
   }  
           
    $req->closeCursor();
?>