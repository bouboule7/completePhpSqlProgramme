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
    $req = $bdd->prepare('INSERT INTO utilisateur( mail,motdepasse,pseudo) VALUES( :mail, :motdepasse, :pseudo)');
    $req->execute(array(
                'mail' => htmlspecialchars($_GET['mail']),
                'motdepasse' => password_hash(htmlspecialchars($_GET['password']), PASSWORD_BCRYPT),
                'pseudo' => htmlspecialchars($_GET['nom']." ".$_GET['prenom'])
    ));
    
    $req->closeCursor();

    $req=$bdd->prepare('SELECT id FROM utilisateur WHERE mail =?');
    $req->execute(array($_GET['mail']));
    $donne=$req->fetch();

    $req->closeCursor();
    include_once('./../classe/User.class.php');
    include_once('./../classe/Compte.class.php');
    $cePC=new User(0,$_GET['numero'],$_GET['sexe'],$_GET['pays'],$_GET['nationality']);

    $_SESSION['statue']=1;  

     header('Location: ./../page/accueil/accueil.php');
}
header('Location: ./../page/singup/singup.php?motdp=incorrect');

 ?>