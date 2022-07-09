<?php
session_start();

    include("./../../component/navigation/navigation.php"); 
    include_once("./../../fonction/connectionBDD.php");
    include_once("./../../fonction/presentationcourt.php");
?>

<h3 class="contact">Contact <a class="actualiser" href="./contact.php"><img class="actualiser" src="./../../assets/img/refresh.gif"/></a></h3>
    <div class="row mb-3">
        <div class="row contenuContact row-cols-1 col-md-9 themed-grid-col d-gridrow-cols-sm-3 row-cols-md-4 col-md-4 g-4">
            <button class="btn voir-tout btn-outline-primary w-50">Voir tout les amis dans le contact</button>
            <?php
            $bdd=connectionBDD();
            $req=$bdd->query('SELECT * FROM '.$_SESSION["id"].'discussion ');
            while($donne=$req->fetch())
            {
               echo(presentationcourt($donne["nom_amis"]));
            }
            ?>
        </div>



<?php
/*  $req1->closeCursor();
  
  if($id==$_SESSION['id'])
      return('<a href="./../../profil/profil.php">Vous</a>');

  $req2=$bdd2->query('SELECT * FROM '.$id.'contact  ');
      while($donne2=$req2->fetch())
     {
         if($donne2['id_amis']==$_SESSION['id'])
         {
          $amis=1;
         }
     }   
     $req2->closeCursor();
  if($amis==0)
         return('<a href="./../../traitement/ajoutcontact.php?amis='.$id.'">Ajouter</a>');
  else
         return('<a href="./../../page/message/message.php?id='.$id.'">Message</a>');
*/
?>


        <div class="col-md-3 themed-grid-col">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <button class="btn voir-tout btn-outline-primary ">Voir tout les amis dans le contact</button>
                <div class="d-flex text-muted ">
                  <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
            
                  <p class=" mb-0 small lh-sm border-bottom">
                    <strong class="d-block text-gray-dark">@username</strong>
                    Some representative </p>
                </div>
                <div class="d-flex text-muted pt-3">
                  <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
            
                  <p class=" mb-0 small lh-sm border-bottom">
                    <strong class="d-block text-gray-dark">@username</strong>
                    Some more repres</p>
                </div>
                <div class="d-flex text-muted pt-3">
                  <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"/><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text></svg>
            
                  <p class=" mb-0 small lh-sm border-bottom">
                    <strong class="d-block text-gray-dark">@username</strong>
                    This user also gets</p>
                </div>
                <small class="d-block text-end mt-3">
                  <a href="#">All updates</a>
                </small>
            </div>
    </div>
<?php
    include('./../../component/pied/pied.php');
?>