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
        $req = $bdd->query('CREATE TABLE '.$nomTable.' (id int,contenueText text, jour date, heure time, commentaire text, idCommentateur int, datecommentaire date, heurcommentaire time, reactionA int, reactionB int)');
        $req->closeCursor();
        $req=$bdd->prepare('INSERT INTO '.$nomTable.' (id, contenueText, jour, heure, reactionA , reactionB ) VALUES (:id, :contenueText, :jour, :heure, :reactionA , :reactionB)');
        $req->execute(array('id'=>$_SESSION['id'],
                            'contenueText'=>$_POST['publication'],
                            'jour'=>jour(),
                            'heure'=>temps(),
                            'reactionA'=>0,
                            'reactionB'=>0  ));
    }
       header('Location: ./../page/accueil/accueil.php'); 
?>