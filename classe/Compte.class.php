<?php
session_start();
class Compte{
    public function __construct($numero,$sexe,$pays,$nationality){
        $bddclass=connectionBDD();
        $req = $bddclass->query('CREATE TABLE '.(string)($_SESSION['id']).'table (numero int, sexe text, pays text,nationality text, statues text)');
        
        $req->closeCursor();
        $req = $bddclass->query('CREATE TABLE '.(string)($_SESSION['id']).'contact ( id_amis int)');
        
        $req->closeCursor();
        $req = $bddclass->query('CREATE TABLE '.(string)($_SESSION['id']).'discussion ( nom_amis text, amis12  text, nouveau int)');

        $req->closeCursor();
        $req = $bddclass->query('CREATE TABLE '.(string)($_SESSION['id']).'post (postName text)');

        $req->closeCursor();
        $req = $bddclass->query('CREATE TABLE '.(string)($_SESSION['id']).'photo (photoId int AUTO_INCREMENT PRIMARY KEY,type text,donneBinaire longblob ,nomImage text ,typeImage text)');

        $req->closeCursor();
        $req = $bddclass->prepare('INSERT INTO '.(string)($_SESSION['id']).'table ( numero,sexe,pays,nationality) VALUES( :numero, :sexe, :pays,:nationality)');
        $req->execute(array(
                    'numero' => $numero,
                    'sexe' => $sexe,
                    'pays' => $pays,
                    'nationality' => $nationality
        )); 
        $req->closeCursor(); 
        
    }
}
