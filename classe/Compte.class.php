<?php
session_start();
function jour()
{
    return(date('Y').date('m').date('d'));
}
function temps()
{
    return(date('H').date('i').date('s'));
}
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
        $req = $bddclass->query('CREATE TABLE '.(string)($_SESSION['id']).'notification (idNotification int AUTO_INCREMENT PRIMARY KEY,titre text,contenue text ,lien text, jour date, temps time, vue bool)');

        $req->closeCursor();
        $req = $bddclass->prepare('INSERT INTO '.(string)($_SESSION['id']).'table ( numero,sexe,pays,nationality) VALUES( :numero, :sexe, :pays,:nationality)');
        $req->execute(array(
                    'numero' => $numero,
                    'sexe' => $sexe,
                    'pays' => $pays,
                    'nationality' => $nationality
        )); 

        $req->closeCursor(); 
        $req=$bddclass->prepare('INSERT INTO '.(string)($_SESSION['id']).'notification (titre, contenue, lien, jour, temps, vue) VALUES (:titre, :contenue, :lien,:jour, :heure,:vue)');
        $req->execute(array(
            'titre'=>"JoovTeck",
            'contenue'=>"Bonjour, votre enregistrement a Joovteck a été un succes. Merci d utiliser JoovTeck",
            'lien'=>'./accueil',
            'jour'=>jour(),
            'heure'=> temps(),
            'vue'=>true));
        $req->execute(array(
            'titre'=>"JoovTeck",
            'contenue'=>"Metter a jour votre profil pour que les autre puisse vous reconnaitre",
            'lien'=>'./profil?id='.$_SESSION['id'],
            'jour'=>jour(),
            'heure'=> temps(),
            'vue'=>true));
    }
}
