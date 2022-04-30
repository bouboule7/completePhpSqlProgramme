<?php
session_start();//ceci est a fin de pouvoir utiliser des variables de sessions globales dans tout l'appli?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./message.css">
    <title>Message</title>
</head>
<body>

    <?php 
    function vous($nom,$session)
    {
        if($nom==$session)
            return ("vous");
        else
            return ("lui");
    }
    include('./../../fonction/pseudo.php');
    include('./../../fonction/connectionBDD.php');
    include('./../../fonction/BDname.php');
    
    include("./../../component/entete/entete.html"); 
    if($_SESSION['statue']==1){
        include("./../../component/navigation/navigation.php"); 

        $bdd=connectionBDD();
        if(isset($_GET['amis']))
        {
            echo('<h1>'.pseudo($bdd,$_GET['amis']).'</h1>');
            $req=$bdd->query('SELECT * FROM '.BDname($_SESSION['nom'],$_GET['amis']).'');
            while($donne=$req->fetch())
            {
                
                echo('<div class="blocmessage '.vous(pseudo($bdd,$_SESSION['nom']),$donne['pseudo']).'">'.$donne["pseudo"].'<br/>'.$donne["jour"].' '.$donne["temps"].'<br/>'.$donne["message"].'</div>');
            }
            ?>
            <form action="./../../traitement/nouveaumessage.php?amis=<?php echo($_GET['amis']); ?>" method="post">
                <label for="message">Nouvelle message:</label>
                <br/>
                <textarea required name="nouveaumessage" class="nouveaumessage" rows="5" ></textarea>
                <br/>
                <button type="submit" class="envoyer">Envoyer</button>
            </form>

            <?php
        }
        else{
            $req=$bdd->query('SELECT * FROM '.$_SESSION["nom"].'discussion');
            while($donne=$req->fetch()){
                if($donne['nouveau']==1)
                    $class="nouveau";
                else
                    $class="";
                echo('<a class="'.$class.'" href="./../../traitement/messagevu.php?amis='.$donne['nom_amis'].'">'.pseudo($bdd,$donne["nom_amis"]).'<br/></a>');
            }
            $req->closeCursor();
        }

        include('./../../component/pied/pied.php');
    }
    else{
        include("./../../component/denied/denied.php");
        include("./../../component/login/login.php");
    }
    ?>

</body>
</html>