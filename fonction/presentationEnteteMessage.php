<?php

include_once('./../../fonction/pseudo.php');
include_once('./../../fonction/BDname.php');
    function presentationEnteteMessage($donne){
        if($donne['nouveau']==1)
            $class="nouveau";
        else
            $class="";
?>
                <li class="justify-content-between apercuMessage align-items-center list-group-item ">
                    <a class="<?php echo($class);?>" href="./../../traitement/messagevu.php?id=<?php echo($donne['nom_amis']);?>">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <div class="introMessage">
                            <img class="photoDeProfilMessage rounded-circle" src="<?php
                            $bdd2=connectionBDD();
                            $req3=$bdd2->query('SELECT * FROM '.$donne["nom_amis"].'photo');
                            $nombrePhotoProfil=0;
                            while($donneImage=$req3->fetch())
                            {
                                if($donneImage['type']=="profil"){
                                    if($nombrePhotoProfil<$donneImage['photoId'])
                                        $nombrePhotoProfil=$donneImage['photoId'];
                                }
                            }
                                    if($nombrePhotoProfil==0) 
                                        echo('./../../assets/img/profil.jpeg');
                                    else{
                                        echo('./../../traitement/image.php?id='.(string)$donne["nom_amis"].'&type=profil&photoId='.(string)$nombrePhotoProfil);
                                        }
                                    echo('" alt="photo de profil"/>'.pseudo($bdd2,$donne["nom_amis"])); ?>
                            </div>
                            <span class="badge badge-primary badge-pill">14</span> 
                        </div>
                        <div class="paragraphe">
                            <p class="mb-1">Donec id elit nondiam eget risus varius blandit.</p>
                            <small class="date">3 days ago</small>
                        </div>
                    </a></li>
                </li>
<?php
  }
?>
