<?php
session_start();//ceci est a fin de pouvoir utiliser des variables de sessions globales dans tout l'appli?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="./contact.css">
</head>
<body>

    <?php 
    include_once("./../../fonction/pseudo.php");
    if($_SESSION['statue']==1){
        include("./../../component/contact/contact.php");
    }
    else{
        include("./../../component/denied/denied.php");
        include("./../../component/login/login.php");
    }

    ?>
</body>
</html>