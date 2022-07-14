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
    <title><?php echo("lala");?> profil pucture</title>
</head>
<body>
    
<?php
include("./../../component/entete/entete.html"); 
if($_SESSION['statue']==1){
    include("./../../component/navigation/navigation.php"); 
    if(isset($_POST['id'])){
        if($_POST['id']==$_SESSION['id']){
            ?>
            <div>
                <form enctype="multipart/form-data" action="./../../traitement/enregistrementPhotoDeProfil.php" method="post">
                    <p>Uploader une nouvele photo de profil</p>
                    <p>Taille maximum autorisé: 500kb</p>
                    <label for="photoDeProfil">Choisiser votre photo.</label>
                    <input type="file" required name="photoDeProfil"/>
                    <br/>
                    <button type="submit">Mettre a jour la photo</button>
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