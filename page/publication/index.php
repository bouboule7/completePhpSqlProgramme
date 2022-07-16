<?php
    session_start();
    include('./../../fonction/publication.php');
    include('./../../fonction/pseudo.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication de </title>
    <link rel="stylesheet" href="./publication/publication.css">
</head>
<body>
<?php
if($_SESSION['statue']==1){
    include("./../../component/navigation/navigation.php"); 
    include_once("./../../fonction/commenterPublication.php");
    if(isset($_POST['publication'])){
        commenterPublication($_POST['publication']);
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