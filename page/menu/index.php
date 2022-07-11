<?php
session_start();//ceci est a fin de pouvoir utiliser des variables de sessions globales dans tout l'appli?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./menu/menu.css">
    <title>Menu</title>
</head>
<body>

    <?php 
    if($_SESSION['statue']==1){
        include("./../../component/navigation/navigation.php"); 
        ?>
        <div class="menu">
            <h3>Menu</h3>
            <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="./profil?id=<?php echo($_SESSION['id']);?>">Voir le profil</a></li>
                <li class="list-group-item"><a href="./accueil">Accueil</a></li>
                <li class="list-group-item"><a href="./message">Message</a></li>
                <li class="list-group-item"><a href="./notification">Notification</a></li>
                <li class="list-group-item"><a href="./contact">Contact</a></li>
                <li class="list-group-item"><a href=#">Setting</a></li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item"><a href="#"><img src="./../../assets/img/help.gif"/>Aide et Question</a></li>
                <li class="list-group-item"><a href="#"><img src="./../../assets/img/setting.gif"/> Paramettre</a></li>
                <li class="list-group-item"><a href="#">Condition d'utilisation</a></li>
                <li class="list-group-item logout"><a href="#"><img src="./../../assets/img/logout.gif"/> Se déconnecter</a></li>
            </ul>
        </div>
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