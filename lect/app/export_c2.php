<?php
session_start();
require('mysql_table.php');
require('_opener_db.php');
//require('sessions-listed.php');

//$ = $_GET['id'];
$id2 = $_GET['user'];

class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	//var $b=$id;
	$this->SetFont('Arial','',14);
	$this->Cell(200,13,"KAMPALA INTERNATIONAL UNIVERSITY",0,1,'C');
	$this->Cell(200,13,"Box 20000, Kansanga,Kampala",0,1,'C');
	$this->Cell(200,13,"E-mail: admin@kiu.ac.ug",0,1,'C');
	$this->Cell(200,13,"Fax: +256-414-501974",0,1,'C');
	
	// $this->Image('watermarker.png',100,15,250);
	$this->Image('images/logo.jpg',200,15,80);
	$this->Ln(10);
	$this->Ln(10);
	$this->Ln(10);
	//Ensure table header is output
	//parent::Header();
}
}

$pdf=new PDF('L');
$pdf->AddPage();
$pdf->Cell(200, 13, "Generated information on Complainsfor {$user} ". date('F j, Y'), 0, 1);
//First table: put all columns automatically

//folder information
$pdf->Cell(100, 15, "Student Details", 0, 2);
$pdf->Table("select regno,course,year,sem from complain where lecturer='$id2'"); 

//client information
$pdf->Cell(100, 15, "Complaint Details", 0, 2);
$pdf->Table("select cunit,lecturer,room,xmonth,xyear,details,markscat from complain where lecturer='$id2'");


$pdf->Ln(10);

$pdf->Cell(50, 5, "This information has been auto-generated from the database", 0,2);
$pdf->Cell(50, 5, " consult -{$user}- to verify the validity of this information", 0,2);
$pdf->Cell(50, 5, " Thanks for using this service", 0, 2);

/* $pdf->AddPage();
//folder  updates go here
$pdf->Cell(200, 13, "Response to the above Complain ". date('F j, Y'), 0, 1);
$pdf->Cell(100, 15, "Response received", 0, 2);
$pdf->Table("select * from response where cid='$id2'"); */
$pdf->Output();
?>


