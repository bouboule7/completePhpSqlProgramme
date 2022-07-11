<?php
session_start();
include_once("./../fonction/connectionBDD.php");
if($_SESSION['statue']==1)
    header('Location: ./../page/accueil');
$_SESSION['nom'] = htmlspecialchars($_POST['nom']);
$_SESSION['pseudo'] = htmlspecialchars($_POST['nom']);
$_SESSION['compte'] = htmlspecialchars($_POST['nom']);

if((htmlspecialchars($_POST['password']))==(htmlspecialchars($_POST['password2'])))
{

    $bdd=connectionBDD();
    // Si tout va bien, on peut continuer
    if(!(htmlspecialchars($_POST['mail'])))
        $_POST['mail']=$_SESSION['mail'];
    else
    $_SESSION['mail']=htmlspecialchars($_POST['mail']);
    $req = $bdd->prepare('INSERT INTO utilisateur( mail,motdepasse,pseudo) VALUES( :mail, :motdepasse, :pseudo)');
    $req->execute(array(
                'mail' => htmlspecialchars($_POST['mail']),
                'motdepasse' => password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT),
                'pseudo' => htmlspecialchars($_POST['nom']." ".$_POST['prenom'])
    ));
    
    $req->closeCursor();

    $req=$bdd->prepare('SELECT id FROM utilisateur WHERE mail =?');
    $req->execute(array($_POST['mail']));
    $donne=$req->fetch();

    $req->closeCursor();
    include_once('./../classe/User.class.php');
    include_once('./../classe/Compte.class.php');
    $cePC=new User(0,$_POST['numero'],$_POST['sexe'],$_POST['pays'],$_POST['nationality']);

    $_SESSION['statue']=1;  

     header('Location: ./../page/accueil');
}
header('Location: ./../page/singup?motdp=incorrect');

 ?>