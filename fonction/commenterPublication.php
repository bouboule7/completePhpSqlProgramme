<?php
 
function commenterPublication($publication){

      $bdd6=connectionBDD();
      $requ=$bdd6->query('SELECT * FROM '.$publication.'');
      $donner=($requ->fetch());
      $love=$donner['reactionAdore'];
      $haha=$donner['reactionHaha'];
      $wow=$donner['reactionWow'];
      $triste=$donner['reactionTriste'];
      $grr=$donner['reactionGrr'];
?>
<div class="publication">
        <a class="d-flex align-items-center link-darkphp -S"
     <?php echo("href='./profil?id=".$donner['id']."'><h4>".pseudo($bdd6,$donner["id"]));?></h4></a>

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
      <?php
             }   
        else{?>
          <div class="card bg-secondary mb-3 mb-3">
              <div class="card-header"><small>11 mins ago</small></div>
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
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
                    <p class="card-text">Legende blablabla , legende blablabla.</p>
              </div>
          <?php  
        }
        ?>

          </div>
          <div class="listeReaction">
            <form action="./../traitement/addReaction.php" method='post'>
              <button type="submit" class="btn btn-outline-danger">
                <input type="hidden" value="<?php echo($publication);?>" name="publicationId"/>
                <input type="hidden" value="<?php echo($love); ?>" name="nombre"/>
                <input type="hidden" name="react" value="love"/>
                <img class="react" src="./../../assets/img/love.gif"/><span class="badge badge bg-danger rounded-pill badge-light"><?php echo $love; ?></span>
              </button>
            </form>
            <form action="./../traitement/addReaction.php" method='post'>
              <button type="submit" class="btn btn-outline-warning">
                <input type="hidden" value="<?php echo($publication);?>" name="publicationId"/>
                <input type="hidden" value="<?php echo($haha); ?>" name="nombre"/>
                <input type="hidden" name="react" value="haha"/>
                <img class="react" src="./../../assets/img/haha.gif"/><span class="badge badge bg-warning rounded-pill badge-light"><?php echo $haha; ?></span>
              </button>
            </form>
            <form action="./../traitement/addReaction.php" method='post'>
              <button type="submit" class="btn btn-outline-info">
                <input type="hidden" value="<?php echo($publication);?>" name="publicationId"/>
                <input type="hidden" value="<?php echo($wow); ?>" name="nombre"/>
                <input type="hidden" name="react" value="wow"/>
                <img class="react" src="./../../assets/img/wow.gif"/><span class="badge badge bg-danger rounded-pill badge-light"><?php echo $wow; ?></span>
              </button>
            </form>
            <form action="./../traitement/addReaction.php" method='post'>
              <button type="submit" class="btn btn-outline-success">
                <input type="hidden" value="<?php echo($publication);?>" name="publicationId"/>
                <input type="hidden" value="<?php echo($triste); ?>" name="nombre"/>
                <input type="hidden" name="react" value="triste"/>
                <img class="react" src="./../../assets/img/triste.gif"/><span class="badge badge bg-success rounded-pill badge-light"><?php echo $triste; ?></span>
              </button>
            </form>
            <form action="./../traitement/addReaction.php" method='post'>
              <button type="submit" class="btn btn-outline-secondary">
                <input type="hidden" value="<?php echo($publication);?>" name="publicationId"/>
                <input type="hidden" value="<?php echo($grr); ?>" name="nombre"/>
                <input type="hidden" name="react" value="grr"/>
                <img class="react" src="./../../assets/img/grr.gif"/><span class="badge badge bg-secondary rounded-pill badge-light"><?php echo $grr; ?></span>
              </button>
            </form>
          </div>
          <small class="commentaire">Commentaires associés</small>
            <form method="post" action="./../traitement/nouveauCommentaire.php">
              <input type="hidden" value="<?php echo($publication);?>" name="publicationId"/>
              <textarea name="commentaire" id="commentaire" placeholder="Votrer commentaire"></textarea>
              <button type="submit" classe="btn btn-outline-success">Commenter</button>
            </form> 
</div>
<?php
    }
    ?>