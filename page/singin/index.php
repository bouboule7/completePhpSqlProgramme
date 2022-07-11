<?php
session_start();//ceci est a fin de pouvoir utiliser des variables de sessions globales dans tout l'appli
if($_SESSION['statue']==1)
    header('Location: ./../accueil');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing In</title>
</head>
<body>

<link rel="stylesheet" href="./singin/singin.css">
    <?php 
    include("./../../component/entete/entete.html"); 
    include("./../../component/sing/sing.html");
    ?>

<div class="login">
    <div class="espace"></div>
    <form method="post" action="./../../traitement/connection.php">
        <h1>Sing As</h1>
        <br/>
        <label for="mail">E-mail</label>
        <br/>
        <input placeholder="<?php echo(htmlspecialchars($_SESSION['mail'])); ?>" type="mail" name="mail" id="mail" class="mail" />
        <br/>
        <label for="password">Mot de passe</label>
        <?php if(htmlspecialchars($_GET['mdp']))
                echo('<span class="error"> incorrect</span>');
        ?>
        <br/>
        <input type="password" name="password" id="password" class="password" required/>
        <br/>
        <a href="./../../page/singup">Pas encore de compte?</a>
        <br/>
        <button type="submit">Se connecter</button>
    </form>
    <div class="espace"></div>
</div>