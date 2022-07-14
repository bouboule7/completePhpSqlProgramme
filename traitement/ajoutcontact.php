<?php
session_start();
include_once("./../fonction/connectionBDD.php");
include_once("./../fonction/BDname.php");
include_once("./../fonction/temps.php");
$non=0;
$nomamis=htmlspecialchars($_POST['id']);
$bdd=connectionBDD();

    $req=$bdd->prepare('INSERT INTO '.$_SESSION['id'].'contact VALUES (:nomamis)');
    $req->execute(array('nomamis'=>$nomamis));
    $req->closeCursor();

    $req=$bdd->prepare('INSERT INTO '.$nomamis.'contact VALUES (:nomamis)');
    $req->execute(array('nomamis'=>$_SESSION['id']));
    $req->closeCursor();

    $req=$bdd->prepare('INSERT INTO '.$_SESSION['id'].'discussion(nom_amis,amis12,nouveau) VALUES(:nom_amis,:amis12,:nouveau)');
    $req->execute(array('nom_amis'=>$nomamis,
                        'amis12'=>BDname($_SESSION['id'],$nomamis),
                        'nouveau'=>$non
                    ));
    $req->closeCursor();

    $req=$bdd->prepare('INSERT INTO '.$nomamis.'discussion VALUES (:nom_amis,:amis12,:nouveau)');
    $req->execute(array('nom_amis'=>$_SESSION['id'],
                        'amis12'=>BDname($_SESSION['id'],$nomamis),
                        'nouveau'=>$non));
    $req->closeCursor();
    
    $req = $bdd->query('CREATE TABLE '.BDname($_SESSION['id'],$nomamis).' (id int AUTO_INCREMENT PRIMARY KEY,pseudo text, message text, jour date, temps time)');
    $req->closeCursor();

    $req = $bdd->prepare('INSERT INTO '.BDname($_SESSION['id'],$nomamis).' (pseudo, message, jour, temps) VALUE (:pseudo, :message, :jour, :temps)');
    $req->execute(array(
        'pseudo'=>"JoovTeck",
        'message'=>"Debuter une nouvelle discussion.",
        'jour'=>jour(),
        'temps'=>temps()
    ));
    $req->closeCursor();
    
    header('Location: ./../page/contact');  
?>