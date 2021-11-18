<?php			
	$rota = filter_input(INPUT_GET, 'rota', FILTER_DEFAULT);
	$numAssento = filter_input(INPUT_GET, 'numAssento', FILTER_DEFAULT);
	$nome = filter_input(INPUT_GET, 'nome', FILTER_DEFAULT);
	$dataviagem = filter_input(INPUT_GET, 'dataviagem', FILTER_DEFAULT);
	$numbag = filter_input(INPUT_GET, 'numbag', FILTER_DEFAULT);
	$autoVgm = filter_input(INPUT_GET, 'autoVgm', FILTER_DEFAULT);
	$placa = filter_input(INPUT_GET, 'placa', FILTER_DEFAULT);


require_once("../../../cadastros/relatorio/fpdf/fpdf.php");
$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
 
$pdf->SetFont('arial','B',18);
$pdf->Cell(0,5,utf8_decode("Relatório"),0,1,'C');
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(50);
 
//cabeçalho da tabela 
$pdf->SetFont('arial','B',16);
$pdf->Cell(560,30,utf8_decode('Informações da passagem'),1,1,"C");



$coluna = array(0=> "Nomo do Passageiro [CPF]","Número do Assento","Qtde. Bagagem","Rota",
"Data da Viagem", "Placa","Autorizado para Viagem");

$info = array(0=> $nome, $numAssento, $numbag, $rota, $dataviagem, $placa, $autoVgm);


//linhas da tabela

for($i= 0; $i < 7;$i++){
	
	$pdf->SetFont('arial','B',12);
    $pdf->Cell(160,20,utf8_decode($coluna["$i"]),1,0,"L");
	
	$pdf->SetFont('arial','',12);
    $pdf->Cell(400,20,utf8_decode($info["$i"]),1,1,"L");

}

$pdf->Ln(50);
$pdf->Cell(0,5,"","B",1,'C');


$pdf->Output("I","relPassagem.pdf");

?>