<?php
session_start();
include_once("./../fonction/connectionBDD.php");
include_once("./../fonction/BDname.php");
$non=0;
$nomamis=htmlspecialchars($_GET['amis']);
echo($_SESSION['nom']);
$bdd=connectionBDD();

    $req=$bdd->prepare('INSERT INTO '.$_SESSION['nom'].'contact VALUES (:nomamis)');
    $req->execute(array('nomamis'=>$nomamis));
    $req->closeCursor();

    $req=$bdd->prepare('INSERT INTO '.$_GET['amis'].'contact VALUES (:nomamis)');
    $req->execute(array('nomamis'=>$_SESSION['nom']));
    $req->closeCursor();

    $req=$bdd->prepare('INSERT INTO '.$_SESSION['nom'].'discussion(nom_amis,amis12,nouveau) VALUES(:nom_amis,:amis12,:nouveau)');
    $req->execute(array('nom_amis'=>$nomamis,
                        'amis12'=>BDname($_SESSION['nom'],$nomamis),
                        'nouveau'=>$non
                    ));
    $req->closeCursor();

    $req=$bdd->prepare('INSERT INTO '.$_GET['amis'].'discussion VALUES (:nom_amis,:amis12,:nouveau)');
    $req->execute(array('nom_amis'=>$_SESSION['nom'],
                        'amis12'=>BDname($_SESSION['nom'],$nomamis),
                        'nouveau'=>$non));
    $req->closeCursor();
    
    $req = $bdd->query('CREATE TABLE '.BDname($_SESSION['nom'],$nomamis).' (pseudo text, message text, jour date, temps time)');
    $req->closeCursor();
    header('Location: ./../page/contact/contact.php');  
?>