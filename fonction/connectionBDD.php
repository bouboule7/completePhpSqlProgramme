<?php
    function connectionBDD(){
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
        return $bdd;
    }
?>