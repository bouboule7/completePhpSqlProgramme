<?php
include_once('./../../fonction/pseudo.php');
    function presentation($id){

        $bdd2=connectionBDD();
        $req=$bdd2->query('SELECT * FROM '.$id.'photo ');
        $nombrePhotoProfil=0;
        $nombrePhotoCouverture=0;
        while($donneImage=$req->fetch())
        {
            if($donneImage['type']=="couverture"){
                if($nombrePhotoCouverture<$donneImage['photoId'])
                    $nombrePhotoCouverture=$donneImage['photoId'];
            }
            if($donneImage['type']=="profil"){
                if($nombrePhotoProfil<$donneImage['photoId'])
                    $nombrePhotoProfil=$donneImage['photoId'];
            }
        }
        if($id==$_SESSION['id']){
            ?>
            <div class="tete">
                <div class="couverture">
                    <img  class="photoDeCouverture" src="<?php
                        if($nombrePhotoCouverture==0) 
                            echo("./../../assets/img/couverture.jpeg");
                        else
                            echo("./../../traitement/image.php?id=".$_SESSION['id']."&type=couverture&photoId=".$nombrePhotoCouverture);
                    ?>" alt="photo de couverture"/>
                    <a class="modifierCouverture" href="./../modifierCouverture/modifierCouverture.php?id= <?php echo($_SESSION['id']);?>">Modifier</a>
                </div>
                <div class="profil">
                <img  class="photoDeProfil" src="<?php
                        if($nombrePhotoProfil==0) 
                            echo("./../../assets/img/profil.jpeg");
                        else
                        echo("./../../traitement/image.php?id=".$_SESSION['id']."&type=profil&photoId=".$nombrePhotoProfil);
                    ?>" alt="photo de profil"/>
                    <a class="modifierProfil" href="./../modifierProfil/modifierProfil.php?id= <?php echo($_SESSION['id']);?>">Modifier</a>
                </div>
                <div class="nomBloc">
                    <div class="margeNom"></div>
                    <h2 class="nom"><?php echo($_SESSION['pseudo']); ?>
                    <div class="margeNom"></div>
                </div>
            </div>
            <?php include_once('./../../fonction/presentationPublicationProfil.php');

            $bdd5=connectionBDD();
            $a=0; $b=10;
            if(isset($_POST['a'],$_POST['b'])){
                $a+=10; $b+=10;
            }
            $requete=$bdd5->query('SELECT postName FROM '.$_SESSION["id"].'post ORDER BY postName DESC LIMIT '.$a.','.$b.'');
            while($result=$requete->fetch()){
                presentationPublicationProfil($result['postName']);
            }?>
            <nav>

            </nav>
            <?php 
        }
        else{
            ?>
            <div class="tete">
                <div class="couverture">
                    <img  class="photoDeCouverture" src="<?php
                        if($nombrePhotoCouverture==0) 
                            echo("./../../assets/img/couverture.jpeg");
                        else
                            echo("./../../traitement/image.php?id=".$id."&type=couverture&photoId=".$nombrePhotoCouverture);
                    ?>" alt="photo de couverture"/>
                </div>
                <div class="profil">
                <img  class="photoDeProfil" src="<?php
                        if($nombrePhotoProfil==0) 
                            echo("./../../assets/img/profil.jpeg");
                        else
                        echo("./../../traitement/image.php?id=".$id."&type=profil&photoId=".$nombrePhotoProfil);
                    ?>" alt="photo de profil"/>
                </div>
                <div class="nomBloc">
                    <div class="margeNom"></div>
                    <h2 class="nom"><?php echo(pseudo($bdd2,$id)); ?>
                    <div class="margeNom"></div>
                </div>
            </div>
            <?php include_once('./../../fonction/presentationPublicationProfil.php');

            $bdd5=connectionBDD();
            $a=0; $b=10;
            if(isset($_POST['a'],$_POST['b'])){
                $a+=10; $b+=10;
            }
            $requete=$bdd5->query('SELECT postName FROM '.$_GET["id"].'post ORDER BY postName DESC LIMIT '.$a.','.$b.'');
            while($result=$requete->fetch()){
                presentationPublicationProfil($result['postName']);
            }?>
            <nav>

            </nav>
            <?php
        }
    }
?>