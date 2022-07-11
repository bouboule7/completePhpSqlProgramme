<?php
    session_start();
    include("./../fonction/connectionBDD.php");
    include("./../fonction/pseudo.php");
    include("./../fonction/BDname.php");
    include("./../fonction/temps.php");
    echo($_SESSION['id'].$_POST['id']);
    $bdd=connectionBDD();
    $req=$bdd->prepare('INSERT INTO '.BDname($_SESSION['id'],$_POST['id']).'(pseudo, message, jour, temps) VALUES (:pseudo, :message, :jour, :temps)');
    $req->execute(array('pseudo'=>pseudo($bdd,$_SESSION['id']),
                        'message'=>$_POST['nouveaumessage'],
                        'jour'=>jour(),
                        'temps'=>temps()));
    $req->closeCursor();

    $req=$bdd->prepare('UPDATE '.$_POST['id'].'discussion SET nouveau = :new WHERE nom_amis = :nomamis');
    $req->execute(array('new'=>1,
                        'nomamis'=>$_SESSION["id"]));
    $req->closeCursor();

    header('Location: ./../page/message?id='.$_POST['id'].''); 
?>