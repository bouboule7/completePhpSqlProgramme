<?php
session_start();//ceci est a fin de pouvoir utiliser des variables de sessions globales dans tout l'appli?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing Up</title>
</head>
<body>

<link rel="stylesheet" href="./singup.scss">
    <?php 
    include("./../../component/entete/entete.html"); 
    ?>
    <p>Veuillez remplir le formulaire suivant pour se registrer</p>
    <div class="singup">
        <div class="espace"></div>
        <form action="./../../traitement/enregistrement.php" method="POST">
            <label for="nom">Nom:</label>
            <br/>
            <input type="text" name="nom" id="nom" class="nom" required/>
            <br/>
            <label for="mail">E-mail:</label>
            <br/>
            <input type="mail" name="mail" id="mail" class="mail" required/>
            <br/>
            <label for="password">Mot de passe:</label>
            <br/>
            <input type="password" name="password" id="password" class="password"/>
            <br/>
            <label for="password2">Confirmer le mot de passe:</label>
            <br/>
            <input type="password" name="password2" id="password2" class="password2"/>
            <br/>
            <label for="datedenaissance">Date de naissance:</label>
            <br/>
            <input type="date" name="datedenaissance" id="datedenaissance" class="datedenaissance"/>
            <br/>
            <button type="submit">Valider</button>
            <button type="reset">Reset</button>
        </form>
        <div class="espace"></div>
    </div>
</body>
</html>