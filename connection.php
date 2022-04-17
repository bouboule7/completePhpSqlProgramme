<?php
    try
    {
    // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=basededonne1', '10', '');
     //   mysql_connect("localhost", "root", "");
       // mysql_select_db("baseDeDonne");
// -------
    }
    catch(Exception $e)
    {
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
    // Si tout va bien, on peut continuer
    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM listeutilisateur');
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
        echo $donnees['nom']; ?><br />
        mail : <?php echo $donnees['mail'];?><br/>
        </p>
        <?php
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
?>