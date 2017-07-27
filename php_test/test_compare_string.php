<?php
    $a1 = "2014-03-01 00:00:12";

    $a2 = "2014-03-01 00:11:00";
    $a3 = "2014-03-01 00:11:08";
    $a4 = "2014-03-01 00:00:100";
    echo " < ".($a1 < $a2)."<br>";
    echo " > ".($a1 > $a2)."<br>";
    echo "  ".($a2 > $a3)."<br>";
    echo " a2 < a3 ".($a2 < $a3)."<br>";
    echo "  ".($a2 > $a4)."<br>";
    echo " a2 < a4 ".($a2 < $a4)."<br>";    
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
