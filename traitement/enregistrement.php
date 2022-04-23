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
        $_POST['mail']=$_SESSION['mail'];
    $req = $bdd->prepare('INSERT INTO utilisateur(pseudo, mail,numero, motdepasse, sexe, pays, nationality) VALUES(:pseudo, :mail,:numero, :motdepasse, :sexe, :pays,:nationality)');
    $req->execute(array(
                'pseudo' => htmlspecialchars($_POST['nom']),
                'mail' => htmlspecialchars($_POST['mail']),
                'numero' => htmlspecialchars((int)$_POST['telephone'])  ,
                'motdepasse' => htmlspecialchars($_POST['password']),
                'sexe' => htmlspecialchars($_POST['sexe']),
                'pays' => htmlspecialchars($_POST['pays']),
                'nationality' => htmlspecialchars($_POST['nationality'])
    ));     
    $_SESSION['statue']=1;   
     header('Location: ./../page/accueil/accueil.php');
}
header('Location: ./../page/singup/singup.php?motdp=incorrect');

echo(htmlspecialchars($_GET['password']).(htmlspecialchars($_GET['password2'])));
 ?>