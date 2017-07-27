<?php
$vText = "1.5.3";
$v = stripos($vText, "1.", false);
echo $v != NULL? "ok $v":"nok";

echo "<br>'".substr($vText, 0, strlen($vText)-2)."'";
echo "'".$v."'<br>";
echo ($v===0)?"v === 0":"v !== 0"."<br>";
?>
