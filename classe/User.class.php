<?php
session_start();


include_once('./Compte.class.php');

class User
{
    private $nom;
    private $id;
    private $mail;
    private $pseudo;
    private $motdepasse;
    private $compte;
    public function __construct($oui,$numero,$sexe,$pays,$nationality){
        $mail=$_SESSION['mail'];
        
        $bdd=connectionBDD();

        $req = $bdd->prepare('SELECT * FROM utilisateur WHERE mail=?');
        $req->execute(array($_SESSION['mail']));
        
        $donne=$req->fetch();
        $this->nom=$donne['nom'];
        $this->id=$donne['id'];
        $this->pseudo=$donne['pseudo'];
        $this->motdepasse=$donne['motdepasse'];
        if($oui==1)
        {
            $this->compte=$donne['compte'];

        $req->closeCursor();
        }
        else
        {
        $req->closeCursor();
            $rien=new Compte($numero,$sexe,$pays,$nationality);
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