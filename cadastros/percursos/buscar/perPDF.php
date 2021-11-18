<?php	

$ROTA = filter_input(INPUT_GET, 'rota', FILTER_DEFAULT);		
$PER_TEMP = filter_input(INPUT_GET, 'pertemp', FILTER_DEFAULT);
$PASS_VALOR = filter_input(INPUT_GET, 'passvalor', FILTER_DEFAULT);
$PASS_BAG = filter_input(INPUT_GET, 'passbag', FILTER_DEFAULT);
$QTDE_MOT = filter_input(INPUT_GET, 'qtdemot', FILTER_DEFAULT);
$TROCA_MOT = filter_input(INPUT_GET, 'trocarMot', FILTER_DEFAULT);
$OPEN_VENDAS = filter_input(INPUT_GET, 'openvenda', FILTER_DEFAULT);	

require_once("../../relatorio/fpdf/fpdf.php");
$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
 
$pdf->SetFont('arial','B',18);
$pdf->Cell(0,5,utf8_decode("Relatório"),0,1,'C');
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(50);
 
//cabeçalho da tabela 
$pdf->SetFont('arial','B',16);
$pdf->Cell(560,30,utf8_decode('Informações do Percurso'),1,1,"C");



$coluna = array(0=> "Rota","Duração Aproximada","Preço da Passagem","Preço por Bagagem","Qtde. Motoristas","Trocar Motorista","Open Vendas");

$info = array(0=> $ROTA, $PER_TEMP, $PASS_VALOR, $PASS_BAG, $QTDE_MOT, $TROCA_MOT, $OPEN_VENDAS);

//linhas da tabela

for($i= 0; $i < 7;$i++){
	
	$pdf->SetFont('arial','B',12);
    $pdf->Cell(130,20,utf8_decode($coluna["$i"]),1,0,"L");
	
	if($info["$i"] == "[Grátis]"){$pdf->SetFont('arial','I',11);}else{
	$pdf->SetFont('arial','',12);}
    $pdf->Cell(430,20,utf8_decode($info["$i"]),1,1,"L");

}

$pdf->Ln(50);
$pdf->Cell(0,5,"","B",1,'C');

$pdf->SetTitle("Relatório de Percursos",true);

$pdf->Output("I","relRota.pdf");

?>

