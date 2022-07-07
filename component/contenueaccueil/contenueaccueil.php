<link rel="stylesheet" href="./../../component/contenueaccueil/contenueaccueil.css">
<?php
include_once('./../../fonction/presentationPublication.php');
include_once('./../../fonction/pseudo.php');
?>
<div></div>


<?php
$bdd5=connectionBDD();
$a=0; $b=20;
if(isset($_GET['a'],$_GET['b'])){
    $a+=20; $b+=20;
}
$requete=$bdd5->query('SELECT publicationId FROM publication ORDER BY publicationId DESC LIMIT '.$a.','.$b.'');
while($result=$requete->fetch()){
    presentationPublication($result['publicationId']);
}
    echo('<a href="./accueil.php?a='.$a.'&b='.$b.'">Afficher plus d\'actualité</a>');
?>



</section>
</div>
</div>