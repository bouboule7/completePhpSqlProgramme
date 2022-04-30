<?php
    session_start();
    include("./../fonction/connectionBDD.php");
    include("./../fonction/pseudo.php");
    include("./../fonction/BDname.php");
    include("./../fonction/temps.php");
    
    $bdd=connectionBDD();
    $req=$bdd->prepare('INSERT INTO '.BDname($_SESSION['nom'],$_GET['amis']).' VALUES (:pseudo, :message, :jour, :temps)');
    $req->execute(array('pseudo'=>pseudo($bdd,$_SESSION['nom']),
                        'message'=>$_POST['nouveaumessage'],
                        'jour'=>jour(),
                        'temps'=>temps()));
    $req->closeCursor();

    $req=$bdd->prepare('UPDATE '.$_GET['amis'].'discussion SET nouveau = :new WHERE nom_amis = :nomamis');
    $req->execute(array('new'=>1,
                        'nomamis'=>$_SESSION["nom"]));
    $req->closeCursor();

    header('Location: ./../page/message/message.php?amis='.$_GET['amis'].''); 
?>