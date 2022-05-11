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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab optio mollitia accusantium saepe magnam cumque reiciendis, doloremque similique enim laudantium odio at harum aliquam error voluptates voluptatem. Quod, soluta.</p>
            <nav>

            </nav>
            <?php
        }
    }
?>