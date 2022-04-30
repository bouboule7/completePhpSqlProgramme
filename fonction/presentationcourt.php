<?php
$amis=0;
    function presentationcourt($nom){
        $bdd2=connectionBDD();
        $req1=$bdd2->query('SELECT * FROM '.$nom.' ');
        $donne1=$req1->fetch();

?>
        <div class="utilisateur">
            <p class="nom"> <?php echo($donne1['pseudo']); ?></p>
            <div class="bloc">
                <p class="pays"> de <?php echo($donne1['pays']);?></p>
                <p class="sexe"> <?php echo($donne1['sexe']);?></p>
            </div>
        </div> <?php

        $req1->closeCursor();
        
        if($nom==$_SESSION['nom'])
            return('<a href="./../../profil/profil.php">Vous</a>');

        $req2=$bdd2->query('SELECT * FROM '.$nom.'contact  ');
            while($donne2=$req2->fetch())
           {
               if($donne2['nom_amis']==$_SESSION['nom'])
               {
                $amis=1;
               }
           }   
           $req2->closeCursor();

        if($amis==0)
               return('<a href="./../../traitement/ajoutcontact.php?amis='.$nom.'">Ajouter</a>');
        else
               return('<a href="./../../page/message/message.php?amis='.$nom.'">Message</a>');
                
    }
?>