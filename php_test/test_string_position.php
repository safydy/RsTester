<?php
	$str = "fdqfijo,eare";
	echo "'".strpos($str,",")."'<br>";
	echo "'".strpos($str,"A")."'<br>";
	echo "'".strpos($str,";")."'<br>";
	if(strpos($str,","))
		echo "ok";
	else
		echo "nok";
?>