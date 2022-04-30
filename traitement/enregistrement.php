<?php
session_start();
include_once("./../fonction/connectionBDD.php");
if($_SESSION['statue']==1)
    header('Location: ./../page/accueil/accueil.php');
$_SESSION['nom'] = htmlspecialchars($_GET['nom']);
$_SESSION['pseudo'] = htmlspecialchars($_GET['nom']);
$_SESSION['compte'] = htmlspecialchars($_GET['nom']);

if((htmlspecialchars($_GET['password']))==(htmlspecialchars($_GET['password2'])))
{

    $bdd=connectionBDD();
    // Si tout va bien, on peut continuer
    if(!(htmlspecialchars($_POST['mail'])))
        $_GET['mail']=$_SESSION['mail'];
    else
    $_SESSION['mail']=htmlspecialchars($_GET['mail']);
    $req = $bdd->prepare('INSERT INTO utilisateur(nom, mail,motdepasse,pseudo,compte) VALUES(:nom, :mail, :motdepasse, :pseudo,:compte)');
    $req->execute(array(
                'nom' => htmlspecialchars($_GET['nom']),
                'mail' => htmlspecialchars($_GET['mail']),
                'motdepasse' => htmlspecialchars($_GET['password']),
                'pseudo' => htmlspecialchars($_GET['nom']),
                'compte' => htmlspecialchars($_GET['nom'])
    ));     
    $_SESSION['statue']=1;  

    include_once('./../classe/User.class.php');
    include_once('./../classe/Compte.class.php');
    
    $req->closeCursor();
    $cePC=new User(0,$_GET['numero'],$_GET['sexe'],$_GET['pays'],$_GET['nationality']);
     header('Location: ./../page/accueil/accueil.php');
}
header('Location: ./../page/singup/singup.php?motdp=incorrect');

 ?>