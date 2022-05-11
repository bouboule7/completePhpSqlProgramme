<?php
    function presentationPublication($publicationId){
        $bdd6=connectionBDD();
        $requ=$bdd6->query('SELECT id,contenueText,jour,heure,reactionA,reactionB FROM '.$publicationId.'publication');
        $donner=($requ->fetch());
        echo("<div><a href='./../profil/profil.php?id=".$donner['id']."'>".pseudo($bdd6,$donner["id"])."</a><br/>");
        echo($donner['contenueText'].'</a>');
    }
?>