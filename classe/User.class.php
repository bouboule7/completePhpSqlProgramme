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
        $_SESSION['nom']=$donne['nom'];
        $_SESSION['id']=$donne['id'];
        $_SESSION['pseudo']=$donne['pseudo'];
        $_SESSION['motdepasse']=$donne['motdepasse'];
        if($oui==1)
        {
            $this->compte=$donne['compte'];

        $req->closeCursor();
        }
        else
        {
        $req->closeCursor();
            $this->compte=$donne['nom'];
            $nouveau=new Compte($numero,$sexe,$pays,$nationality);
        }
    }
    public function getnom ()
    {
        $this->nom ="lala";
        echo("sorty");
        return $this-> nom;
    }
}
?>