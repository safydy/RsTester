<?php

    ini_set("display_errors", "On");
    error_reporting(E_ALL);
        require_once 'classes/excel/PHPExcel.php';
        require_once 'classes/excel/PHPExcel/IOFactory.php';
        
    //READ
    $objet = new PHPExcel_Reader_Excel5();    
    $excel = $objet->load('images/enquete_reference_final_11_final_2014_03_13_09_24_53.xls');
    
    //Browse first sheet 
    $my_sheet = 0;//onglet correspondant
    $first_sheet = $excel->getSheet($my_sheet);
    $col = 0;
    $row = 1;
    $col_value = "#";
    
    
    $tColumn = array();
    //lister col_name
    echo "<table>";
    echo "<tr>";
    do{
        $col_name = $first_sheet->getCellByColumnAndRow($col,$row)->getColumn();
        $col_value = $first_sheet->getCell($col_name.$row)->getValue();
        if($col_value != ""){
            $t = explode("/", $col_value);
            echo "<th>".$t[count($t)-1]."</th>";
            $tColumn[] = $t[count($t)-1];
            $col++;
        }
    }while($col_value != "");
    echo "</tr>";
    
    
    echo "<tr>";
    
    //$tEnqueteur = fctGetEnqueteurByDeviceId($deviceId);
    //Insert enqueteur_id & enqueteur_name
    echo "<td></td>";//enqueteur_id
    echo "<td></td>";//enqueteur_name
    
    //Les autres data
    $data_row = 2;
    foreach ($tColumn as $col_index => $col_data_name) {
        $col_name = $first_sheet->getCellByColumnAndRow($col_index,$data_row)->getColumn();
        $col_value = $first_sheet->getCell($col_name.$data_row)->getValue();
        echo "<td>$col_value</td>";
    }   
    echo "</tr>";
    
    
    echo "</table>";
    
    //Get device_id and fill the enqueteur_id & enqueteur_name
    function fctGetEnqueteurByDeviceId($deviceId){
        global $vCon, $database;
        $table = "info_enquteur";
        $Qry = "SELECT * FROM $table WHERE deviceid = '$deviceId' ORDER BY _submission_time DESC limit 1";
        $Rs = $con->createResultSet($Qry,$database); 
        $Row = $Rs->current();

        return array('id'=>$Row['q2'],'name'=>$Row['q3']);
    }
?>
