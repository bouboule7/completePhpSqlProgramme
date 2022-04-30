<?php

    function BDname($sessionNom,$nomamis){
    $bdd3=connectionBDD();
    $req3=$bdd3->prepare("SELECT id  FROM utilisateur WHERE nom=?");
    $req3->execute(array($_SESSION['nom']));
    $donne=$req3->fetch();
    $myid= $donne['id'];
    $req3->closeCursor();

    $req3=$bdd3->prepare("SELECT id  FROM utilisateur WHERE nom=?");
    $req3->execute(array($nomamis));
    $donne=$req3->fetch();
    $amisid= $donne['id'];
    $req3->closeCursor();

        if($myid>$amisid)
            return ($sessionNom.$nomamis);
    else
            return ($nomamis.$sessionNom);
    }
?>