<?php

    //date
    $d1 = date_create(date('Y-m-d'));
    $d2 = date_create("2014-03-02");
    $d3 = date_format($d2, 'Y-m-d');
    $vNombreJourStock = "5";
    $vNbrJr = $vNombreJourStock.' days';
    $vDate = date_sub(date_create($d3), date_interval_create_from_date_string($vNbrJr));
    echo "d1 ".date_format($d1, 'Y-m-d')."<br>";
    echo "d2 ".date_format($d2, 'Y-m-d')."<br>";
    echo "vDate ".date_format($vDate, 'Y-m-d')."<br>";
    echo "nombre jour ".date_format($vDate, 't')."<br>";
    
    $i = date_diff($d1, $d2);
    $j = $d2->diff($d1);
    echo "d2 - d1 :". $i->format('%Y-%m-%d')."<br>";
    echo "d2 - d1 :". ($i->format('%r%a'))."<br>";
    echo date_format($d2, 'n');
    
    //Compare string date
    echo "----------------------<br>";
    $date1 = "2012-09-26 05:22:21";
    $date2 = "2012-09-26 05:21:31";
    echo strcmp($date1, $date2);
    echo strcmp($date2, $date1);
    
    //Week
    echo "<br> Test setISODate <br>";
    $mois = "8.0";
    $anneeSoumission = 2017;
    $semaine = $mois * 1; // 1 à 52
    $gendate = new \DateTime();
    $gendate->setISODate($anneeSoumission, $semaine, 1); //year , week num , day
    $dateRapportage = $gendate->format('m/Y');
    echo $dateRapportage. "<br>";
    
    //Month sub
    echo "<br> Test sub month <br>";
    $strDateMY = "02/2017";
    $tStrDateMY = explode("/", $strDateMY);
    $date1 = date_create($tStrDateMY[1]."-".$tStrDateMY[0]."-01");
    $nbrMois = 2;
    echo "<br>date 1 : ".date_format($date1, 'm/Y');
    $date2 = date_sub($date1, date_interval_create_from_date_string($nbrMois." months"));
    echo "<br>date 2 : ".date_format($date2, 'm/Y');
?>
