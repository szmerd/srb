<?php		require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10, 'Rezerwacja miejsc: '.$seatNumber);
$pdf->Cell(60,40, 'Film: '.$tytulF, 0,1,'C');
$pdf_name = 'pdf/bilet_'.$seansDate.$seatNumber.'.pdf';
$pdf_name = str_replace(', ', '-', $pdf_name);
$pdf->Output($pdf_name,'F');

echo '<br><a href="'.$pdf_name.'">Pobierz bilet</a>';

?>