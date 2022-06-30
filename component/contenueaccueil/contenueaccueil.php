<link rel="stylesheet" href="./../../component/contenueaccueil/contenueaccueil.css">
<a href="./accueil.php">actualiser</a>
<h1> ACTUALITÉS RECENTES:</h1>
<?php
include_once('./../../fonction/presentationPublication.php');
include_once('./../../fonction/pseudo.php');

$bdd5=connectionBDD();
$a=0; $b=10;
if(isset($_GET['a'],$_GET['b'])){
    $a+=10; $b+=10;
}
$requete=$bdd5->query('SELECT publicationId FROM publication ORDER BY publicationId DESC LIMIT '.$a.','.$b.'');
while($result=$requete->fetch()){
    presentationPublication($result['publicationId']);
}
    echo('<a href="./accueil.php?a='.$a.'&b='.$b.'">Afficher plus d\'actualité</a>');
?>