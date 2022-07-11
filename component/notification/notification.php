<?php
include('./../../component/navigation/navigation.php');
include_once("./../traitement/image.php");
include_once("./../fonction/connectionBDD.php");
?>
<div class="list-group  notification">
<h3>Notification <a class="actualiser" href="./notification"><img class="actualiser" src="./../../assets/img/refresh.gif"/></a></h2>

<?php
  $bdd5=connectionBDD();
  $a=0; $b=20;
  if(isset($_POST['a'],$_POST['b'])){
      $a+=20; $b+=20;
  }
  $requete=$bdd5->query('SELECT * FROM '.(string)$_SESSION["id"].'notification ORDER BY idNotification DESC ');
  while($result=$requete->fetch()){
    $lien="";
    if($result['vue'])
      $lien="active";
      echo('
      <a href="'.$result["lien"].'" class="list-group-item list-group-item-action flex-column align-items-start '.$lien.'">
      <div class="d-flex w-100 justify-content-between">
        <h6 class="mb-1">'.$result["titre"].'</h6>
        <small>3 days ago</small>
      </div>
      <p class="mb-1">'.$result["contenue"].'</p>
    </a>
      ');
  }
?>
  <a href="./notification?n=20" class="link-danger">Afficher plus de notification</a>
</div>

  <?php
    include('./../../component/pied/pied.php');
    ?>