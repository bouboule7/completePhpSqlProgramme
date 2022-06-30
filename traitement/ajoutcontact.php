<?php
session_start();
include_once("./../fonction/connectionBDD.php");
include_once("./../fonction/BDname.php");
$non=0;
$nomamis=htmlspecialchars($_GET['amis']);
$bdd=connectionBDD();

    $req=$bdd->prepare('INSERT INTO '.$_SESSION['id'].'contact VALUES (:nomamis)');
    $req->execute(array('nomamis'=>$nomamis));
    $req->closeCursor();

    $req=$bdd->prepare('INSERT INTO '.$_GET['amis'].'contact VALUES (:nomamis)');
    $req->execute(array('nomamis'=>$_SESSION['id']));
    $req->closeCursor();

    $req=$bdd->prepare('INSERT INTO '.$_SESSION['id'].'discussion(nom_amis,amis12,nouveau) VALUES(:nom_amis,:amis12,:nouveau)');
    $req->execute(array('nom_amis'=>$nomamis,
                        'amis12'=>BDname($_SESSION['id'],$nomamis),
                        'nouveau'=>$non
                    ));
    $req->closeCursor();

    $req=$bdd->prepare('INSERT INTO '.$_GET['amis'].'discussion VALUES (:nom_amis,:amis12,:nouveau)');
    $req->execute(array('nom_amis'=>$_SESSION['id'],
                        'amis12'=>BDname($_SESSION['id'],$nomamis),
                        'nouveau'=>$non));
    $req->closeCursor();
    
    $req = $bdd->query('CREATE TABLE '.BDname($_SESSION['id'],$nomamis).' (id int AUTO_INCREMENT,pseudo text, message text, jour date, temps time)');
    $req->closeCursor();
    header('Location: ./../page/contact/contact.php');  
?>