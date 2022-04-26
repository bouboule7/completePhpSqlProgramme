<?php
session_start();
class Compte{
    public function __construct(){
        echo("<br/>start");
     /*   try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=baseDeDonne1', 'root', 'Tsaramanga1&');
    // -------
        }
        catch(Exception $e)
        {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->POSTMessage());
        }       */

        $req = $bdd->query('CREATE TABLE '.$nom.' ( pseudo text, numero int, sexe text, pays text,nationality text, statues text)');
        
        $req->closeCursor();
        echo("table created");
    }
    public function getPseudo ()
    {
        return $this-> nom;
    }
}