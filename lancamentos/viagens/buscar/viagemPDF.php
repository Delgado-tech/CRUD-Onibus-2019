<?php			
$rota = filter_input(INPUT_GET, 'rota', FILTER_DEFAULT);	
$mot = filter_input(INPUT_GET, 'mot', FILTER_DEFAULT);
$placa = filter_input(INPUT_GET, 'placa', FILTER_DEFAULT);
$dataviagem = filter_input(INPUT_GET, 'dataviagem', FILTER_DEFAULT);

require_once("../../../cadastros/relatorio/fpdf/fpdf.php");
$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
 
$pdf->SetFont('arial','B',18);
$pdf->Cell(0,5,utf8_decode("Relatório"),0,1,'C');
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(50);
 
//cabeçalho da tabela 
$pdf->SetFont('arial','B',16);
$pdf->Cell(560,30,utf8_decode('Informações da Viagem'),1,1,"C");



$coluna = array(0=> "Rota","Motorista","Placa do Ônibus","Data da Viagem");

$info = array(0=> $rota, $mot, $placa, $dataviagem);

//linhas da tabela

for($i= 0; $i < 4;$i++){
	
	$pdf->SetFont('arial','B',12);
    $pdf->Cell(130,20,utf8_decode($coluna["$i"]),1,0,"L");
	
	$pdf->SetFont('arial','',12);
    $pdf->Cell(430,20,utf8_decode($info["$i"]),1,1,"L");

}

$pdf->Ln(50);
$pdf->Cell(0,5,"","B",1,'C');

$pdf->SetTitle("Relatório da Viagem",true);

$pdf->Output("I","relViagem.pdf");

?>

