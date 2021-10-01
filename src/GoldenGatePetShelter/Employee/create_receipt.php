<?php
	session_start();
	include("../connect.php");	
	require('../FPDF/fpdf.php');

	$date=date("d/m/Y");
	$adoptID=$_SESSION['adoptID'];
	$aid=$_SESSION['aid'];
	$eid=$_SESSION['id'];

	$result = mysqli_query($db, "SELECT First_Name, Middle_Name, Last_Name From Adopter WHERE ID='".$adoptID."'");
	$row = $result->fetch_assoc();
	$fname = $row["First_Name"];
	$mname = $row["Middle_Name"];
	$lname = $row["Last_Name"];

	$result = mysqli_query($db, "SELECT Name, Adoption_Fee FROM Animals WHERE ID='".$aid."'");
	$row = $result->fetch_assoc();
	$aname = $row["Name"];
	$fee = $row["Adoption_Fee"];

	class PDF extends FPDF
	{
		function Header()
		{
		    $this->Image('../Images/GGPS.png',85,10,50);
		    $this->SetFont('Arial','B',15);
		    $this->Cell(80);
	    	    $this->Ln(41);
		}
		function Footer()
		{
		    $this->SetY(-15);
		    $this->SetFont('Arial','',16);
		    $this->Cell(0,10,'Employee ID: '.$eid.'',0,1);
		}
	}

	$pdf = new PDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',16);
	$pdf->Cell(200,7,'Golden Gate Pet Shelter',0,1,'C');
	$pdf->Cell(200,7,'228 Carpenter St.',0,1,'C');
	$pdf->Cell(200,7,'Bakersfield, CA, 93309',0,1,'C');
	$pdf->Ln(10);
	$pdf->Cell(0,8,'Adopter ID: '.$adoptID.'',0,0);
	$pdf->Cell(0,8,'Date: '.$date.'',0,1,'R');
	$pdf->Cell(0,8,'Animal ID: '.$aid.'',0,1);
	$pdf->Cell(0,8,'Amount: $'.$fee.'',0,1);
	$pdf->Ln(20);
	$pdf->Cell(0,8, 'This is a receipt for '.$fname.' '.$mname.' '.$lname.' for the adoption of '.$aname.'',0,1);
	$pdf->Output();
?>


