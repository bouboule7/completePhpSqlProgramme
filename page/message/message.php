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
    include('./../../fonction/BDname.php');
    
    if($_SESSION['statue']==1){
        include("./../../component/navigation/navigation.php"); 
        ?>
<div class="message">
<h3>Message <a class="actualiser" href="./message.php"><img class="actualiser" src="./../../assets/img/refresh.gif"/></a></h2>
<?php
$bdd=connectionBDD();
        if(isset($_GET['id']))
        {
            echo('<h1>'.pseudo($bdd,$_GET['id']).'</h1>');
            
            $req=$bdd->query('SELECT id FROM '.BDname($_SESSION['id'],$_GET['id']).' ORDER BY id DESC LIMIT 0,1 ');
            $idMessage=($req->fetch())['id'];
            
            if(isset($_GET['idMessage']))
                $idMessage=(int)$_GET['idMessage']-5;    
            $messagelimit=0;
            if($idMessage>5){
                $messagelimit=$idMessage-5;
                echo("<a href='./message.php?id=".$_GET['id']."&idMessage=".$idMessage."'>voir les anciens messages</a>");
            }
            $req->closeCursor();
            $req=$bdd->query('SELECT * FROM '.BDname($_SESSION["id"],$_GET["id"]).' ORDER BY id LIMIT '.$messagelimit.','.$idMessage.'');
            while($donne=$req->fetch())
            {
                
                echo('<div class="blocmessage '.vous(pseudo($bdd,$_SESSION['id']),$donne['pseudo']).'">'.$donne["pseudo"].'<br/>'.$donne["jour"].' '.$donne["temps"].'<br/>'.$donne["message"].'</div>');
            }
            ?>
            <form action="./../../traitement/nouveaumessage.php?id=<?php echo($_GET['id']); ?>" method="post">
                <label for="message">Nouvelle message:</label>
                <br/>
                <textarea required name="nouveaumessage" class="nouveaumessage" rows="5" ></textarea>
                <br/>
                <button type="submit" class="envoyer">Envoyer</button>
            </form>

            <?php
        }
        else{

            ?>


        <div class="messageList">
            <ul class="list-group">
            <li class="list-group-item ">
                <div class="d-flex justify-content-between align-items-center">
                    Cras justo odio
                    <span class="badge badge-primary badge-pill">14</span> 
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small class="date">3 days ago</small>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Dapibus ac facilisis in
                <span class="badge badge-primary badge-pill">2</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Morbi leo risus
                <span class="badge badge-primary badge-pill">1</span>
            </li>
        </ul>
        </div>



<?php
            $req=$bdd->query('SELECT * FROM '.$_SESSION["id"].'discussion');
            while($donne=$req->fetch()){
                if($donne['nouveau']==1)
                    $class="nouveau";
                else
                    $class="";
                echo('<a class="'.$class.'" href="./../../traitement/messagevu.php?id='.$donne['nom_amis'].'">'.pseudo($bdd,$donne["nom_amis"]).'<br/></a>');
            }
            $req->closeCursor();
        }
        ?>
</div>
<?php

        include('./../../component/pied/pied.php');
    }
    else{
        include("./../../component/denied/denied.php");
        include("./../../component/login/login.php");
    }
    ?>

</body>
</html>