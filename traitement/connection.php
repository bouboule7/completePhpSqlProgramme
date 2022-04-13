<?php 
session_start();
    $_SESSION['statue']=1;
    header('Location: ./../page/accueil/accueil.php');
?>