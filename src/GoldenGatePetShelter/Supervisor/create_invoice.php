<?php
	session_start();
	include("../connect.php");	
	require('../FPDF/fpdf.php');

	$date=date("d/m/Y");

	$sdate = $_SESSION['sdate'];
	$edate = $_SESSION['edate'];
	
	$sdate = $sdate."-01-01";
	$edate = $edate."-01-01";

	$time = "00:00:00";

	$sdate = $sdate." ".$time;
	$edate = $edate." ".$time;

	$sdate = strtotime("$sdate");
	$sdate = date('Y-m-d H:i:s', $sdate);
	
	$edate = strtotime("$edate");
	$edate = date('Y-m-d H:i:s', $edate);
	 
	$result = mysqli_query($db, "CALL Yearly_Fees($sdate,$edate);");
	if(mysql_num_rows($result)==0)
	{
	    $total = "NULL";
	} else {
		$row = $result->fetch_assoc();
		$total = $row["Sum(Amount)"];
	}

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
	$pdf->Cell(0,8,'Start Date: '.$sdate.'',0,0);
	$pdf->Cell(0,8,'Date: '.$date.'',0,1,'R');
	$pdf->Cell(0,8,'End Date: '.$edate.'',0,1);
	$pdf->Cell(0,8,'Total: $'.$total.'',0,1);
	$pdf->Ln(20);
	$pdf->Cell(0,8,'The total amount of money earned through the dates:',0,1);
        $pdf->Cell(0,8,''.$sdate.' and '.$edate.'',0,1);
        $pdf->Cell(0,8,'is $'.$total.'',0,1);
	$pdf->Output();
?>


