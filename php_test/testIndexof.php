<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8;charset=utf-8" />
        <title>Test</title>
        
    </head>
    <body>
        
        <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$vText = "1.5.3";
$v = stripos($vText, "1.", false);
echo $v != NULL ? "ok $v" : "nok";

echo "<br>'" . substr($vText, 0, strlen($vText) - 2) . "'";
echo "'" . $v . "'<br>";
echo ($v === 0) ? "v === 0" : "v !== 0" . "<br>";


echo "#################### <br>";
$vMyText = "[month] + [month - 1] / [month  -2] * 3 - [month - 1]";
$vValueMonth = 2;
$vValueMonthN1 = 3;
$vValueMonthN2 = 1;
$partern = "[month";
$vCleanText2 = removeSpaces($vMyText);
echo "c2:".$vCleanText2."<br>";
getPostionList($vMyText, $partern);
$tPos = getPostionList($vCleanText2, $partern);
var_dump($tPos);
$tAll = extractAllPositionsAndIndices($tPos, $vCleanText2);
var_dump($tAll);
$final = replaceValue($vCleanText2, $tAll);
echo $final;

function removeSpaces($vMyText){
    return preg_replace('/[^a-zA-Z0-9-_\.\[\]\/\+\-\*\%]/','', $vMyText);
}

function getPostionList($text, $needle) {
    $lastPos = 0;
    $positions = array();
    while (($lastPos = strpos($text, $needle, $lastPos)) !== false) {
        $positions[] = $lastPos;
        $lastPos = $lastPos + strlen($needle);
    }
    echo $text.": <br>";
    foreach ($positions as $value) {
        echo $value . "<br />";
    }
    return $positions;
}

function extractAllPositionsAndIndices($positions, $text, $closeNeedle="]"){
    $tAllPositions = array();
    foreach ($positions as $value) {
        $closePosition = strpos($text, $closeNeedle, $value);
        $indice = substr($text, $closePosition - 1, 1);
        $indice = is_numeric($indice) ? $indice : 0;
        $tAllPositions[] = array('openAt'=>$value, 'closeAt'=>$closePosition, 'indice'=>$indice);
        if(is_numeric($indice)){
            echo $indice . "<br />";
        }else{
            echo "0<br />";
        }
    }
    return $tAllPositions;
}

function getMonth($indice){
    $int_indice = $indice * 1;
    if($int_indice != 0){
        if($indice == 1){
            return 1;
        }elseif($indice == 2){
            return 2;
        }
    }
    return 0;
}

function replaceValue($text, $allPositions){
    $result = $text;
    foreach ($allPositions as $tPos) {
        $str_to_replace = substr($text, $tPos['openAt'], $tPos['closeAt'] - $tPos['openAt'] + 1);
        $value = getMonth($tPos['indice']);
        echo "<br> replace : ".$str_to_replace. " TO ".$value;
        $result = str_replace($str_to_replace, $value, $result);
    }
    return $result;
}
?>
    </body>
</html>

