<?php

include_once("./../fonction/connectionBDD.php");
    if(isset($_POST['id']) && isset($_POST['type']) && isset($_POST['photoId'])){
        $bdd3=connectionBDD();
            $req=$bdd3->prepare('SELECT * FROM '.$_POST["id"].'photo WHERE photoId=?');
            $req->execute(array($_POST['photoId']));
            $donneImage=$req->fetch();

            header("Content-type: ".$donneImage['typeImage']);
            echo($donneImage['donneBinaire']);
    }
?>