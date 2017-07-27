<?php
    $vTitre = "PGDI 2013";
//    $vOnClick = "";
//    $vIdPlan = 4;
//    $vIdAcademieUtilisateur = 0;
//    $vIdIdenUtilisateur = 0;
//    $vIdTypeNiveauUtilisateur = 1;
//    $vConditionAcademie = "";
//    $vConditionIden = "";

    include_once('classes/googlemap.php');
	
	?>
    <div class="container">
    <form name="mainform" id="mainform" method="post" action="">
    
    <?php

    
	//`groupe_module_A/B26` as localisation, `groupe_module_A/B26_latitude`,`groupe_module_A/B26_longitude`,`groupe_module_A/B26_altidude`,`groupe_module_A/B26_precision`
	//`groupe_module_A/B17` as adresse, `groupe_module_A/B1` as id_menage
	//`groupe_module_A/B6` as grappe, `groupe_module_A/B11_faritra` as region, deviceid, `groupe_module_A/B37` as enqueteur

	$QryMenage = "SELECT * FROM verify_localite";
	$vRsQMenage = $vCon->createResultSet($QryMenage,$database);
	
    if($vRsQMenage->current() === null){
        echo "Pas de m&eacute;nage trouv&eacute;s";
    }
    else{
        $tCoordonnee = array();
        $vNumMenage = 0;
        $tMenageSansLatOuLng = array();
        $vTotal = $vRsQMenage->getNumberRows();
        foreach($vRsQMenage as $vRowMenage){
            $tCoordonnee['numMenage'][] = $vNumMenage++;
			
			$lat = -$vRowMenage['lat'];
			$long = $vRowMenage['long'];
            if($lat != null && $long != null && 
                    $lat !== "" && $long !== ""){
                $tCoordonnee['lat'][] =  $lat;
                $tCoordonnee['lng'][] =  $long;

                $vInfo = "Coord : ".$lat.", ".$long."<br>"."Pr&eacute;cision : ".$precision."m<br>".
                        "Grappe : ".$vRowMenage['grappe']."<br>". 
                            "Menagrap: ".$vRowMenage['menagrap']."<br>".
                                "qmstrucutre : ".$vRowMenage['qmstructure']."<br>".
                                    "qmmenagestruct : ".$vRowMenage['qmmenagestruct'];
                
                $tCoordonnee['info'][] = $vInfo;
                //echo $vInfo."<br>";
                $vInfo = $vInfo . "<table>";
                $vInfo = $vInfo . "<tr>";
                $vInfo = $vInfo . "<td>";
                $vInfo = $vInfo . "</td>";
                $vInfo = $vInfo . "</tr>";
                $vInfo = $vInfo . "</table>";            
            }else
                $tMenageSansLatOuLng[] = $vNumMenage;        
        }

        $tLat = $tCoordonnee['lat'];
        $tLng = $tCoordonnee['lng'];
        $vMaxLat = max($tLat);
        $vMinLat = min($tLat);
        $vMaxLng = max($tLng);
        $vMinLng = min($tLng);

        $vCntLat = ($vMaxLat+$vMinLat)/2;
        $vCntLng = ($vMaxLng+$vMinLng)/2;

		//Gérer si un seul point
		if($vMaxLat === $vMinLat){
			$vMaxLat = $vMaxLat + 0.05;
			$vMinLat = $vMinLat - 0.05;
		}
		
		if($vMaxLng - $vMinLng){
			$vMaxLng = $vMaxLng + 0.05;
			$vMinLng = $vMinLng -0.05;
		}
        function fctGetZoom($vMinLat,$vMaxLat,$vMinLng,$vMaxLng){
            $GLOBE_HEIGHT = 360; 
            $GLOBE_WIDTH = 360;

            $vAngleLat = $vMaxLat - $vMinLat;
            $vAngleLng = $vMaxLng - $vMinLng;
            if($vAngleLat>$vAngleLng){
                $vAngle = $vAngleLat;
            }
            else{
                $vAngle = $vAngleLng;
            }

            if ($vAngle < 0) {
                $vAngle += 360;
            }
            return floor(log(960*360/$vAngle/$GLOBE_WIDTH)/log(2)) ;
        }

        //echo fctGetZoom($vMinLat,$vMaxLat,$vMinLng,$vMaxLng);

            //echo $vStrQryIden;
        ?>
<div id="carte">

            <input type="hidden" name="id_iden" id="id_iden" value="0">

            <table border="0" align="center">
               <tr>
                    <td align="center" class="titre">Carte</td>
                </tr>
                
                <tr>
                    <td align="center"><b>Situation globale</b></td>
                </tr>
                <tr>
                    <td>
                        <div id="map" style="width:850px; height:580px;" >
                            <?php
                            $map=new GOOGLE_API_3();
                            $map->center_lat = "'" . $vCntLat . "'"; // set latitude for center location
                            $map->center_lng = "'" . $vCntLng . "'"; // set longitude for center location
                            $map->zoom = fctGetZoom($vMinLat,$vMaxLat,$vMinLng,$vMaxLng);

                            for($i=0;$i<count($tCoordonnee['lat']);$i++){
                                // marker 2
                                $lat = "'" . $tCoordonnee['lat'][$i] . "'"; // latitude
                                $lng = "'" . $tCoordonnee['lng'][$i] . "'"; // longitude
                                $isclickable='true';                        
                                $info = $tCoordonnee['info'][$i];
                                $title = "menage num : ".$tCoordonnee['numMenage'][$i];
                                $icon = 'images/map_marker_red.png';
                                $map->addMarker($lat,$lng,$isclickable,$title,$info,$icon);
                            }
        //                        $lat = "-23.336583"; // latitude
        //                        $lng = "43.677000"; // longitude
        //                        $isclickable='true';
        //                        $title = "eto";
        //                        $info ="test";
        //                        $icon = 'images/map_marker_red.png'; 
        //                        $map->addMarker($lat,$lng,$isclickable,$title,$info,$icon);
                            echo $map->showmap();
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td align="center"><?php  echo "Nombre total de m&eacute;nages trouv&eacute;s : ".$vTotal ?> </td>
                </tr>
                <tr>
                    <td align="center"><?php  echo "Nombre de m&eacute;nages sans coordonn&eacute;es valides : ".count($tMenageSansLatOuLng) ?> </td>
                </tr>
            </table>    

</div>

<?php    
    }    
?>
</form>
</div>
