<?php
    
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	@session_start();
	
	require 'classes/mysql/MySQLConnect.php';
	
	require_once '_server_param.php';
        

	$vCon = new MySQLConnect($hostname, $username, $password);
	
	
	$vApplicationIdUtilisateurApi = 8;
	$vApplicationHeureLocalAdd = ""; //"+3 hours";
	
	$vApplicationVersion = "2013.4.30";
	$vApplicationName = "Projet PGDI";
	$vApplicationOrganisme = "PGDi"; // Dans django admin
	
	$tApplicationMoisDjango[1] = "Jan.";
	$tApplicationMoisDjango[2] = "Feb.";
	$tApplicationMoisDjango[3] = "March";
	$tApplicationMoisDjango[4] = "April";
	$tApplicationMoisDjango[5] = "May";
	$tApplicationMoisDjango[6] = "June";
	$tApplicationMoisDjango[7] = "July";
	$tApplicationMoisDjango[8] = "Aug.";
	$tApplicationMoisDjango[9] = "Sept.";
	$tApplicationMoisDjango[10] = "Oct.";
	$tApplicationMoisDjango[11] = "Nov.";
	$tApplicationMoisDjango[12] = "Dec.";
	
	$tApplicationStatus["success"] = 1;
	$tApplicationStatus["error"] = 2;
	$tApplicationStatus["deleted"] = 3;
	
	$tApplicationStatusR[1] = "success";
	$tApplicationStatusR[2] = "error";
	$tApplicationStatusR[3] = "deleted";
	
	/*
	$vApplicationHost='usaidsenegaldb.db.3798534.hostedresource.com';
	$vApplicationUser='usaidsenegaldb';
	$vApplicationPwd='seneg@L!11';
	$vApplicationDb='usaidsenegaldb';
	*/
	$vColonneParam = "bnsrekcart";
	$vApplicationMaxNumberWait=100;
	$vApplicationNbLigneMax=25;
	$vApplicationBgColor1="#ffffff";
	$vApplicationBgColor2="#f6d5d5";
	$vApplicationBgColorBody="#FFFFFF";
	$vApplicationAfficheHeureLong = "d-m-Y H:i:s";
	$vApplicationSystemHeureLong = "Y-m-d H:i:s";
	$tMoisLong[0] = "Janvier";
	$tMoisLong[1] = "Fevrier";
	$tMoisLong[2] = "Mars";
	$tMoisLong[3] = "Avril";
	$tMoisLong[4] = "Mai";
	$tMoisLong[5] = "Juin";
	$tMoisLong[6] = "Juillet";
	$tMoisLong[7] = "Aout";
	$tMoisLong[8] = "Septembre";
	$tMoisLong[9] = "Octobre";
	$tMoisLong[10] = "Novembre";
	$tMoisLong[11] = "Decembre";
	
	$tDataType[0] = "Texte";
	$tDataType[1] = "Date";
	$tDataType[2] = "Entier";
	$tDataType[3] = "Décimal";
	
	
	$tCouleur[0]= "#0000FF";
	$tCouleur[1]= "#FF0000";
	$tCouleur[2]= "#000080";
	$tCouleur[3]= "#00FF00";
	$tCouleur[4]= "#FFFF00";
	$tCouleur[5]= "#FF00FF";
	$tCouleur[6]= "#9933FF";
	$tCouleur[7]= "#33FF99";
	$tCouleur[8]= "#FFCC99";
	$tCouleur[9]= "#00FFFF";
	$tCouleur[10]= "#CC6633";
	$tCouleur[11]= "#6699CC";
	$tCouleur[12]= "#FFCC00";
	$tCouleur[13]= "#FFEE11";
	$tCouleur[14]= "#FF0077";
	$tCouleur[15]= "#CCEE99";
	$tCouleur[16]= "#CCDD22";
	$tCouleur[17]= "#EEDDAA";
	$tCouleur[18]= "#CC0099";
	$tCouleur[19]= "#EEEEDD";
	$tCouleur[20] = "#33FF22";
	$tCouleur[21]= "#EEFF33";
	$tCouleur[22] = "#CC7711";
	
	$vApplicationCodePays = "221";
	$vApplicationLenLocalNumber = 9;
	
	error_reporting(-1);
	//error_reporting(0); //turn off all error
	set_time_limit(3000);
	ini_set('mysql.connect_timeout', 3000);
	ini_set('default_socket_timeout', 3000);
	
	$vApplicationSizeNomLong="60";
	$vApplicationSizeDate="10";
	$vApplicationSizeDateLong="18";
	$vApplicationSizeChiffre="6";
	$vApplicationSizeChiffreLong="24";
	$vApplicationSizeTel="26";
	$vApplicationColsText="70";
	$vApplicationSeparateurMillier=".";
	
	$vApplicationSepLinExcel="$$";
	$vApplicationSepColExcel="||";
	$vApplicationSeparateurMillier=".";
	
	$vApplicationIvSize = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
	$vApplicationIv = mcrypt_create_iv($vApplicationIvSize, MCRYPT_RAND);
	$vApplicationLakile = "ewe%ritert@";
	
	$vRapam = "parametre";
	
	if(!isset($_SESSION['langue'])){
		$_SESSION['langue'] = "fr";
		$_SESSION['sep_dec'] = ",";
		$_SESSION['sep_millier'] = ".";
	}
	
	function left($str, $length) {
		return substr($str, 0, $length);
	}
	
	function right($str, $length) {
		return substr($str, -$length);
	}
	
	function fctAddColExcel($mot,$add){
		if(right($mot,2)!="$$")
			$mot = $mot . "||";
		$mot = $mot . $add;
		return $mot;
			
	}
	
	function fctReverseDate($vDate)
	{
		$vDate=str_replace("/","-",$vDate);
		$vPos=strpos($vDate,'-');
		$vJour=substr($vDate,0,$vPos);
		$vDate=substr($vDate,$vPos+1,strlen($vDate));
		$vPos=strpos($vDate,'-');
		$vMois=substr($vDate,0,$vPos);
		$vAnnee=substr($vDate,$vPos+1,strlen($vDate));
		return $vAnnee . '-' . $vMois . '-' . $vJour;
	}	
	
	function fctReverseDateHeure($vDate)
	{
		$vDate=trim($vDate);
		$vPos=strpos($vDate,' ');
		$vDate1=substr($vDate,0,$vPos);
		$vDate1=fctReverseDate($vDate1);
		$vHeure=substr($vDate,$vPos+1,strlen($vDate));
		return $vDate1 . ' ' . $vHeure;
	}
	
	function fctListToArray($pList,$pSeparateur)
	{
		$tab=array();
		$pList=trim($pList);
		if (strlen($pList)>0)
		{
			$vList=$pList;
			$pos=strpos($vList,$pSeparateur,0);
			while ($pos>0)
			{
				$v=substr($vList,0,$pos);
				array_push($tab,$v);
				$vList=substr($vList,$pos+1);
				$pos=strpos($vList,$pSeparateur,0);
			}
			array_push($tab,$vList);
		}
		// print_r($tab);
		return $tab;
	}
	
	// **************************
	// Graphism
	function imagelinethick($image, $x1, $y1, $x2, $y2, $color, $thick = 1)
	{
		/* de cette maniËre, ca ne marche bien que pour les lignes orthogonales
		imagesetthickness($image, $thick);
		return imageline($image, $x1, $y1, $x2, $y2, $color);
		*/
		if ($thick == 1) {
			return imageline($image, $x1, $y1, $x2, $y2, $color);
		}
		$t = $thick / 2 - 0.5;
		if ($x1 == $x2 || $y1 == $y2) {
			return imagefilledrectangle($image, round(min($x1, $x2) - $t), round(min($y1, $y2) - $t), round(max($x1, $x2) + $t), round(max($y1, $y2) + $t), $color);
		}
		$k = ($y2 - $y1) / ($x2 - $x1); //y = kx + q
		$a = $t / sqrt(1 + pow($k, 2));
		$points = array(
			round($x1 - (1+$k)*$a), round($y1 + (1-$k)*$a),
			round($x1 - (1-$k)*$a), round($y1 - (1+$k)*$a),
			round($x2 + (1+$k)*$a), round($y2 - (1-$k)*$a),
			round($x2 + (1-$k)*$a), round($y2 + (1+$k)*$a),
		);
		imagefilledpolygon($image, $points, 4, $color);
		return imagepolygon($image, $points, 4, $color);
	}
	// Fin graphism
	// **************************
	
	function fctOffSlash($vValeur){
		//if(get_magic_quotes_gpc()){
			$vValeur = stripslashes($vValeur);
		//}
		return $vValeur;
	}
	function fctOnSlash($vValeur){
		//if(!get_magic_quotes_gpc()){
		$vValeur = stripslashes($vValeur);
		$vValeur = addslashes($vValeur);
		//}
		return $vValeur;
	}
	
	function fctCrypt($vMot){
		global $vApplicationLakile;
		//$vMot = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $vApplicationLakile, $vMot, MCRYPT_MODE_CBC, $vIv);
		$vMot = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($vApplicationLakile), $vMot, MCRYPT_MODE_CBC, md5(md5($vApplicationLakile))));
		return $vMot;
	}
	
	function fctDecrypt($vMot){
		global $vApplicationLakile;
		//echo "<br>" . $vIv;
		//$vMot = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $vApplicationLakile, $vMot, MCRYPT_MODE_CBC, $vIv);
		$vMot = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($vApplicationLakile), base64_decode($vMot), MCRYPT_MODE_CBC, md5(md5($vApplicationLakile))), "\0");
		return $vMot;
	}
	
	function fctAffichePlanR($vIdPlan){
		$vBreadcum = "";
		if($vIdPlan>0){
			$vStrQry = "SELECT plan.id_parent, plan.libelle,plan.nom_fichier FROM plan WHERE plan.id = " . $vIdPlan;
			$vQry = mysql_query($vStrQry);
			$vRow = mysql_fetch_assoc($vQry);
			if(strlen($vBreadcum)>0)
				$vBreadcum = " > " . $vBreadcum;
			$vBreadcum = "<a href=\"#\" onclick=\"document.forms[0].action='" . $vRow['nom_fichier'] . "';document.forms[0].submit();\">" . $vRow['libelle'] . "</a>" . $vBreadcum;
			$vIdParent = $vRow['id_parent'];
			if($vIdParent>0){
				$vBreadcum = fctAffichePlanR($vIdParent)  .  " > " . $vBreadcum;
			}
		}
		
		return $vBreadcum;
	}
	function fctAffichePlan($vIdPlan){
		global $vTitre;
		global $vCon;
		global $database;
		if($vIdPlan>0){
			$vStrQryPlan = "SELECT * FROM plan WHERE id=" . $vIdPlan;
			$vPlan = $vCon->createResultSet($vStrQryPlan,$database);
			$vRowPlan = $vPlan->current();
			$tPlan[0] = fctAffichePlanR($vIdPlan);
			$tPlan[1] = $vRowPlan['titre'];
		}
		else{
			$tPlan[0] = "";
			$tPlan[1] = "";
			if(isset($vTitre)){
				$tPlan[0] = "";
				$tPlan[1] = $vTitre;
			}
		}
		return $tPlan;
	}
	function fctConvertDmsDecimal($vDeg, $vMin, $vSec){
		$vDec = $vDeg + $vMin/60 + $vSec/3600;
		return $vDec;
	}
	function fctConvertDmsDecimalR($vDecimal){
		if($vDecimal>0){
			$vSigne = 1;
		}else{
			$vSigne = -1;
			$vDecimal = abs($vDecimal);
		}
		$tGps[0] = floor($vDecimal);
		$vDecimal = $vDecimal - $tGps[0];
		$vDecimal = $vDecimal*60;
		$tGps[1] = floor($vDecimal);
		$vDecimal = $vDecimal - $tGps[1];
		$vDecimal = $vDecimal*60;
		$tGps[2] = $vDecimal;
		return $tGps;
	}
	
	function fctGetParam($vParam){
		global $vCon;
		global $database;
		$vStrQry = "SELECT * FROM parametre WHERE nom='" . fctOnSlash($vParam) . "'";
		$vQry = $vCon->createResultSet($vStrQry,$database);
		if($vQry->count()>0){
			$vRow = $vQry->current();
			return $vRow['valeur'];
		}
		else
			return "";
	}
	
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
		$vInput = str_replace("\u00e4", "a",$vInput);
		$vInput = str_replace("\u00e5", "a",$vInput);
		$vInput = str_replace("\u00e6", "a",$vInput);
		$vInput = str_replace("\u00e7", "c",$vInput);
		$vInput = str_replace("\u00e8", "e",$vInput);
		$vInput = str_replace("\u00e9", "e",$vInput);
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
        
        
        
        
	
?>