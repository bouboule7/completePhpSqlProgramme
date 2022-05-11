<?php
session_start();
include("./../fonction/connectionBDD.php");
include("./../fonction/pseudo.php");
include("./../fonction/BDname.php");
include("./../fonction/temps.php");

$bdd=connectionBDD();

$req=$bdd->prepare('UPDATE '.$_SESSION["id"].'discussion SET nouveau = :new WHERE nom_amis = :nomamis');
$req->execute(array('new'=>0,
                    'nomamis'=>$_GET["id"]));
$req->closeCursor();

header('Location: ./../page/message/message.php?id='.$_GET["id"]);

?>