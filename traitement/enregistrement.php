<?php
// 1 : on ouvre le fichier
$monfichier = fopen('utilisateur.txt', 'a+');
// 2 : on lit la première ligne du fichier
//$ligne = fgets($monfichier);
fputs($monfichier, 'Texte à écrire');
// 3 : quand on a fini de l'utiliser, on ferme le fichier
fclose($monfichier);
?>