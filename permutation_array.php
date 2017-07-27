<?php

// function to generate all possible permutation from an array
function permute(array $tMyArray,$i) {
   $n = count($tMyArray);
   $tResult = array();
   if ($i == $n){
       $tResult[] = array_values($tMyArray);
   }else {
        for ($j = $i; $j < $n; $j++) {
            swap($tMyArray,$i,$j);
            foreach (permute($tMyArray, $i+1) as $tValue){
                $tResult[] = $tValue;
            }          
            swap($tMyArray,$i,$j); // backtrack.
       }
   }
   return $tResult;
}

// function to swap the char at pos $i and $j of $str.
function swap(&$tMyArray,$i,$j) {
    $temp = $tMyArray[$i];
    $tMyArray[$i] = $tMyArray[$j];
    $tMyArray[$j] = $temp;
}   

$tMyArray = array("yes","no","euh");
    print_r(permute($tMyArray,0));
    echo "<br>";
