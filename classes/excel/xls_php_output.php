<?php
    ini_set("display_errors", "On");
    error_reporting(E_ALL);
        require_once 'PHPExcel.php';
        require_once './PHPExcel/IOFactory.php';
        
        $tData = unserialize(urldecode($_POST['data']));
        
        $filename = isset($_POST['file'])?$_POST['file']:"report";
        $noSenseValue = isset($_POST['no_sense'])?$_POST['no_sense']:null;
        $Creator = "HNI Tech";
        $DocTitle = "tesd_doc";
                //Make file
        $workbook = new PHPExcel();  
        
        // Set Doc properties
        $workbook->getProperties()->setCreator($Creator);
        $workbook->getProperties()->setLastModifiedBy($Creator);
        $workbook->getProperties()->setTitle($DocTitle); 
        
        //Sheet properties
        $border_style = array(
            'borders' => array(                
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                )
            )
        ); 
        
        $header_style = array(
                'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb'=>'EDEDED'),
                ),
                'font' => array(
                        'bold' => true
                ),
            'borders' => array(                
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )            
        );        
        //Add data

        $ext  = 'xls';

        $sheet_number = count($tData);       
        
        for($i = 0; $i < $sheet_number;$i++){
            $workbook->createSheet($i);
            $workbook->setActiveSheetIndex($i);
            $current_sheet = $workbook->getActiveSheet();
            $current_sheet->getDefaultStyle()->getNumberFormat()->setFormatCode('[>=1000]#,##0');
            
            if(isset($tData[$i]['title']))
                $current_sheet->setTitle($tData[$i]['title']);
            
            $table_number = count($tData[$i]['table']);

            $col_length = array();
            for($table = 0,$col = "A",$row = 1; 
                    $table < $table_number; 
                        $table++){
                $row_length[$table] = count($tData[$i]['table'][$table]);
                
                
                $col_length[$table] = count($tData[$i]['table'][$table][0]);
                $last_col = $current_sheet->getCellByColumnAndRow($col_length[$table]-1,$row)->getColumn();
                $current_sheet->getStyle($col.$row.":".$last_col.$row)->applyFromArray($header_style);
                
                if(isset($tData[$i]['data_line_number'][$table]))
                    $data_line_number = $tData[$i]['data_line_number'][$table];
                else
                    $data_line_number = $row_length[$table]-1;
                //Data
                $current_sheet->fromArray($tData[$i]['table'][$table],null,$col.$row);
                
                //Border
                for($k = $row; $k <= $row+$row_length[$table]-1;$k++){
                    $current_sheet->getStyle($col.$k.":".$last_col.$k)->applyFromArray($border_style);
                    
                }
                
                //Calculate Total if needed
                $first_data_row_position = $row + 1; //on passe du header, donc +1
                $last_data_row_position = $first_data_row_position + $data_line_number - 1;
                if(isset($tData[$i]['total'][$table])){
                    
                    $last_row_position = $row+$row_length[$table]-1;
                    $total_row_position = $last_row_position - $tData[$i]['total'][$table];
                    
                    //Browse column
                    for($t = 0;$t < $col_length[$table];$t++){
                        $current_col = $current_sheet->getCellByColumnAndRow($t,$total_row_position)->getColumn();
                        if(is_numeric($current_sheet->getCell($current_col.$total_row_position)->getValue())){
                            //Calculate total
                            $current_sheet->setCellValue($current_col.$total_row_position,
                                    "=SUM(".$current_col.$first_data_row_position.":".$current_col.$last_data_row_position.")");
                        }
                    }
                }
                
                if(isset($tData[$i]['moyenne'][$table])){
                    $last_row_position = $row+$row_length[$table]-1;
                    $mean_row_position = $last_row_position - $tData[$i]['moyenne'][$table];
                    
                    //Browse column
                    for($t = 0;$t < $col_length[$table];$t++){
                        $current_col = $current_sheet->getCellByColumnAndRow($t,$mean_row_position)->getColumn();
                        if(is_numeric($current_sheet->getCell($current_col.$mean_row_position)->getValue())){
                            //Calculate total
                            $current_sheet->setCellValue($current_col.$mean_row_position,
                                    "=AVERAGE(".$current_col.$first_data_row_position.":".$current_col.$last_data_row_position.")");
                        }
                    }                    
                }
                $row += $row_length[$table]+1;
            }
            
        }

        
    header('Content-Type: application/vnd.ms-excel'); 
    header('Content-Disposition: attachment;filename='.$filename.'.'.$ext); 
    header('Cache-Control: max-age=0'); 
    $writer = PHPExcel_IOFactory::createWriter($workbook, 'Excel5');       
        
    $writer->save('php://output');

?>
