<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
date_default_timezone_set('Europe/London');


/* user variabel */
$creator = "Aryya Dwisatya W";
$dir = "../Data/";
$file = "dummy.xlsx";
/** Include PHPExcel_IOFactory */
require_once '../PHPExcel/Classes/PHPExcel/IOFactory.php';
$callStartTime = microtime(true);
$objPHPExcel = PHPExcel_IOFactory::load("$dir$file");
$objPHPExcel->getProperties()->setCreator($creator)
							 ->setLastModifiedBy($creator)
							 ->setTitle("STO")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
$objPHPExcel->getActiveSheet()->setCellValue('B3', '30')
                              ->setCellValue('C3', '20');
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;
/* Write to file */
//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter->save(str_replace('.php', '.xlsx', $dir.$file));
echo $objPHPExcel->getActiveSheet()->getCell('B3')->getValue();
echo "sdasd";
echo $objPHPExcel->getActiveSheet()->getCell('J4')->getCalculatedValue();
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'HTML');
$objWriter->save('php://output');
?>
