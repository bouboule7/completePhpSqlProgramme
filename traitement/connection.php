<?php 
session_start();
include('./../fonction/connectionBDD.php');
if(htmlspecialchars($_GET['mail'])){
    $_SESSION['mail']=htmlspecialchars($_GET['mail']);
    $_SESSION['havemail']=false;
    
    // Si tout va bien, on peut continuer
    $req = $bdd->query('SELECT mail FROM utilisateur');
    while($donne=$req->fetch())
    {
        if($donne['mail']==$_SESSION['mail']){
            $_SESSION['havemail']=true;
            
        $bdd=connectionBDD();

            // Si tout va bien, on peut continuer
            $req = $bdd->prepare('SELECT motdepasse FROM utilisateur WHERE mail=?');
            $req->execute(array($_SESSION['mail']));
            
            while($donne=$req->fetch())
           {
               
               if ($donne['motdepasse']==htmlspecialchars($_GET['password']))
               {
                    include_once('./../classe/User.class.php');

                    $cePC=new User(htmlspecialchars($_GET['mai']),1);

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

$bdd=connectionBDD();
// Si tout va bien, on peut continuer
    $req = $bdd->prepare('SELECT motdepasse FROM utilisateur WHERE mail=?');
    $req->execute(array($_SESSION['mail']));
           
    while($donne=$req->fetch())
    {
               
        if ($donne['motdepasse']==htmlspecialchars($_GET['password']))
       {
        include_once('./../classe/User.class.php');

        $cePC=new User(htmlspecialchars($_SESSION['mai']),1);
        
           header('Location: ./../page/accueil/accueil.php');
            $_SESSION['statue']=1;
       }
        else
            header('Location: ./../page/singin/singin.php?mdp=error');  
   }  
           
    $req->closeCursor();
?>