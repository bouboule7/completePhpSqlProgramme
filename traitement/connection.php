<?php 
session_start();
include('./../fonction/connectionBDD.php');

$_SESSION['havemail']=1;

if(htmlspecialchars($_GET['mail'])){
    $_SESSION['mail']=htmlspecialchars($_GET['mail']);
    $_SESSION['havemail']=0;
}

    $bdd=connectionBDD();
    // Si tout va bien, on peut continuer
    $req = $bdd->query('SELECT mail FROM utilisateur');
    while($donne=$req->fetch())
    {
        if($donne['mail']==$_SESSION['mail'])
            $_SESSION['havemail']=1;
    }

    $req->closeCursor();

if($_SESSION['havemail']==0)
    header('Location: ./../page/singup/singup.php'); 

    // Si tout va bien, on peut continuer
    $req = $bdd->prepare('SELECT motdepasse FROM utilisateur WHERE mail=?');
    $req->execute(array($_SESSION['mail']));
            
    while($donne=$req->fetch())
   {
               
       if ($donne['motdepasse']==htmlspecialchars($_GET['password']))
            {
                include_once('./../classe/User.class.php');

                $req->closeCursor();

                $cePC=new User(1,NULL,NULL,NULL,NULL);

               header('Location: ./../page/accueil/accueil.php');
                $_SESSION['statue']=1;
            }
    }
    $req->closeCursor();

    header('Location: ./../page/singin/singin.php?mdp=error');  

?>