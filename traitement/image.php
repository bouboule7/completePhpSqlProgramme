<?php


include_once("./../fonction/connectionBDD.php");
    if(isset($_GET['id']) && isset($_GET['type']) && isset($_GET['photoId'])){
        $bdd3=connectionBDD();
            $req=$bdd3->prepare('SELECT * FROM '.$_GET["id"].'photo WHERE photoId=?');
            $req->execute(array($_GET['photoId']));
            $donneImage=$req->fetch();

            header("Content-type: ".$donneImage['typeImage']);
            echo($donneImage['donneBinaire']);
    }
?>