<?php 
ob_start();
session_start();

require_once('inc/top.php');
include ("PHPExcel/IOFactory.php");
$objPHPExcel = PHPExcel_IOFactory::load('batchlist.xls');
foreach($objPHPExcel->getWorksheetIterator() as $worksheet){
	$highestRow = $worksheet->getHighestRow();
	for($row=2; $row<=$highestRow; $row++){
		$student_id = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(0,$row)->getValue());
		$batchId = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(2,$row)->getValue());
		$classId = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(3,$row)->getValue());
		$date = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(4,$row)->getValue());
		$subject = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(5,$row)->getValue());
		$tmarks = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(6,$row)->getValue());
		$omarks = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(6,$row)->getValue());
		
		$sql = "INSERT INTO result(studentId,batchId,classId,date,subject,totalMarks,obtainmark) VALUES('".$student_id."','".$batchId."','".$classId."','".$date."','".$subject."','".$tmarks."','".$omarks."')";
		mysqli_query($con,$sql);
	}
}

?>