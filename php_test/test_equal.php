<?php
    $vNoData = "no data";
    $vNull = NULL;
    $vVide = "";
    $vNbr = "no data";
    if($vNbr == $vNoData)
        echo "<br> == no data";
    if($vNbr == $vNull)
        echo "<br> == null";    
    if($vNbr == $vVide)
        echo "<br> == vide"; 
    if($vNbr == 0)
        echo "<br> == 0";    
    
    if($vNbr === $vNoData)
        echo "<br> === no data";
    if($vNbr === $vNull)
        echo "<br> === null";    
    if($vNbr === $vVide)
        echo "<br> === vide";
    if($vNbr === 0)
        echo "<br> === 0";    
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
