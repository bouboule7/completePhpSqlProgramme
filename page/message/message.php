<?php
session_start();//ceci est a fin de pouvoir utiliser des variables de sessions globales dans tout l'appli?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
</head>
<body>

    <?php 
    include("./../../component/entete/entete.html"); 
    if($_SESSION['statue']==1){
        include("./../../component/navigation/navigation.php"); 
        include('./../../component/pied/pied.php');
    }
    else{
        include("./../../component/denied/denied.php");
        include("./../../component/login/login.php");
    }
    ?>

</body>
</html>