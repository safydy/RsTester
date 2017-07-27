<?php
/**
 * Created by PhpStorm.
 * User: rs
 * Date: 19/07/2017
 * Time: 18:26
 */
$strAEvaluer = "0.00754716981132>4AND0.00754716981132<5";
$strlVerifie = eval("return (5.001>4 AND 0.00732<5+1) ;");
$strlVerifie2 = eval("return (5.00754716981132>4 AND 0.00754716981132<5) ;");
echo "verifie = '".$strlVerifie."' | '".$strlVerifie2."'";