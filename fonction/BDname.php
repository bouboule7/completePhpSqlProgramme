<?php

    function BDname($sessionNom,$nomamis){
        if($sessionNom>$nomamis)
            return ($sessionNom."a".$nomamis."BD");
    else
            return ($nomamis."a".$sessionNom."BD");
    }
?>