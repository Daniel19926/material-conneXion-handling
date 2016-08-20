<?php

include 'PHPexcel/Classes/PHPExcel.php';
include 'PHPexcel/Classes/PHPExcel/IOFactory.php';
$pdo = new PDO('mysql:dbname=u597716772_1;host=mysql.hostinger.se', 'u597716772_1', 'Daniel5%');                                                            
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );  

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();


$result = $pdo->query("SELECT * FROM visitor ORDER BY dt DESC");
// Setting Excel file properties
// Change the properties detail as per your requirement
$objPHPExcel->getProperties()->setCreator("Daniel Rosmark");
$objPHPExcel->getProperties()->setLastModifiedBy("Daniel Rosmark,2016-04-01");
$objPHPExcel->getProperties()->setTitle("Student, HIS");
$objPHPExcel->getProperties()->setSubject("");
$objPHPExcel->getProperties()->setDescription("Get library visitors at IDC");

// Select current sheet
$objPHPExcel->setActiveSheetIndex(0);
// Add some data
$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Name');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Number of visitors');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Organisation');
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Title');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Email');
$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Date');
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->setAutoFilter('A1:F1');
$objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

//column number, which we will be incrementing
$colnum=1;

foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {

    $colnum++;
    $objPHPExcel->getActiveSheet()->SetCellValue('A'."$colnum", $row["vname"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('B'."$colnum", $row["visitors"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'."$colnum", $row["organisation"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('D'."$colnum", $row["title"]);
	$objPHPExcel->getActiveSheet()->SetCellValue('E'."$colnum", $row["email"]);
	$objPHPExcel->getActiveSheet()->SetCellValue('F'."$colnum", $row["dt"]);
}

// set the title of the Sheet
$objPHPExcel->getActiveSheet()->setTitle('Visitors in library');
 

//from documentation set header
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Material handling-Visitor.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

//excel 2007 format

//$objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
//$objWriter ->save('php://output');

exit;

?>






