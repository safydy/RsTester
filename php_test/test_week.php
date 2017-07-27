<?php

    //Default week
    $annee = "2017";
    $mois = "05";
    $semaine = $mois * 1; // 1 à 52
    
    $gendate = new \DateTime();//Fix with \
    $gendate->setISODate($annee, $semaine,1); //year , week num , day
    echo "<br> gen date : ".$gendate->format('d/m/Y');

    $dateRapportage = date_add($gendate, date_interval_create_from_date_string("3 days"));
    echo "<br> rapportage date : ".$dateRapportage->format('d/m/Y');
//    $dateRapportage = $gendate->format('m/Y');
?>
