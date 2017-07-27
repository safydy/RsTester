<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'classes/Matrix.php';
require_once 'classes/TableModel.php';

define("SAFIDY", "Rs");
echo SAFIDY;
$Matrice1  = new Matrix(3,3);
$Matrice1->setValue(1,1,'a');
$Matrice1->setValue(1,2,'b');
$Matrice1->setValue(2,1,'er efd');
$Matrice1->setValue(2,2,'d&eacute;pression');

$Matrice2 = new TableModel(array('a','b'),array('c','d'));
$Matrice2->setValue('a', 'c', 'nom');
$Matrice2->setValue('a', 'd', 'Safidy');
$Matrice2->setValue('b', 'c', 'age');
$Matrice2->setValue('b', 'd', 18);
$Matrice2->setRowName("num");
$Matrice2->addRowKey("x y");
$Matrice2->setValue('x y', 'd', "Fehezan-teny malagasy");

echo "row matrice 2 :".print_r(array_keys($Matrice2->getRowKeys()));
print "<br> : matrice 2 : ".print_r($Matrice2) ;
?>
<html>
    <head>
        
    </head>
    
    <body>
        <?php echo $Matrice1->toTable(); ?>
        <?php echo "<br>".$Matrice2->toTable(""); ?>
    </body>
</html>