<?php
    function pseudo($bdd,$nom){
        $req2=$bdd->prepare('SELECT pseudo FROM utilisateur WHERE nom =?');
        $req2->execute(array($nom));
        $donne2=$req2->fetch();
        return ($donne2['pseudo']);
        $req2_>closeCursonr();
    }
?>