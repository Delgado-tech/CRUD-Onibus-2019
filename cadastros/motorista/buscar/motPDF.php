<?php			
$id = filter_input(INPUT_GET, 'Id', FILTER_DEFAULT);
$name = filter_input(INPUT_GET, 'name', FILTER_DEFAULT);
$nasc = filter_input(INPUT_GET, 'nasc', FILTER_DEFAULT);
$cnhvenc = filter_input(INPUT_GET, 'cnhvenc', FILTER_DEFAULT);
$cnhtipo = filter_input(INPUT_GET, 'cnhtipo', FILTER_DEFAULT);
$fone = filter_input(INPUT_GET, 'fone', FILTER_DEFAULT);
$cidade = filter_input(INPUT_GET, 'cidade', FILTER_DEFAULT);
$estado = filter_input(INPUT_GET, 'estado', FILTER_DEFAULT);
$cep = filter_input(INPUT_GET, 'cep', FILTER_DEFAULT);
$rua = filter_input(INPUT_GET, 'rua', FILTER_DEFAULT);
$bairro = filter_input(INPUT_GET, 'bairro', FILTER_DEFAULT);
$numcasa = filter_input(INPUT_GET, 'numcasa', FILTER_DEFAULT);


require_once("../../relatorio/fpdf/fpdf.php");
$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
 
$pdf->SetFont('arial','B',18);
$pdf->Cell(0,5,utf8_decode("Relatório"),0,1,'C');
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(50);
 
//cabeçalho da tabela 
$pdf->SetFont('arial','B',16);
$pdf->Cell(560,30,utf8_decode('Informações do Motorista'),1,1,"C");

$obs = "";

$coluna = array(0=> "ID do Motorista","Nome","Data de Nascimento","Vencimento do CNH","Tipo do CNH", "Telefone", "[Endereço]");

$info = array(0=> $id, $name, $nasc, $cnhvenc, $cnhtipo, $fone, $obs);

$obs = array(
		"Rua: ",
		substr($rua,0,70),
		"Número: ",
		substr($numcasa,0,70),
		"Bairro: ",
		substr($bairro,0,70),
		"Cidade: ",
		substr($cidade,0,70),
		"Estado: ",
		substr($estado,0,70),
		"CEP: ".substr($cep,0,70)
);
//linhas da tabela

for($i= 0; $i < 6;$i++){
	
	$pdf->SetFont('arial','B',12);
    $pdf->Cell(130,20,utf8_decode($coluna["$i"]),1,0,"L");
	
	$pdf->SetFont('arial','',12);
    $pdf->Cell(430,20,utf8_decode($info["$i"]),1,1,"L");

}

$pdf->Ln(20);

//obs
$pdf->SetFont('arial','B',12);
    $pdf->Cell(560,20,utf8_decode($coluna["6"]),0,1,"L");
	$pdf->Cell(0,5,"","B",1,'C');
		$pdf->Ln(10);
	

 $a = 0;
 $b = -1;
 
for($i = 0; $i < 5; $i++){
	
	$b+=2;
	
	$pdf->SetFont('arial','',12);
    $pdf->Cell(55,20,utf8_decode($obs["$a"]),0,0,"C");
	
	$pdf->SetFont('arial','',12);
    $pdf->Cell(430,20,utf8_decode($obs["$b"]),0,1,"L");
	
	
	$a+=2;
	

}

$pdf->Ln(10);
$pdf->Cell(0,5,"","B",1,'C');

$pdf->SetTitle("Relatório de Motorista",true);

$pdf->Output("I","relMotorista.pdf");

?>