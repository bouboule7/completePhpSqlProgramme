<?php
session_start();
class Compte{
    public function __construct($numero,$sexe,$pays,$nationality){
        $bdd=connectionBDD();
        $req = $bdd->query('CREATE TABLE '.$_SESSION['nom'].' ( pseudo text, numero int, sexe text, pays text,nationality text, statues text)');
        
        $req->closeCursor();
        
        $req = $bdd->prepare('INSERT INTO '.$_SESSION['nom'].' (pseudo, numero,sexe,pays,nationality) VALUES(:pseudo, :numero, :sexe, :pays,:nationality)');
        $req->execute(array(
                    'pseudo' => $_SESSION['nom'],
                    'numero' => $numero,
                    'sexe' => $sexe,
                    'pays' => $pays,
                    'nationality' => $nationality
        )); 
        $req->closeCursor();
    }
    public function getPseudo ()
    {
        return $this-> nom;
    }
}