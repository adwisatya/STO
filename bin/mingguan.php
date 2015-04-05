<?php // content="text/plain; charset=utf-8"
require_once("../connect/connect.php");
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_line.php');


$query = mysql_query("SELECT `".$_GET['minggu']."` FROM `kurva_s` WHERE `gid`=".$_GET['gid'].";");
$dataX = array(0,0,0,0,0,0,0);
while($data = mysql_fetch_array($query)){
	$minggu = $data[$_GET['minggu']];
	$mingguToArray = explode(",",$minggu);
	$i = 0;
	while($i<count($mingguToArray)){
		$dataX[$i] += $mingguToArray[$i];
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
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Kurva S '.$_GET['minggu']." Group ".$_GET['gid']);
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
$p1 = new LinePlot($dataX);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Overall');
$graph->legend->SetFrameWeight(1);
// Output line
$graph->Stroke();

?>


