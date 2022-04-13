<?php
session_start();//ceci est a fin de pouvoir utiliser des variables de sessions globales dans tout l'appli
    if($_SESSION['statue']!=1)
    $_SESSION['statue']=0;
    header('Location: ./page/accueil/accueil.php');
?>