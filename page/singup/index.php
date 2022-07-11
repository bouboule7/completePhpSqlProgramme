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
    <title>Sing Up</title>
</head>
<body>

<link rel="stylesheet" href="./singup/singup.css">
    <?php 
    include("./../../component/entete/entete.html"); 
    include("./../../component/sing/sing.html");
    ?>
    <p>Veuillez remplir le formulaire suivant pour se registrer</p>
    <div class="singupform">
        <div class="espace"></div>
        <form action="./../../traitement/enregistrement.php" method="post">
        <div class="blok">
            <div class="eespace"></div>
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="nom" required/>

            <div class="eespace"></div>
            <label for="nom">Prenom:</label>
            <input type="text" name="prenom" id="prenom" class="prenom" required/>
            <div class="eespace"></div>
        </div>
            <label for="mail">E-mail:</label>
            <br/>
            <input placeholder="<?php echo(htmlspecialchars($_SESSION['mail'])); ?>" type="email" name="mail" id="mail" class="mail"/>
            <br/>
            <label for="telephone">Telephone:</label>
            <br/>
            <input type="number" name="numero" id="numero" class="numero" required/>
            <br/>
            <label for="password" class="<?php if($_POST['motdp']) echo('rouge');?>">Mot de passe: </label>
            <br/>
            <input type="password" name="password" id="password" class="password" required/>
            <br/>
            <label for="password2" class="<?php if($_POST['motdp']) echo('rouge');?>">Confirmer le mot de passe:</label>
            <br/>
            <input type="password" name="password2" id="password2" class="password2" required/>
            <br/>
            <label for="sexe">Sexe:</label>
            </br>
            <select name="sexe">
                <option value="homme">homme</option>
                <option value="femme">femme</option>
            </select>
            <br/>
            <label for="choix">Pays:</label>
            </br>
            <select name="pays">
                <option value="Madagascar">Madagascar</option>
                <option value="Chine">Chine</option>
                <option value="France">France</option>
                <option value="Amerique">Amerique</option>
            </select>
            <br/>
            <label for="nationality">Nationalité:</label>
            <br/>
            <select name="nationality">
                <option value="Malagasy">Malagasy</option>
                <option value="Chinoi">Chinoi</option>
                <option value="Francais">Francais</option>
                <option value="Ameriquain">Ameriquain</option>
            </select>
            <br/>
            <button type="submit">Valider</button>
            <button type="reset">Reset</button>
        </form>
        <div class="espace"></div>
    </div>
</body>
</html>