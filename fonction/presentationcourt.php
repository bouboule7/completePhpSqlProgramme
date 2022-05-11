<?php
$amis=0;
    function presentationcourt($id){
        $amis=0;
        $bdd2=connectionBDD();
        $req1=$bdd2->query('SELECT * FROM '.$id.'table ');
        $donne1=$req1->fetch();

?>
        <div class="utilisateur">
            <p class="nom"> <a <?php echo('href="./../../page/profil/profil.php?id='.$id.'">'); echo(pseudo($bdd2,$id)); ?></a></p>
            <div class="bloc">
                <p class="pays"> de <?php echo($donne1['pays']);?></p>
                <p class="sexe"> <?php echo($donne1['sexe']);?></p>
            </div>
        </div> <?php

        $req1->closeCursor();
        
        if($id==$_SESSION['id'])
            return('<a href="./../../profil/profil.php">Vous</a>');

        $req2=$bdd2->query('SELECT * FROM '.$id.'contact  ');
            while($donne2=$req2->fetch())
           {
               if($donne2['id_amis']==$_SESSION['id'])
               {
                $amis=1;
               }
           }   
           $req2->closeCursor();

        if($amis==0)
               return('<a href="./../../traitement/ajoutcontact.php?amis='.$id.'">Ajouter</a>');
        else
               return('<a href="./../../page/message/message.php?id='.$id.'">Message</a>');
                
    }
?>