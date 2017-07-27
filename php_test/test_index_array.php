<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$a1 = array("a","a","b","z","a");
echo array_search("a", $a1)."<br>";
echo (array_search("de", $a1)===FALSE)."<br>";


$t = array("a"=>1,"b"=>4,"za"=>12,"d"=>-1);
echo min($t);
unset($t['b']);
var_dump($t);
?>
