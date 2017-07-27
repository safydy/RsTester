<?php
include ("./jpgraph/jpgraph.php");
include ("./jpgraph/jpgraph_line.php");
require_once ('jpgraph/jpgraph_bar.php');

$datay =array(2,3,8,19,7,17,6,22);
$data1y=array(12,8,19,3,10,5);
$data2y=array(8,2,11,7,14,4);
$axisX = array('jan','feb','mar','apr','mai','jun','jul','aug');

// Create the graph. 
$graph = new Graph(400,280);

$graph->SetScale("intlin"); // X and Y axis
$graph->SetY2Scale("lin"); // Y2 axis

$graph->xaxis->title->Set('Mois');



//Y plot
$lplot = new LinePlot($datay);
$graph->yaxis->title->Set('data 1');
$graph->Add($lplot);


// Y2 plot
$b1plot = new BarPlot($data1y);
$b1plot->SetFillColor("orange");
$b2plot = new BarPlot($data2y);
$b2plot->SetFillColor("blue");
 
// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1plot,$b2plot));
$graph->y2axis->title->Set('data 2');
$graph->AddY2($gbplot);
 
$graph->SetY2OrderBack(false);

$filename = './images/my_image2.jpg';
$graph->Stroke($filename);


?>
<img src='<?php echo $filename; ?>'>
