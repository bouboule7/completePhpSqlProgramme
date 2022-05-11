<?php
    function pseudo($bdd,$id){
        $req2=$bdd->prepare('SELECT pseudo FROM utilisateur WHERE id =?');
        $req2->execute(array($id));
        $donne2=$req2->fetch();
        return ($donne2['pseudo']);
        $req2_>closeCursor();
    }
?>