<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_mobile'])){
        header('Location:../admin.php');
    }
require_once('inc/top.php');
include ("PHPExcel/IOFactory.php");
$objPHPExcel = PHPExcel_IOFactory::load('g.xls');
foreach($objPHPExcel->getWorksheetIterator() as $worksheet){
	$highestRow = $worksheet->getHighestRow();
	for($row=2; $row<=$highestRow; $row++){
		$exam_id = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(0,$row)->getValue());
		$text = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(1,$row)->getValue());
		$a = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(2,$row)->getValue());
		$b = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(3,$row)->getValue());
		$c = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(4,$row)->getValue());
		$d = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(5,$row)->getValue());
		$ans = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(6,$row)->getValue());
		
		$sql = "INSERT INTO questions(exam_id,text,opt_a,opt_b,opt_c,opt_d,ans) VALUES('".$exam_id."','".$text."','".$a."','".$b."','".$c."','".$d."','".$ans."')";
		mysqli_query($con,$sql);
	}
}

?>