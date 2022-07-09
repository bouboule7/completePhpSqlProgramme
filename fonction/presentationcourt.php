<?php
$amis=0;
    function presentationcourt($id){
        $amis=0;
        $bdd2=connectionBDD();
        $req1=$bdd2->query('SELECT * FROM '.$id.'table ');
        $donne1=$req1->fetch();

?>
        <div class="col-md-auto">
            <div class="card shadow-sm  justify-content-between align-items-center">
                <?php
                echo('<img class="imgContact" src=');
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
              <div class="card-body">
                <p class="card-text"><a <?php echo('href="./../../page/profil/profil.php?id='.$id.'">'); echo(pseudo($bdd2,$id)); ?></a></p>
                <div>
                    <p><small class="text-muted">de <?php echo($donne1['pays']);?></small></p>
                  <div class="btn-group">
                    <button type="button" class="btn btn-outline-success">Ajouter</button>
                    <button type="button" class="btn  btn-outline-primary">Profil</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-auto">
            <div class="card shadow-sm  justify-content-between align-items-center">
                <?php
                echo('<img class="imgContact" src=');
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
              <div class="card-body">
                <p class="card-text"><a <?php echo('href="./../../page/profil/profil.php?id='.$id.'">'); echo(pseudo($bdd2,$id)); ?></a></p>
                <div>
                    <p><small class="text-muted">de <?php echo($donne1['pays']);?></small></p>
                  <div class="btn-group">
                    <button type="button" class="btn btn-outline-success">Ajouter</button>
                    <button type="button" class="btn  btn-outline-primary">Profil</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-auto">
            <div class="card shadow-sm  justify-content-between align-items-center">
                <?php
                echo('<img class="imgContact" src=');
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
              <div class="card-body">
                <p class="card-text"><a <?php echo('href="./../../page/profil/profil.php?id='.$id.'">'); echo(pseudo($bdd2,$id)); ?></a></p>
                <div>
                    <p><small class="text-muted">de <?php echo($donne1['pays']);?></small></p>
                  <div class="btn-group">
                    <button type="button" class="btn btn-outline-success">Ajouter</button>
                    <button type="button" class="btn  btn-outline-primary">Profil</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
<?php
  }
?>