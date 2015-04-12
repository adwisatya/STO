<?php // content="text/plain; charset=utf-8"
require_once('../connect/connect.php');
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_line.php');

$datay0 = array(21.96,21.96,21.96,21.96,21.96,21.96,21.96,21.96,22.31,24.84,28.39,32.12,35.74,39.95,44.60,49.83,57.32,63.88,70.75,77.89,85.44,93.30,97.77,100.00);
/*
$datay3 = array(21.96,21.96,21.96,21.96,21.96,21.96,21.96,21.96,22.31,24.84,28.39,32.12,35.74,39.95,44.60,49.83,57.32,63.88,70.75,77.89,85.44,93.30,97.77,100.00);
$datay1 = array(NULL,NULL,NULL,NULL,NULL,NULL,NULL,52.3690,52.3690,52.3790,52.5290,53.7570,55.8750,58.0120,60.9430,63.9490,66.9680,70.0940,73.1080,76.4590,80.5120,84.5970,88.6860,92.5660,96.0440,99.1930,100.0000 );
$datay2 = array(17.10,17.10,17.10,17.10,17.14,17.19,17.23,17.27,18.86,21.06,23.53,26.57,29.74,33.03,40.80,48.04,55.51,62.15,68.97,76.66,84.62,92.19,98.07,99.97,100.00,100.00);
*/
$query = mysql_query("SELECT `m66`,`m67`,`m68` FROM `kurva_s`");
$datam66 = array(0,0,0,0,0,0,0);
$datam67 = array(0,0,0,0,0,0,0);
$datam68= array(0,0,0,0,0,0,0);
while($data = mysql_fetch_array($query)){
	$minggu66 = $data['m66'];
	$minggu67 = $data['m67'];
	$minggu68 = $data['m68'];
	$mingguToArray66 = explode(",",$minggu66);
	$mingguToArray67 = explode(",",$minggu67);
	$mingguToArray68 = explode(",",$minggu68);
	$i = 0;
	while($i<count($mingguToArray66)){
		$datam66[$i] += $mingguToArray66[$i];
		$datam67[$i] += $mingguToArray67[$i];
		$datam68[$i] += $mingguToArray68[$i];
		$i++;
	}
}
$aktual66 = $datam66[0] +$datam66[1]+$datam66[2]+$datam66[3]+$datam66[4]+$datam66[5]+$datam66[6];
$aktual67 = 23;$datam67[0] +$datam67[1]+$datam67[2]+$datam67[3]+$datam67[4]+$datam67[5]+$datam67[6];
$aktual68 = 24;$datam68[0] +$datam68[1]+$datam68[2]+$datam68[3]+$datam68[4]+$datam68[5]+$datam68[6];


//$aktual = array(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$aktual66,$aktual67,$aktual68,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
$aktual = array(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,22.00,$aktual67,$aktual68);
$label = array('M58','M59','M60','M61','M62','M63','M64','M65','M66','M67','M68','M69','M70','M71','M72','M73','M74','M75','M76','M77','M78','M79','M80','M81');
// Setup the graph
$graph = new Graph(800,650);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Kurva S Group 3');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($label);
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p0 = new LinePlot($datay0);
$graph->Add($p0);
$p0->SetColor("#6495ED");
$p0->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p0->mark->SetColor('#55bbdd');
$p0->mark->SetFillColor('#55bbdd');
$p0->SetLegend('Rencana');
$graph->legend->SetFrameWeight(1);
/*
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Group 1');
$graph->legend->SetFrameWeight(1);

$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#200000");
$p2->SetLegend('Group 2');
$graph->legend->SetFrameWeight(1);

$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#1400ED");
$p3->SetLegend('Group 3');
$graph->legend->SetFrameWeight(1);
*/
$p4 = new LinePlot($aktual);
$graph->Add($p4);
$p4->SetColor("#10000");
$p4->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p4->mark->SetColor('#55bbdd');
$p4->mark->SetFillColor('#55bbdd');
$p4->SetLegend('Aktual');
$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>


