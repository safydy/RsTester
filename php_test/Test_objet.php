<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require 'Person.php';

    $me = new Person("safidy");
    $you = new Person("RS");
    
    $you->sayBonjour();
    $you->setName($me->getName());
    '<br>'.$you->sayBonjour();
    $you->age = 10;
    echo '<br>'.$you->age;
    
    //---------------------------------------
    
?>
