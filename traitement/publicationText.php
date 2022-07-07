<?php
    session_start();
    include_once('./../fonction/connectionBDD.php');
    include("./../fonction/temps.php");

    if(isset($_POST['publication'])){
        $bdd= connectionBDD();
        $req=$bdd->query('INSERT INTO publication(pub) VALUE (1)');
        $req->closeCursor();
        $req=$bdd->query('SELECT publicationId FROM publication ORDER BY publicationId DESC LIMIT 0,1 ');
        
        $idPublication=($req->fetch())['publicationId'];
        $req->closeCursor();
        $nomTable=(string)($idPublication).'publication';
        $req=$bdd->prepare('INSERT INTO '.$_SESSION["id"].'post VALUE (:postname)');
        $req->execute(array('postname'=>$nomTable));
        $req->closeCursor();
        $req = $bdd->query('CREATE TABLE '.$nomTable.' (id int,contenueText text,photo1 int, photo2 int, photo3 int, jour date, heure time, commentaire text, idCommentateur int, datecommentaire date, heurcommentaire time, reactionA int, reactionB int)');
        $req->closeCursor();
        $req=$bdd->prepare('INSERT INTO '.$nomTable.' (id, contenueText,photo1,photo2, photo3, jour, heure, reactionA , reactionB ) VALUES (:id, :contenueText, :photo1, :photo2, :photo3, :jour, :heure, :reactionA , :reactionB)');
        $req->execute(array('id'=>$_SESSION['id'],
                            'contenueText'=>$_POST['publication'],
                            "photo1"=>0,
                            "photo2"=>0,
                            "photo3"=>0,
                            'jour'=>jour(),
                            'heure'=>temps(),
                            'reactionA'=>0,
                            'reactionB'=>0  ));
    }
       header('Location: ./../page/accueil/accueil.php'); 
?>