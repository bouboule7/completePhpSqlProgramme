<?php
session_start();
include_once('./../fonction/connectionBDD.php');
include_once("./../fonction/temps.php");
$bdd=connectionBDD();

    $img_blob = file_get_contents ($_FILES['photo1']['tmp_name']);
    $image_name = $_FILES["photo1"]["name"];
    $image_size = $_FILES["photo1"]["size"];
    $image_type = $_FILES["photo1"]["type"];
    if($image_size>50000)    
        header('Location: ./../page/newPublicationPhoto/newPublicationPhoto.php');

    $req=$bdd->query('SELECT photoId FROM '.$_SESSION["id"].'photo ORDER BY photoId DESC LIMIT 0,1 ');
    $idPhoto=($req->fetch())['photoId'];
     $req->closeCursor();
    // ajout des photo dans la table
    $req=$bdd->prepare("INSERT INTO ".$_SESSION['id']."photo (type, donneBinaire,nomImage,typeimage)VALUES (:type, :donneBinaire,:nomImage,:typeimage)");
    $req->execute(array('type'=>"publication",
                        'donneBinaire'=>$img_blob,
                        'nomImage'=>$image_name,
                        'typeimage'=>$image_type));
    $req->closeCursor();


        $req=$bdd->query('INSERT INTO publication(pub) VALUE (1)');
        $req->closeCursor();
        $req=$bdd->query('SELECT publicationId FROM publication ORDER BY publicationId DESC LIMIT 0,1 ');
        
        $idPublication=($req->fetch())['publicationId'];
        $req->closeCursor();
        $nomTable=(string)($idPublication).'publication';
        $req=$bdd->prepare('INSERT INTO '.$_SESSION["id"].'post VALUE (:postname)');
        $req->execute(array('postname'=>$nomTable));
        $req->closeCursor();
        $req = $bdd->query('CREATE TABLE '.$nomTable.' (id int,contenueText text,photo1 int, photo2 int, photo3 int, jour date, heure time, commentaire text, idCommentateur int, datecommentaire date, heurcommentaire time, reactionA int, reactionB int)');
        $req->closeCursor();
        $req=$bdd->prepare('INSERT INTO '.$nomTable.' (id, contenueText,photo1,photo2, photo3, jour, heure, reactionA , reactionB ) VALUES (:id, :contenueText, :photo1, :photo2, :photo3, :jour, :heure, :reactionA , :reactionB)');
        $req->execute(array('id'=>$_SESSION['id'],
                            'contenueText'=>"",
                            "photo1"=>$idPhoto+1,
                            "photo2"=>0,
                            "photo3"=>0,
                            'jour'=>jour(),
                            'heure'=>temps(),
                            'reactionA'=>0,
                            'reactionB'=>0  ));
    



    header('Location: ./../page/accueil/accueil.php');
?>