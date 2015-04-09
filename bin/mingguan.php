<?php // content="text/plain; charset=utf-8"
require_once("../connect/connect.php");
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_line.php');


$query = mysql_query("SELECT `m66`,`m67`,`m68` FROM `kurva_s` WHERE `gid`=".$_GET['gid'].";");
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

//print_r($dataX);
$label = array("Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
// Setup the graph

$graph = new Graph(800,650);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->title->Set('Kurva S  Group '.$_GET['gid']);
$graph->img->SetAntiAliasing(false);
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($label);
$graph->xgrid->SetColor('#E3E3E3');
//$graph->SetBackgroundImage("tiger_bkg.png",BGIMG_FILLPLOT);

// Create the first line
$p1 = new LinePlot($datam66);
$graph->Add($p1);
$p1->SetColor("#0000");
$p1->SetLegend('Minggu 66');
$graph->legend->SetFrameWeight(1);

$p2 = new LinePlot($datam67);
$graph->Add($p2);
$p2->SetColor("#649000");
$p2->SetLegend('Minggu 67');
$graph->legend->SetFrameWeight(1);

$p3 = new LinePlot($datam68);
$graph->Add($p3);
$p3->SetColor("#2490ED");
$p3->SetLegend('Minggu 68');
$graph->legend->SetFrameWeight(1);
// Output line
$graph->Stroke();

?>


