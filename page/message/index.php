<?php
session_start();//ceci est a fin de pouvoir utiliser des variables de sessions globales dans tout l'appli?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./message/message.css">
    <title>Message</title>
</head>
<body>
<div class="message">
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
<?php
$bdd=connectionBDD();
        if(isset($_POST['id']))
        {
            echo('<h1>'.pseudo($bdd,$_POST['id']).'</h1>');
            
            $req=$bdd->query('SELECT id FROM '.BDname($_SESSION['id'],$_POST['id']).' ORDER BY id DESC LIMIT 0,1 ');
            $idMessage=($req->fetch())['id'];
            
            if(isset($_POST['idMessage']))
                $idMessage=(int)$_POST['idMessage']-5;    
            $messagelimit=0;
            if($idMessage>5){
                $messagelimit=$idMessage-5;
                echo("<a href='./?id=".$_POST['id']."&idMessage=".$idMessage."'>voir les anciens messages</a>");
            }
            $req->closeCursor();
            $req=$bdd->query('SELECT * FROM '.BDname($_SESSION["id"],$_POST["id"]).' ORDER BY id LIMIT '.$messagelimit.','.$idMessage.'');
            while($donne=$req->fetch())
            {
                
                echo('<div class="blocmessage '.vous(pseudo($bdd,$_SESSION['id']),$donne['pseudo']).'">'.$donne["pseudo"].'<br/>'.$donne["jour"].' '.$donne["temps"].'<br/>'.$donne["message"].'</div>');
            }
            ?>
            <form action="./../../traitement/nouveaumessage.php?id=<?php echo($_POST['id']); ?>" method="post">
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

    <div class="enteteMessage">
        <h3>Message <a class="actualiser" href="./message"><img class="actualiser" src="./../../assets/img/refresh.gif"/></a></h3>
        <h5 class="btn btn-success">Lancer une nouvelle discussion</h5>
    </div>
        <p class="enteteMessage">
            <form action="./lala.php" method="post">
            <input class="cacher" name="lala" id="lala" type="text" value=" hello"/>
            <button type="submit" class="btn-lien">Chercher une discussion</button>
        </form>
          <form class="d-flex mt-3 mt-lg-0" method="post" action="./../../page/recherche" role="search">
            <input class="form-control me-2" name="recherche" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </p>
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

<?php
        
            $req=$bdd->query('SELECT * FROM '.$_SESSION["id"].'discussion');
            while($donne=$req->fetch()){
                if($donne['nouveau']==1)
                    $class="nouveau";
                else
                    $class="";
            echo('<li class="justify-content-between align-items-center list-group-item ">
                    <a class="'.$class.'" href="./../../traitement/messagevu.php?id='.$donne['nom_amis'].'">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                        <div class="introMessage">
                            <img class="photoDeProfilMessage rounded-circle" src="');
                            $bdd2=connectionBDD();
                            $req=$bdd2->query('SELECT * FROM '.$donne['nom_amis'].'photo ');
                            $nombrePhotoProfil=0;
                            while($donneImage=$req->fetch())
                            {
                                if($donneImage['type']=="profil"){
                                    if($nombrePhotoProfil<$donneImage['photoId'])
                                        $nombrePhotoProfil=$donneImage['photoId'];
                                }
                            }
                                    if($nombrePhotoProfil==0) 
                                        echo('./../../assets/img/profil.jpeg');
                                    else{
                                        echo('./../../traitement/image.php?id='.(string)$donne["nom_amis"].'&type=profil&photoId='.(string)$nombrePhotoProfil);
                                        }
                                                                                echo('" alt="photo de profil"/>
        
                                '.pseudo($bdd,$donne["nom_amis"]).'
                        </div>
                            <span class="badge badge-primary badge-pill">14</span> 
                        </div>
                        <div class="paragraphe">
                            <p class="mb-1">Donec id elit non mi lore iezy  ezyrhid uia daui hahdu ady iauzruihaz porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                            <small class="date">3 days ago</small>
                        </div>
                    </a>
                </li>');
            }
            $req->closeCursor();
        }
        ?>
                </ul>
            <form action="./message" method="post">
                <input type="hidden" name="lala" id="lala" value=" hello"/>
                <button type="submit" class="btn btn-outline-primary plus">Afficher plus de message</button>
            </form>
            </div>
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