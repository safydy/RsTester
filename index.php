<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $vServerAdress = "41.188.13.54:8080";
    $tList = array("PGDI [*]"=>"http://$vServerAdress/pgdi/",//ok
        "Chemonics [*]"=>"http://$vServerAdress/chemonics/",//ok
        "GSMA [*]"=>"http://$vServerAdress/gsma/",//ok
        "Vouchers [*]"=>"http://$vServerAdress/voucher/",//ok
        "PSI (ISM) [*]"=>"http://$vServerAdress/psi_dev/",//ok
        "BNGRC [*]"=>"http://$vServerAdress/bngrc/",//ok
        "USAID/Senegal (hosted in mandrosoa.org)"=>"http://mandrosoa.org/usaid_senegal/",
        "Stat 321"=>"http://$vServerAdress/stat321/",
        "Photos Slider"=>"http://$vServerAdress/photos-slider/",
        "Zainmandroso"=>"#"//http://$vServerAdress/zainmandroso/
        );
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        <link href="./media/bootstrap3/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="media/bootstrap3/multiselect/css/bootstrap-multiselect.css" type="text/css"/>
        <link href="./media/bootstrap3/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1;" />
        <title>List Applications</title>
	
	<link rel="stylesheet" type="text/css" href="media/css/dropdown-menu.css">
	<script type="text/javascript" src="media/javascript/dropdown-menu.js"></script>
	
	<script type="text/javascript" src="./classes/jquery-1.9.1.js"></script>
        <script src="./media/bootstrap3/js/bootstrap.min.js"></script>
        <script src="./media/bootstrap3/js/bootbox.min.js"></script>
        
	<script type="text/javascript" src="./classes/jquery-ui-1.10.2.custom.js"></script>
        <script src="media/bootstrap3/multiselect/js/bootstrap-multiselect.js"></script>
        <script type="text/javascript" src="./media/bootstrap3/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
        <script type="text/javascript" src="./media/bootstrap3/datepicker/js/bootstrap-datepicker.js"></script>        
	<!--
        <script type="text/javascript" src="../classes/shadowbox-3.0.3/shadowbox.js"></script>
	<link href="../css/jquery.mCustomScrollbar.css" rel="stylesheet" />
        <script src="../classes/jquery.mCustomScrollbar.concat.min.js"></script>
        -->
        
        <!-- Custom scrollbars CSS & JS -->
		<link href="./media/css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
        <script src="./media/javascript/jquery.mCustomScrollbar.concat.min_new.js"></script>	
        
        <!-- SimpleModal and Basic JS files -->
        <link type='text/css' href='./media/css/basic.css' rel='stylesheet' media='screen' />
        <script type='text/javascript' src='./media/javascript/jquery.simplemodal.js'></script>
        <script type='text/javascript' src='./media/javascript/basic.js'></script>		
		
        <!-- Scroll horizontall -->
        <script type="text/javascript" src="./media/javascript/jquery.ba-floatingscrollbar_v05.js"></script>
		<script>		
        $(function(){
            $('.multiselect').multiselect({includeSelectAllOption: true});
            $('.tt').tooltip(); 
        });
        </script>

    </head>
    
    <body>
    <noscript>
            <p class="message-box margin_left_20">Javascript is disabled in your browser, Please enable it.</p>
    </noscript>
    
    <div class="container">
        <h2>Liste des applications </h2>
        <table class="table table-bordered ">
            
            <tr>
                <th>Application</th>
                <th>URL</th>
            </tr>
            <?php 
                foreach ($tList as $appName => $appURL){ 
                   echo "<tr>";
                        echo "<td>$appName</td>";
                        echo "<td>";
                        if($appURL !== "#" && $appURL !== ""){
                            echo "<a href='$appURL'>Voir</a>";
                        }
                        echo "</td>";
                   echo "</tr>"; 
                   
                } ?>
        </table>
        <p>[*] : <i> Vous pouvez utiliser les logins envoy&eacute;s par mail </i></p><br>
        <h2>Notes (en cas de bugs)</h2>
        <p>
            Si vous logguez dans une application mais, à cet instant, celle-ci retourne une page vide :  : 
        allez sur l'adresse URL et supprimez la chaine "_login.php" puis appuyez sur ENTRER. 
        Ex : http://41.188.13.54:8080/voucher/_login.php </p>
	</div>
   </body>
</html>

