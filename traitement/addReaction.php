<?php session_start();
$react=htmlspecialchars($_POST['react']);
$publicationId=htmlspecialchars($_POST['publicationId']);
$nombre=(int)htmlspecialchars($_POST['nombre']);
if(isset($react) && isset($publicationId) && ($nombre)){

    include("./../fonction/connectionBDD.php");
    $bdd= connectionBDD();
    $requete="";
    switch($react){
        case "love":{
            $requete="UPDATE `88publication` SET `reactionAdore` = ".(string)($nombre+1);
            break;
        }
        case "haha":{
            $requete="UPDATE `88publication` SET `reactionHaha` = ".(string)($nombre+1);
            break;
        }
        case "wow":{
            $requete="UPDATE `88publication` SET `reactionWow` = ".(string)($nombre+1);
            break;
        }
        case "triste":{
            $requete="UPDATE `88publication` SET `reactionTriste` = ".(string)($nombre+1);
            break;
        }
        case "grr":{
            $requete="UPDATE `88publication` SET `reactionGrr` = ".(string)($nombre+1);
            break;
        }
        default:
            echo("error");
    }
    $req=$bdd->query($requete);
    $req->closeCursor();
}
//header('Location: ./publication?'); 
?>