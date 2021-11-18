<?php			
$username = filter_input(INPUT_GET, 'username', FILTER_DEFAULT);	
$userphone = filter_input(INPUT_GET, 'userphone', FILTER_DEFAULT);
$userid = filter_input(INPUT_GET, 'userid', FILTER_DEFAULT);
$userpass = filter_input(INPUT_GET, 'userpass', FILTER_DEFAULT);
$userrank = filter_input(INPUT_GET, 'userrank', FILTER_DEFAULT);	


require_once("../../relatorio/fpdf/fpdf.php");
$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
 
$pdf->SetFont('arial','B',18);
$pdf->Cell(0,5,utf8_decode("Relatório"),0,1,'C');
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(50);
 
//cabeçalho da tabela 
$pdf->SetFont('arial','B',16);
$pdf->Cell(560,30,utf8_decode('Informações do Usuário'),1,1,"C");



$coluna = array(0=> "ID Usuário","Nome","Telefone","Cargo","Senha");

$info = array(0=> $userid, $username, $userphone, $userrank, $userpass);

//linhas da tabela

for($i= 0; $i < 4;$i++){
	
	$pdf->SetFont('arial','B',12);
    $pdf->Cell(130,20,utf8_decode($coluna["$i"]),1,0,"L");
	
	$pdf->SetFont('arial','',12);
    $pdf->Cell(430,20,utf8_decode($info["$i"]),1,1,"L");

}

$pdf->Ln(50);
$pdf->Cell(0,5,"","B",1,'C');

$pdf->SetTitle("Relatório de Usuário",true);

$pdf->Output("I","relUser.pdf");

?>

