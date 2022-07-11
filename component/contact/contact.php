<?php
session_start();

    include("./../../component/navigation/navigation.php"); 
    include_once("./../../fonction/connectionBDD.php");
    include_once("./../../fonction/presentationcourt.php");
    include_once("./../../fonction/presentationcourt2.php");
?>

<h3 class="contact">Contact <a class="actualiser" href="./contact"><img class="actualiser" src="./../../assets/img/refresh.gif"/></a></h3>
    <div class="row mb-3">
        <div class="row contenuContact row-cols-1 col-md-9 themed-grid-col d-gridrow-cols-sm-3 row-cols-md-4 col-md-4 g-4">
            <button class="btn voir-tout btn-outline-primary w-50">Voir tout les amis dans le contact</button>
            <?php
            $bdd=connectionBDD();
            $req=$bdd->query('SELECT * FROM '.$_SESSION["id"].'contact');
            $listeAmis=array();
            while($contact=$req->fetch())
            {
                array_unshift($listeAmis,$contact['id_amis']);
            }
            $req->closeCursor();
            $req2=$bdd->query('SELECT * FROM utilisateur ');
            while($donne=$req2->fetch())
            {
                if(!in_array($donne["id"],$listeAmis))
                   presentationcourt($donne["id"]);
            }
            $req->closeCursor();
            ?>
        </div>


        <div class="col-md-3 themed-grid-col">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <button class="btn voir-tout btn-outline-primary ">Voir tout les amis dans le contact</button>
<?php
            for ($i=0;$i<=7;$i++) {
                presentationcourt2($listeAmis[$i]);
            }
?>      
                <small class="d-block text-end mt-3">
                  <a href="#">Tous les amis</a>
                </small>
            </div>
    </div>
<?php
    include('./../../component/pied/pied.php');
?>