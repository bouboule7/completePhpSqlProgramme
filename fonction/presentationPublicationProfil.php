<?php
    function presentationPublicationProfil($nomTable){
        $bdd6=connectionBDD();
        $requ=$bdd6->query('SELECT id,contenueText,jour,heure,reactionA,reactionB FROM '.$nomTable.'');
        $donner=($requ->fetch());
        echo("<div class='publicationBloc'><a href='./../profil/profil.php?id=".$donner['id']."'>".pseudo($bdd6,$donner["id"])."</a><br/>");
        echo($donner['contenueText']."</a>");
    }
?>