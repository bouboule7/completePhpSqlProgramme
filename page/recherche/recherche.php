<?php
session_start();//ceci est a fin de pouvoir utiliser des variables de sessions globales dans tout l'appli?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
    <link rel="stylesheet" href="./recherche.css">
</head>
<body>
    <?php 
    $trouver=0;
    include('./../../fonction/presentationcourt.php');
    include("./../../fonction/connectionBDD.php");

    include("./../../component/entete/entete.html"); 
        if($_SESSION['statue']==1){
                        
            include('./../../component/navigation/navigation.php');
            if($_POST['recherche'])
            {
                ?>
                <p>Resultat des recherches :</p> <?php echo($_POST['recherche']);
                $bdd=connectionBDD();
                $req=$bdd->query("SELECT id ,nom,pseudo FROM utilisateur");
                while($donne=$req->fetch())
                {
                    if($donne['pseudo']==htmlspecialchars($_POST["recherche"]))
                    {
                        echo(presentationcourt($donne['nom']));
                        $trouver=1;
                    }
                }
                $req->closeCursor();
                if($trouver==0)
                    echo("<p>Aucun personne correspondant.</p>");
            }
            else
                echo("Veuillez entrez dans la barre de recherche le nom de la personne a rechercher.");

            include('./../../component/pied/pied.php');
        }
        else{
            include("./../../component/login/login.php");
        }
        ?>
</body>
</html>