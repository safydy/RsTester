<?php
    //Array into array
    $t1 = array('a','b');
    $tx = array(1=>'one',2=>'two');
    $t1['a'] = $tx;
    echo $t1['a'][1]."<br>";
    //Round
    //
    echo round( 1.54, 1, PHP_ROUND_HALF_DOWN)."<br>";
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
    //----------------tableau--------
    $myTab = array(11,25);
    $myTab = array_merge($myTab,array(15,68));
    print_r($myTab);
    $myTab1 = array('a'=>array('nom'=>"name1",'age'=>14),'b'=>45,'c'=>56);
    $myTab2 = array('a'=>3,'b'=>45,'d'=>0,'e'=>25);
    $myTab3 = array('a'=>array('nom'=>"name1",'age'=>12),'d'=>12, 'www'=>"my site web");
    echo "<br>myTab1 + myTab2 + myTab3<br>";
    print_r($myTab1+$myTab2+$myTab3);
    
    $All = array($myTab1,$myTab2,$myTab3);
    print_r(array_merge($myTab1,$myTab2,$myTab3));
    $myTab4 = array_merge_recursive($myTab1,$myTab2, $myTab3);
    echo '<br>Merge all once: <br>';
    print_r($myTab4);
    echo '<br>';
    
    $MergeAll = array();
    for($i = 0; $i < count($All); $i++){
        $MergeAll = array_merge_recursive($MergeAll,$All[$i]);
    }
    echo '<br>Merge all  loop: <br>';
    print_r($MergeAll);
    //--------------
        function tabContent($vTab, $vSepartor =","){
            $vContentList = "";
            foreach ($vTab as $key => $value){
                if($vContentList == "")
                    $vContentList = $value;
                else
                    $vContentList .= $vSepartor.$value;
            }
            return $vContentList;
        }
        $vT = array (1,2,6,8,"efa",-1,'ar'=>array('2','r'));
        echo tabContent($vT);
        
        echo "<br> test in_array : ".in_array('r',$vT,false);
        echo "<br> test in_array 2 : ".((in_array('r',$vT['ar'],false)==1)?'yes':'no');
        echo "<br> key array " . array_keys($vT);
        echo "<br>".str_replace(",",".","155,58");
        
        $tRequest = array("most"=>array(array("theme"=>"","number"=>0)),
            "less"=>array(array("theme"=>"","number"=>0))
            );
        $tRequest['less'][2]['number'] = 18;
        $test = $tRequest['less'][2]['number'];
        echo "<br> test request :".$tRequest['most'][0]['number'];
        echo "<br>".$test;
        echo "<br>".$tRequest['less'][2]['theme'];
        
        echo "<br> Test equal date string : ".("2013-05-03" < "2013-05-02");
        if("2013-05-03" >= "2013-05-03")
            echo "yes";
        else
            echo "no";
        
        //Contains string
        $my_text = "<br>2011, 2012, 2013";
        echo stripos($my_text, "a");
        echo strpos($my_text, "a");
        echo $my_text."=".((strpos($my_text, "2011") == TRUE)?'yes':'no').'<br>';
        //Décode accents
	function fctAccentDecode($vInput){
		// Replace accented characters
		$vInput = str_replace("\u00c0", "A",$vInput);
		$vInput = str_replace("\u00c1", "A",$vInput);
		$vInput = str_replace("\u00c2", "A",$vInput);
		$vInput = str_replace("\u00c3", "A",$vInput);
		$vInput = str_replace("\u00c4", "A",$vInput);
		$vInput = str_replace("\u00c5", "A",$vInput);
		$vInput = str_replace("\u00c6", "A",$vInput);
		$vInput = str_replace("\u00c7", "C",$vInput);
		$vInput = str_replace("\u00c8", "E",$vInput);
		$vInput = str_replace("\u00c9", "E",$vInput);
		$vInput = str_replace("\u00ca", "E",$vInput);
		$vInput = str_replace("\u00cb", "E",$vInput);
		$vInput = str_replace("\u00cc", "I",$vInput);
		$vInput = str_replace("\u00cd", "I",$vInput);
		$vInput = str_replace("\u00ce", "I",$vInput);
		$vInput = str_replace("\u00cf", "I",$vInput);
		$vInput = str_replace("\u00d1", "N",$vInput);
		$vInput = str_replace("\u00d2", "O",$vInput);
		$vInput = str_replace("\u00d3", "O",$vInput);
		$vInput = str_replace("\u00d4", "O",$vInput);
		$vInput = str_replace("\u00d5", "O",$vInput);
		$vInput = str_replace("\u00d6", "O",$vInput);
		$vInput = str_replace("\u00d8", "O",$vInput);
		$vInput = str_replace("\u00d9", "U",$vInput);
		$vInput = str_replace("\u00da", "U",$vInput);
		$vInput = str_replace("\u00db", "U",$vInput);
		$vInput = str_replace("\u00dc", "U",$vInput);
		$vInput = str_replace("\u00dd", "Y",$vInput);
		
		// Now lower case accents
		$vInput = str_replace("\u00df", "b",$vInput);
		$vInput = str_replace("\u00e0", "a",$vInput);
		$vInput = str_replace("\u00e1", "a",$vInput);
		$vInput = str_replace("\u00e2", "a",$vInput);
		$vInput = str_replace("\u00e3", "a",$vInput);
		$vInput = str_replace("\u00e4", "à",$vInput);
		$vInput = str_replace("\u00e5", "a",$vInput);
		$vInput = str_replace("\u00e6", "a",$vInput);
		$vInput = str_replace("\u00e7", "c",$vInput);
		$vInput = str_replace("\u00e8", "e",$vInput);
		$vInput = str_replace("\u00e9", "é",$vInput);
		$vInput = str_replace("\u00ea", "e",$vInput);
		$vInput = str_replace("\u00eb", "e",$vInput);
		$vInput = str_replace("\u00ec", "i",$vInput);
		$vInput = str_replace("\u00ed", "i",$vInput);
		$vInput = str_replace("\u00ee", "i",$vInput);
		$vInput = str_replace("\u00ef", "i",$vInput);
		$vInput = str_replace("\u00f0", "?",$vInput);
		$vInput = str_replace("\u00f1", "n",$vInput);
		$vInput = str_replace("\u00f2", "o",$vInput);
		$vInput = str_replace("\u00f3", "o",$vInput);
		$vInput = str_replace("\u00f4", "o",$vInput);
		$vInput = str_replace("\u00f5", "o",$vInput);
		$vInput = str_replace("\u00f6", "o",$vInput);
		$vInput = str_replace("\u00f8", "o",$vInput);
		$vInput = str_replace("\u00f9", "u",$vInput);
		$vInput = str_replace("\u00fa", "u",$vInput);
		$vInput = str_replace("\u00fb", "u",$vInput);
		$vInput = str_replace("\u00fc", "u",$vInput);
		$vInput = str_replace("\u00fd", "?",$vInput);
		$vInput = str_replace("\u00ff", "y",$vInput);
		return $vInput;
                

	}
        
        $Text = "my text is : é à ù ! > & '";        
        //echo '<br>'.fctAccentDecode($Text);
        echo '<br>'.htmlentities($Text,ENT_IGNORE,'UTF-8');
        
        //Date-----------------------------
        
        date_default_timezone_set('Europe/Moscow');   
        $vRunTime = date("Y-m-d H:i:s"); //Date actuelle de la requête
        $vActualYear = date_format(new DateTime($vRunTime), "Y");
        $vActualMonth = date_format(new DateTime($vRunTime), "m");
        $vDaysNumber  = cal_days_in_month(CAL_GREGORIAN, $vActualMonth, $vActualYear);
        $vRunTimeString = str_replace(" ","",str_replace(":","",str_replace("-","",$vRunTime)));
        echo '<br>runtime :'.$vRunTime . '|' . $vRunTimeString .'|'.$vActualYear.'-'.$vActualMonth. '|'.$vDaysNumber;
?>
