<?php
    session_start();
    include('./../../fonction/presentation.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualité avec contenue multimédia</title>
</head>
<body>
    
<?php
include("./../../component/entete/entete.html"); 
if($_SESSION['statue']==1){
    include("./../../component/navigation/navigation.php"); 
    ?>
        <div>
            <form enctype="multipart/form-data" action="./../../traitement/enregistrementPublicationPhoto.php" method="post">
                <p>Publier des images:</p>
                <p>Taille maximum autorisé: 500kb</p>
                <label for="photoDeProfil">Veuillez choisir les photos.</label><br/><br/>
                <input type="file" required name="photo1"/>
                <br/><br/>
                <input type="file" name="photo2"/>
                <br/><br/>
                <input type="file" name="photo3"/>
                <br/><br/>
                <button type="submit">Publier les photos</button>
            </form>
        </div>
        <br/>
        <a href="./../accueil/accueil.php">Retourner a l'accueil</a>
    <?php
    include('./../../component/pied/pied.php');
}
else{
    include("./../../component/denied/denied.php");
    include("./../../component/login/login.php");
}
?>

</body>
</html>