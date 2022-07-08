<?php
    function presentationPublicationProfil($nomTable){
        $bdd6=connectionBDD();
        $requ=$bdd6->query('SELECT * FROM '.$nomTable.'');
        $donner=($requ->fetch());
        echo("<div class='publicationBloc'><a href='./../profil/profil.php?id=".$donner['id']."'>".pseudo($bdd6,$donner["id"])."</a><br/>");
        echo($donner['contenueText']."</a>");
        if($donner['photo1']!=0){
            ?> <img  class="Publication" src="<?php
                        echo("./../../traitement/image.php?id=".$donner['id']."&type=couverture&photoId=".$donner['photo1']);
                    ?>" alt="photo de profil"/><?php
        }
    }
?>