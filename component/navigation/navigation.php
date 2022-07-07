<?php
include_once("./../../traitement/image.php");
include("./../../fonction/connectionBDD.php");
?>
<link rel="stylesheet" href="./../../component/navigation/navigation.css">
<link rel="stylesheet" href="./../../assets/bootstrap/dist/css/bootstrap.min.css">

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" aria-label="Offcanvas navbar large">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
        <span class="navbar-toggler-icon"></span>
      </button>
        
         <div class="offcanvas offcanvas-end text-white bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
        <div class="offcanvas-body">
          <h2>Joov'Teck</h2>
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="./../accueil/accueil.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./../message/message.php">Message<span class="badge rounded-pill badge-light">4</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Notifications<span class="badge rounded-pill badge-light">4</span></a>
            </li>
                <li class="nav-item">
                  <a class="nav-link" href="./../contact/contact.php">Contact<span class="badge rounded-pill badge-light">4</span></a>
                </li>
            <li class="nav-item">
                    <a class="nav-link" href="./../menu/menu.php">Menu</a>
            </li>
            
            
          </ul>
          <form class="d-flex mt-3 mt-lg-0" method="post" action="./../../page/recherche/recherche.php" role="search">
            <input class="form-control me-2" name="recherche" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
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
        <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle " id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="photoDeProfilPseudo rounded-circle" src="<?php
                            if($nombrePhotoProfil==0) 
                                echo('./../../assets/img/profil.jpeg');
                            else
                            echo('./../../traitement/image.php?id='.$_SESSION['id'].'&type=profil&photoId='.$nombrePhotoProfil);
                        ?>" alt="photo de profil"/>
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="./../profil/profil.php?id=<?php echo($_SESSION['id']);?>">Profile</a></li>
                <li><a class="dropdown-item" href="#">Parametre</a></li>
                <li><a class="dropdown-item" href="#">Condition d'utilisation</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="./../../traitement/deconnection.php">Se Déconnecter</a></li>
            </ul>
        </div>
    </div>
</nav>

     
<script src="./../../assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="./../../component/navigation/navigation.js"></script>