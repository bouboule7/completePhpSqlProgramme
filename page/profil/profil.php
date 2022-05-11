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
    <title>Profil</title>
    <link rel="stylesheet" href="./profil.css">
</head>
<body>

<?php
include("./../../component/entete/entete.html"); 
if($_SESSION['statue']==1){
    include("./../../component/navigation/navigation.php"); 
    if(isset($_GET['id'])){
            presentation($_GET['id']);
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