<?php
session_start();
if($_SESSION['statue']==1)
    header('Location: ./../page/accueil/accueil.php');

if((htmlspecialchars($_GET['password']))==(htmlspecialchars($_GET['password2'])))
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=baseDeDonne1', 'root', 'Tsaramanga1&');
// -------
    }
    catch(Exception $e)
    {
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->POSTMessage());
    }
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

    echo("avan class");
    $cePC=new User(0);
            echo("ici");
     header('Location: ./../page/accueil/accueil.php');
}
header('Location: ./../page/singup/singup.php?motdp=incorrect');

echo(htmlspecialchars($_GET['password']).(htmlspecialchars($_GET['password2'])));
 ?>