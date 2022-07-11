<link rel="stylesheet" href="./../../component/accueil/accueil.css">
<?php
include('./../../component/navigation/navigation.php');
include_once("./../../traitement/image.php");
?>
    <?php
    $bdd2=connectionBDD();
            $req=$bdd2->query('SELECT * FROM '.$_SESSION["id"].'photo ');
            $nombrePhotoProfil=0;
            while($donneImage=$req->fetch())
            {
                if($donneImage['type']=="profil"){
                    if($nombrePhotoProfil<$donneImage['photoId'])
                        $nombrePhotoProfil=$donneImage['photoId'];
                }
            }
    ?>

<aside class="bd-aside sticky-xl-top bg-dark text-muted align-self-start mb-3 mb-xl-5 px-2">
  <h2 class="h6 pt-4 pb-3 mb-4 border-bottom"></h2>
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Recent updates</h6>
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

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Suggestions</h6>
    <div class="d-flex text-muted ">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class=" mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class=" mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class=" mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <small class="d-block text-end mt-3">
      <a href="#">All suggestions</a>
    </small>
  </div>
</aside>
<div class="bd-cheatsheet container-fluid ">
  <section id="content" >
      <h2 class=" actu sticky-xl-top fw-bold pt-3 pt-xl-5 pb-2 pb-xl-3">Actualité <a class="actualiser" href="./accueil"><img class="actualiser" src="./../../assets/img/refresh.gif"/></a></h2>
  <div class="newPubBloc">
        <img  class="photoDeProfilNewPublication" src="<?php
                        if($nombrePhotoProfil==0) 
                            echo("./../../assets/img/profil.jpeg");
                        else
                        echo("./../../traitement/image.php?id=".$_SESSION['id']."&type=profil&photoId=".$nombrePhotoProfil);
                    ?>" alt="photo de profil"/>
    <div class="inputArea">
     <form action="./../../traitement/publicationText.php" method="post">
        <div class="input-group mb-3">
         <textarea type="text" class="form-control" name="publication" id="publication" placeholder="Nouvelle publication" aria-label="Recipient's username" aria-describedby="button-addon2"></textarea>
          <button type="submit" class="btn btn-outline-danger">Publier</button>
        </div>
      </form>
      <a class="link-success" href="./newPublicationPhoto">Joindre des photo</a>
    </div>
  </div>
    <?php
    include('./../../component/contenueaccueil/contenueaccueil.php');
    ?>
  </div>

    <?php
    include('./../../component/pied/pied.php');
    ?>