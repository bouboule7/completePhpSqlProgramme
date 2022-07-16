<?php
session_start();
$commentaire=htmlspecialchars($_POST['commentaire']);
$publicationId=htmlspecialchars($_POST['publicationId']);
if(isset($commentaire) && isset($publicationId)){
//    $bddCommentaire=connectionBdd();
    echo($commentaire.' '.$publicationId);
}
?>