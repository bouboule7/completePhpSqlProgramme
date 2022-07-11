<link rel="stylesheet" href="./../../component/contenueaccueil/contenueaccueil.css">
<?php
include_once('./../../fonction/presentationPublication.php');
include_once('./../../fonction/pseudo.php');
?>
<div></div>


<?php
$bdd5=connectionBDD();
$a=0; $b=20;
if(isset($_POST['a'],$_POST['b'])){
    $a+=20; $b+=20;
}
$requete=$bdd5->query('SELECT publicationId FROM publication ORDER BY publicationId DESC LIMIT '.$a.','.$b.'');
while($result=$requete->fetch()){
    presentationPublication($result['publicationId']);
}
?>
    <form method="post" action="./accueil">
        <input type="hidden" name="a" value=    <?php echo('"'.$a.'"');  ?>/>
        <input type="hidden" name="b" value=    <?php echo('"'.$b.'"');  ?>/>
        <button type="submit" class="btn-lien link-primary"> Afficher plus d'actualité</button>
    </form>

</section>
</div>
</div>