<?php
include_once("./../../traitement/image.php");
include("./../../fonction/connectionBDD.php");
?>
<link rel="stylesheet" href="./../../component/navigation/navigation.css">
<div class="search">
    <img class="loupe" src="./../../assets/img/search.png" />
    <form method="post" action="./../../page/recherche/recherche.php">
        <input type="text" class="recherche" name="recherche" id="recherche"/>
        <button type="submit"> rechercher</button>
    </form>
</div>
<div class="navigation">
    <div class="alien">
        <a href="./../accueil/accueil.php">acceuil</a>
        <a href="./../message/message.php">message</a>
        <a href="./../contact/contact.php">contact</a>
        <a href="./../menu/menu.php">menu</a>
    </div>
    <div class="espace_centrer"></div>
    <div class="menu">
        <div class="espace"></div>
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
        <img  class="photoDeProfilPseudo" src="<?php
                        if($nombrePhotoProfil==0) 
                            echo("./../../assets/img/profil.jpeg");
                        else
                        echo("./../../traitement/image.php?id=".$_SESSION['id']."&type=profil&photoId=".$nombrePhotoProfil);
                    ?>" alt="photo de profil"/>
        <input type="checkbox" id="btnControl" />
        <label class="btn" for="btnControl"><span class="connecte"><?php echo($_SESSION['pseudo'])?></span>
            <ul>
                <li>lala</li>
                <li>Paramètres</li>
                <li class="deconnecte"><a href="./../../traitement/deconnection.php"> Log out</a></li>
            </ul>
        </label>
    </div>
</div>
<div class="margtop"></div>