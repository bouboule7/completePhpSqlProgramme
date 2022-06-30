<?php
session_start();
include_once('./../fonction/connectionBDD.php');
$bdd=connectionBDD();

    $img_blob = file_get_contents ($_FILES['photo1']['tmp_name']);
    $image_name = $_FILES["photo1"]["name"];
    $image_size = $_FILES["photo1"]["size"];
    $image_type = $_FILES["photo1"]["type"];
    if($image_size>50000)    
        header('Location: ./../page/newPublicationPhoto/newPublicationPhoto.php');
    // ajout dans la table:
    $req=$bdd->prepare("INSERT INTO ".$_SESSION['id']."photo (type, donneBinaire,nomImage,typeimage)VALUES (:type, :donneBinaire,:nomImage,:typeimage)");
    $req->execute(array('type'=>"publication",
                        'donneBinaire'=>$img_blob,
                        'nomImage'=>$image_name,
                        'typeimage'=>$image_type));
    $req->closeCursor();


    header('Location: ./../page/accueil/accueil.php');
?>