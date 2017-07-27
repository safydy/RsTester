<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person
 *
 * @author USER
 */
class Person {
    //put your code here
    private $name;
    function Person($name){
        $this->name = $name;
    }
    function sayBonjour(){
        echo "Hello ".$this->name;
    }
    function getName(){
        return $this->name;
    }
    function setName($newName){
        $this->name = $newName;
    }
}

?>
