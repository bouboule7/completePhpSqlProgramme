<?php
session_start();


include_once('./Compte.class.php');

class User
{
    public function __construct($oui,$numero,$sexe,$pays,$nationality){
        $mail=$_SESSION['mail'];
        
        $bdd=connectionBDD();

        $req = $bdd->prepare('SELECT * FROM utilisateur WHERE mail=?');
        $req->execute(array($_SESSION['mail']));
        
        $donne=$req->fetch();
        $_SESSION['id']=$donne['id'];
        $_SESSION['pseudo']=$donne['pseudo'];
        $_SESSION['motdepasse']=$donne['motdepasse'];

        $req->closeCursor();
        if($oui!=1){
            $nouveau=new Compte($numero,$sexe,$pays,$nationality);
        }

    }
}
?>