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
    <title><?php echo($_SESSION['pseudo']);?> profil pucture</title>
    <link rel="stylesheet" href="./modifierProfil/modifierProfil.css">
</head>
<body>
    
<?php
if($_SESSION['statue']==1){
    include("./../../component/navigation/navigation.php"); 
    if(isset($_GET['id'])){
        if($_GET['id']==$_SESSION['id']){
            ?>
            <div class='tout'> 
                <form enctype="multipart/form-data" action="./../../traitement/enregistrementPhotoDeProfil.php" method="GET">
                    <p>Uploader une nouvele photo de profil</p>
                    <p>Taille maximum autorisé: 500kb</p>
                    <label for="photoDeProfil">Choisiser votre photo.</label>
                    <input class="form-control form-control-sm" type="file" required name="photoDeProfil"/>
                    <br/>
                    <button class='btn btn-primary'type="submit">Mettre a jour la photo</button>
                </form>
                <form methode="post" action="">
                    <button type="submit" class="btn btn-outline-success">Retourner au profil</button>
                </form>
            </div>
            <?php
        }
        else{
            header('Location: ./../accueil');
        }
    }
    include('./../../component/pied/pied.php');
}
else{
    include("./../../component/denied/denied.php");
    include("./../../component/login/login.php");
}
?>

</body>
</html>