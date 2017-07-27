<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$t = array(789989,9098,897879);
print_r($t);
echo "<br>";

//array_pop($t,789989);
unset($t[789989]);
$t = array_values($t);
print_r($t);
echo "<br>";

$t = array_diff($t,array(789989));
print_r($t);