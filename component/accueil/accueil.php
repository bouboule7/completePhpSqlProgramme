<link rel="stylesheet" href="./accueil.css">
<?php
include('./../../component/navigation/navigation.php');
include_once("./../../traitement/image.php");
?>
<div class="newPublication">
    <?php
    $bdd2=connectionBDD();
            $req=$bdd2->query('SELECT * FROM '.$_SESSION["id"].'photo ');
            $nombrePhotoProfil=0;
            while($donneImage=$req->fetch())
            {
                if($donneImage['type']=="profil"){
                    if($nombrePhotoProfil<$donneImage['photoId'])
                        $nombrePhotoProfil=$donneImage['photoId'];
                }
            }
    ?>
    <div class="newPubBloc">
        <img  class="photoDeProfilNewPublication" src="<?php
                        if($nombrePhotoProfil==0) 
                            echo("./../../assets/img/profil.jpeg");
                        else
                        echo("./../../traitement/image.php?id=".$_SESSION['id']."&type=profil&photoId=".$nombrePhotoProfil);
                    ?>" alt="photo de profil"/>
        <div>
            <p>Nouvelle publication</p>
            <form action="./../../traitement/publicationText.php" method="post">
                <textarea placeholder="nouvelle publication" name="publication" class="publicationZone" rows="5" cols="30"></textarea>
                <button type="submit">Publier</button>  <br/>
                <a href="./../newPublicationPhoto/newPublicationPhoto.php">joindre des photos </a>
            </form>
        </div>
    </div>
</div>
<?php
include('./../../component/contenueaccueil/contenueaccueil.php');
include('./../../component/pied/pied.php');
?>