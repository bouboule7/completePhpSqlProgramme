<?php
session_start();

    include_once('./User.class.php');
    echo("1");
    $lita=new User();
echo("2");
    echo($lita->getnom());
echo("3");
    $_SESSION['util']=lita;
    echo("4");

echo(($_SESSION['util'])->getnom());
echo("5");
session_status();
echo($lita->getnom());
?>