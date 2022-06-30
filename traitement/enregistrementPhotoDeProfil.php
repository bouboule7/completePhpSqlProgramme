<?php
session_start();
include_once('./../fonction/connectionBDD.php');
$bdd=connectionBDD();

    $img_blob = file_get_contents ($_FILES['photoDeProfil']['tmp_name']);
    $image_name = $_FILES["photoDeProfil"]["name"];
    $image_size = $_FILES["photoDeProfil"]["size"];
    $image_type = $_FILES["photoDeProfil"]["type"];
    if($image_size>500000)    
        header('Location: ./../page/modifierProfil/modifierProfil.php');
    // ajout dans la table:
    $req=$bdd->prepare("INSERT INTO ".$_SESSION['id']."photo (type, donneBinaire,nomImage,typeimage)VALUES (:type, :donneBinaire,:nomImage,:typeimage)");
    $req->execute(array('type'=>"profil",
                        'donneBinaire'=>$img_blob,
                        'nomImage'=>$image_name,
                        'typeimage'=>$image_type));
    $req->closeCursor();


    header('Location: ./../page/profil/profil.php?id='.$_SESSION["id"]);
?>