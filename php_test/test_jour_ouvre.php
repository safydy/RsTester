<?php
include 'classes/nombre_jour_ouvre.php';
// Exemple : Du 1 au 6 janvier (1 jour férier + week end)
$date_depart = strtotime('2014-01-01');
$date_fin = strtotime('2014-01-06');
$nb_jours_ouvres = fctGetOpenDay($date_depart, $date_fin);
echo 'Il y a '.$nb_jours_ouvres.' jours ouvrés entre le '.date('d/m/Y', $date_depart).' et le '.date('d/m/Y', $date_fin);


$vtest = "((request LIKE 'amb%' OR request LIKE 'bar%' OR request LIKE 'bev%' OR request LIKE 'bot%' OR request LIKE 'fah%' OR request LIKE 'fdp%' OR request LIKE 'ist%' OR request LIKE 'ket%' OR request LIKE 'koh%' OR request LIKE 'loh%' OR request LIKE 'mad%' OR request LIKE 'mal%' OR request LIKE 'piv%' OR request LIKE 'saa%' OR request LIKE 'sak%' OR request LIKE 'sap%' OR request LIKE 'tan%' OR request LIKE 'taz%' OR request LIKE 'tazo%' OR request LIKE 'tib%' OR request LIKE 'vak%' OR request LIKE 'vao%' OR request LIKE 'vih%' OR request LIKE 'zan%'";
echo "<br>".strlen($vtest);

$vQry = "SELECT * FROM sms_res WHERE DATE_FORMAT(date_soumission,'%Y-%m') <= '2013-12' AND id_niveau IN (SELECT id FROM niveau WHERE id_parent IN (SELECT id FROM niveau WHERE id_parent IN (40))) AND sms_res.imported = 1 ORDER BY quest_1";
$test = str_replace("id_niveau IN (SELECT id FROM niveau WHERE id_parent", "id_niveau", $vQry);
echo "<br>".$vQry."<br>".$test;
?>
