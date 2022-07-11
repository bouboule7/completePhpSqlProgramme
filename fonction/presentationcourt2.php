<?php
    function presentationcourt2($id){
        $amis=0;
        $bdd2=connectionBDD();
        $req1=$bdd2->query('SELECT * FROM '.$id.'table ');
        $donne1=$req1->fetch();

?>
         <div class="d-flex text-muted pt-3">
                <?php
                echo('<img class="bd-placeholder-img flex-shrink-0 me-2 rounded imgAmis" src=');
                            $bdd2=connectionBDD();
                            $req=$bdd2->query('SELECT * FROM '.$id.'photo ');
                            $nombrePhotoProfil=0;
                            while($donneImage=$req->fetch())
                            {
                                if($donneImage['type']=="profil"){
                                    if($nombrePhotoProfil<$donneImage['photoId'])
                                        $nombrePhotoProfil=$donneImage['photoId'];
                                }
                            }
                              if($nombrePhotoProfil==0) 
                                echo('./../../assets/img/profil.jpeg');
                              else{
                                echo('./../../traitement/image.php?id='.(string)$id.'&type=profil&photoId='.(string)$nombrePhotoProfil.'"');
                              }
                                                                              echo(' alt="photo de profil"/>');
                ?>
                <p class=" mb-0 small lh-sm border-bottom">
                    <strong class="d-block text-gray-dark">@<a <?php echo('href="./../../page/profil?id='.$id.'">'); echo(pseudo($bdd2,$id)); ?></a></strong>
                    de <?php echo($donne1['pays']);?> </p>
        </div>
<?php
  }
?>