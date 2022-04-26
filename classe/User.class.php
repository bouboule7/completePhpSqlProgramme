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
    public function __construct($oui){
        $mail=$_SESSION['mail'];
        try
        {
            // On se connecte à MySQL
            $bdd = new PDO('mysql:host=localhost;dbname=baseDeDonne1', 'root', 'Tsaramanga1&');
             //   mysql_connect("localhost", "root", "");
               // mysql_select_db("baseDeDonne");
        // -------
        }
            catch(Exception $e)
        {
            // En cas d'erreur, on affiche un message et on arrête tout
                die('Erreur : '.$e->POSTMessage());
        }
        $req = $bdd->prepare('SELECT * FROM utilisateur WHERE mail=?');
        $req->execute(array($_SESSION['mail']));
        
        $donne=$req->fetch();
        $this->nom=$donne['nom'];
        $this->id=$donne['id'];
        $this->pseudo=$donne['pseudo'];
        $this->motdepasse=$donne['motdepasse'];
        if($oui==1)
        {
            echo("kjhkj");
            $this->compte=$donne['compte'];

        $req->closeCursor();
        }
        else
        {
            echo("<br/>non");
        $req->closeCursor();
        echo("<br/>avant compte");
        $rien=new Compte();
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