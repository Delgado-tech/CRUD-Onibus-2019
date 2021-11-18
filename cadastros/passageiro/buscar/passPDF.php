<?php			
    $cpf = filter_input(INPUT_GET,'cpf',FILTER_DEFAULT);
	$name = filter_input(INPUT_GET,'name',FILTER_DEFAULT);
	$nasc = filter_input(INPUT_GET,'nasc',FILTER_DEFAULT);
	$cidade = filter_input(INPUT_GET,'cidade',FILTER_DEFAULT);
	$estado = filter_input(INPUT_GET,'estado',FILTER_DEFAULT);
	$obs = filter_input(INPUT_GET,'obs',FILTER_DEFAULT);


require_once("../../relatorio/fpdf/fpdf.php");
$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
 
$pdf->SetFont('arial','B',18);
$pdf->Cell(0,5,utf8_decode("Relatório"),0,1,'C');
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(50);
 
//cabeçalho da tabela 
$pdf->SetFont('arial','B',16);
$pdf->Cell(560,30,utf8_decode('Informações do Passageiro'),1,1,"C");



$coluna = array(0=> "CPF","Nome","Data de Nascimento","Cidade","Estado", "Observações:");

$info = array(0=> $cpf, $name, $nasc, $cidade, $estado);

$obs = array(
		substr($obs,0,80),
		substr($obs,80,80),
		substr($obs,160,80),
		substr($obs,240,80),
		substr($obs,320,80),
		substr($obs,400,80),
		substr($obs,480,80),
		substr($obs,560,80),
		substr($obs,640,80),
		substr($obs,720,80),
		substr($obs,800,80),
		substr($obs,880,80),
		substr($obs,960,40)
);
//linhas da tabela

for($i= 0; $i < 5;$i++){
	
	$pdf->SetFont('arial','B',12);
    $pdf->Cell(130,20,utf8_decode($coluna["$i"]),1,0,"L");
	
	$pdf->SetFont('arial','',12);
    $pdf->Cell(430,20,utf8_decode($info["$i"]),1,1,"L");

}

$pdf->Ln(20);

//obs
$pdf->SetFont('arial','B',12);
    $pdf->Cell(560,20,utf8_decode($coluna["5"]),0,1,"L");
	$pdf->Cell(0,5,"","B",1,'C');
		$pdf->Ln(10);
	
$i = 0;
 
for($a = 0; $a < 12; $a++){
if($obs["$a"] != ""){
	$pdf->SetFont('arial','',12);
    $pdf->Cell(430,20,utf8_decode($obs["$i"]),0,1,"L");
	 $i++;
}
}

$pdf->Ln(10);
$pdf->Cell(0,5,"","B",1,'C');

$pdf->SetTitle("Relatório de Passageiro",true);

$pdf->Output("I","relPassageiro.pdf");

?>