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
    <!--font awesome scriptt-->
    <script src="https://kit.fontawesome.com/be9a310643.js" crossorigin="anonymous"></script>
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
    include('./../../fonction/presentationEnteteMessage.php');

    
    if($_SESSION['statue']==1){
        include("./../../component/navigation/navigation.php"); 
     
    $a=0; $b=10;   $tableauMessage=array();
    $bdd=connectionBDD();
    $req=$bdd->query('SELECT * FROM '.$_SESSION["id"].'discussion LIMIT '.$a.','.$b.'');
    while($donne=$req->fetch()){
        array_unshift($tableauMessage,$donne);
     }  
    $req->closeCursor();
            
        if(isset($_GET['id']))
        {
            ?>
        <div class="row mb-3 messageDiscussion">
            <div class="row contenuDiscuss row-cols-1 col-md-9 ">
<?php
            echo('<h1>'.pseudo($bdd,$_GET['id']).'<a class="actualiser" href="./message"><img class="actualiser" src="./../../assets/img/refresh.gif"/></a></h1>');
            echo("<a href='./message?id=".$_GET['id']."&idMessage=".$idMessage."'>voir les anciens messages</a>");?>
            <div class="messageDiscussion2Personne pe-3" >
            <?php
            if(isset($_GET['idMessage']))
                 $idMessage=(int)$_GET['idMessage']-5;    
             $messagelimit=0;
             if($idMessage>5){
                 $messagelimit=$idMessage-5;
             }
             $req=$bdd->query('SELECT id FROM '.BDname($_SESSION['id'],$_GET['id']).' ORDER BY id DESC LIMIT 0,1 ');
             $idMessage=($req->fetch())['id'];
             $req->closeCursor();
             $req=$bdd->query('SELECT * FROM '.BDname($_SESSION["id"],$_GET["id"]).' ORDER BY id LIMIT '.$messagelimit.','.$idMessage.'');
             while($donne=$req->fetch())
             {
                 if($donne["pseudo"]==$_SESSION['pseudo']){
                    $reqImage=$bdd2->query('SELECT * FROM '.$_GET["id"].'photo ');
                    $nombrePhotoProfilSession=0;
                    while($donneImage=$reqImage->fetch())
                    {
                        if($donneImage['type']=="profil"){
                            if($nombrePhotoProfilSession<$donneImage['photoId'])
                                $nombrePhotoProfilSession=$donneImage['photoId'];
                        }
                    }
                    ?>
                 <div class="d-flex flex-row justify-content-end">
                    <div>
                      <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary"> <?php echo $donne["message"]; ?></p>
                      <p class="small me-3 mb-3 rounded-3 text-muted"><?php echo $donne["temps"]."|".$donne["jour"]; ?></p>
                    </div>
                    <img src="<?php
                            if($nombrePhotoProfilSession==0) 
                                echo('./../../assets/img/profil.jpeg');
                            else
                            echo('./../../traitement/image.php?id='.$_GET['id'].'&type=profil&photoId='.$nombrePhotoProfilSession);
                        ?>" alt="photo de profil" class="imageMessagePetit"/>
                  </div><?php
                 }
                else{
                    $reqImage=$bdd2->query('SELECT * FROM '.$_SESSION["id"].'photo ');
                    $nombrePhotoProfil=0;
                    while($donneImage=$reqImage->fetch())
                    {
                        if($donneImage['type']=="profil"){
                            if($nombrePhotoProfil<$donneImage['photoId'])
                                $nombrePhotoProfil=$donneImage['photoId'];
                        }
                    }
                    ?>
                    <div class="d-flex flex-row justify-content-start">
                    <img src="<?php
                            if($nombrePhotoProfil==0) 
                                echo('./../../assets/img/profil.jpeg');
                            else
                            echo('./../../traitement/image.php?id='.$_SESSION['id'].'&type=profil&photoId='.$nombrePhotoProfil);
                        ?>" alt="photo de profil" class="imageMessagePetit"/>
                    <div>
                      <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;"> <?php echo $donne["message"]; ?></p>
                      <p class="small ms-3 mb-3 rounded-3 text-muted float-end"><?php echo $donne["temps"]."|".$donne["jour"]; ?></p>
                    </div>
                  </div>
                <?php }
                }
            ?>

                </div>

                <form class="text-muted d-flex justify-content-start align-items-center pe-3 " method="post" action="./../../traitement/nouveaumessage.php?id=<?php echo($_GET['id']); ?>" method="post">
                  <img src="<?php
                            if($nombrePhotoProfilSession==0) 
                                echo('./../../assets/img/profil.jpeg');
                            else
                            echo('./../../traitement/image.php?id='.$_GET['id'].'&type=profil&photoId='.$nombrePhotoProfilSession);
                        ?>" alt="photo de profil" class="imageMessage" >
                  <textarea type="text" class="form-control " id="nouveaumessage" name="nouveaumessage" placeholder="Nouveau message"></textarea>
                  <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                  <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
                  <button type="submit" class="btn-lien"><i class="fas fa-paper-plane"></i></button>
                </form>

            </div>

             <div class="col-md-3 themed-grid-col >
                 <?php
                    for($i=0;$i<10;$i++){                     
                        presentationEnteteMessage($tableauMessage[$i]);  
                   }
                ?> 
            </div>
        </div>
            <?php
        }
        else{

            ?>

<div class="message">
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
                    <?php
                        for($i=0;$i<10;$i++)
                            presentationEnteteMessage($tableauMessage[$i]);  
                    ?> 
                    <li class="list-group-item ">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="introMessage">
                                Joov'Teck
                            </div>
                            <span class="badge badge-primary badge-pill">*</span> 
                        </div>
                        <div class="paragraphe">
                            <p class="mb-1">Nous envoyer un message.</p>
                            <small class="date">3 days ago</small>
                        </div>
                    </li>
                </ul>
                <form action="./message" method="post">
                    <input type="hidden" name="lala" id="lala" value=" hello"/>
                    <button type="submit" class="btn btn-outline-primary plus">Afficher plus de message</button>
                </form>
        </div>
<?php        }
        ?>
</div>
<?php

//        include('./../../component/pied/pied.php');
    }
    else{
        include("./../../component/denied/denied.php");
        include("./../../component/login/login.php");
    }
    ?>

</body>
</html>