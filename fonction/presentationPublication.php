<?php
    function presentationPublication($publicationId){

      $bdd6=connectionBDD();
      $requ=$bdd6->query('SELECT * FROM '.$publicationId.'publication');
      $donner=($requ->fetch());
      $i=$publicationId;
?>
    <article class="my-3" id="typography">
      <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
        
        <a class="d-flex align-items-center link-darkphp -S"
     <?php echo("href='./profil?id=".$donner['id']."'><h4>".pseudo($bdd6,$donner["id"]));?></h4></a>
      </div>

      <div class="bd-example-snippet bd-code-snippet">

<?php
        if($donner['photo1']==0){
            ?>
            <div class="card bg-secondary mb-3">
              <div class="card-header"><small>11 mins ago</small></div>
              <div class="card-body">
                <h5 class="card-title"><?php echo($donner['contenueText']);?></h5>
            </div>
        </div>
                <a href="#" class="btn btn-outline-danger"><img class="react" src="./../../assets/img/love.gif"/></a>
                <a href="#"  class="btn btn-outline-warning"><img class="react" src="./../../assets/img/haha.gif"/><span class="badge badge bg-warning rounded-pill badge-light">8</span></a>
                <a href="#"  class="btn btn-outline-info"><img class="react" src="./../../assets/img/wow.gif"/></a>
                <a href="#" class="btn btn-outline-success"><img class="react" src="./../../assets/img/triste.gif"/><span class="badge badge bg-success rounded-pill badge-light">8</span></a>
                <a href="#"  class="btn btn-outline-secondary"><img class="react" src="./../../assets/img/grr.gif"/></a>
                <a href="#" class="btn btn-outline-dark">Commenter</a><br/>
                <small class="commentaire">Commentaires recents</small>
                <a href="#" classe="moreComments">Voir tout les commentaires</a>
      <?php
             }   
        else{?>
          <div class="card bg-secondary mb-3 mb-3">
              <div class="card-header"><small>11 mins ago</small></div>
        
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="./../../assets/img/couverture.jpeg" class="bd-placeholder-img d-block card-img-top " alt="...">
                  </div>
                  <div class="carousel-item">
                    <img  class="bd-placeholder-img d-block card-img-top" src="<?php 
                        echo("./../../traitement/image.php?id=".$donner['id']."&type=publication&photoId=".$donner['photo1']);
                    ?>" alt="photo de profil"/>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>

              
                  

              <div class="card-body">
                <h5 class="card-title"><?php echo($donner['contenueText']);?></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            <a href="#" class="btn btn-outline-danger btn-danger"><img class="react" src="./../../assets/img/love.gif"/<span class="badge rounded-pill badge-light"><span class="badge rounded-pill badge-light">5</span></a>
            <a href="#" class="btn btn-outline-warning"><img class="react" src="./../../assets/img/haha.gif"/></a>
            <a href="#" class="btn btn-outline-info"><img class="react" src="./../../assets/img/wow.gif"/><span class="badge badge bg-info rounded-pill badge-light">8</span></a>
            <a href="#" class="btn btn-outline-success"><img class="react" src="./../../assets/img/triste.gif"/></a>
            <a href="#" class="btn btn-outline-secondary"><img class="react" src="./../../assets/img/grr.gif"/><span class="badge badge bg-secondary rounded-pill badge-light">8</span></a>
            <a href="#" class="btn btn-outline-dark">Commenter</a><br/>
                <small class="commentaire">Commentaires recents</small>
                <a href="#" classe="moreComments">Voir tout les commentaires</a>
          <?php 
 
        }
?>
     <div>
              <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home<?php echo($i);?>" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Koto kely</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile<?php echo($i);?>" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Lita kely</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact<?php echo($i);?>" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Bema kely</button>
              </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home<?php echo($i);?>" role="tabpanel" aria-labelledby="nav-home-tab">
                <p>commentaire 1</p>    
              </div>
              <div class="tab-pane fade" id="nav-profile<?php echo($i);?>" role="tabpanel" aria-labelledby="nav-profile-tab">
                <p>commentaire 2</p>
              </div>
              <div class="tab-pane fade" id="nav-contact<?php echo($i);?>" role="tabpanel" aria-labelledby="nav-contact-tab">
                <p>commentaire 3</p>
              </div>
            </div>
        </div>
    </article>
<?php
    }
    ?>