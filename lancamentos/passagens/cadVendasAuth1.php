<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "ONIBUS";
$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());

mysqli_select_db($conexao,$banco) or die(mysqli_error());
mysqli_set_charset($conexao,"utf8");
mysqli_set_charset($conexao,'utf8');

?>
<html>
<head>
<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<title>Surreal Viagens</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<?php

if(isset($_POST['ViagemSel'])){
	
	$viagem = $_POST['ViagemSel'];
	
	$datePos = strrpos($viagem,"--");
	
	$dataviagem = substr($viagem,($datePos+2),10);
	$rotaviagem = substr($viagem,0,($datePos-1));
	
	
	}else{$viagem = ""; $dataviagem = "";}// If viagem setada;

if(isset($_POST['cpfSel'])){$cpf = $_POST['cpfSel'];}
else{$cpf = "";}// If Motorista setada;

//---bagagem-------------------------------------------------------
include '../../cadastros/removeSpecialChar.php';

$numbag = $_POST['num_bag'];
$numbag = str_replace($arrFrom2,"",(preg_replace($arrFrom,"",$numbag)));
if($numbag == ""){$numbag = 0;}

//-----------------------------------------------------------------

if(isset($_POST['autovgm'])){$vgmAuto = "S";}else{$vgmAuto = "N";}

if(isset($_POST['PlacaSel'])){$placa = $_POST['PlacaSel'];}else{$placa = "";}


//---------Formatação Data

if(isset($_POST['ViagemSel'])){
$date = date_create_from_format('d/m/Y', $dataviagem); //cria um formato de data para variável $
$mysqliDateFormat = date_format($date, 'Y-m-d'); //formata data em padrão US a qual o mysli lê;
$mysqliDateFormat = $mysqliDateFormat." 00:00:00";
}else{$mysqliDateFormat = "";}

if($viagem == "" || $cpf == "" || $placa == ""){
	echo "
		<h2 class='center-align'>Você deixou algum campo obrigatório Vazio!</h2>
		<h3 class='center-align'>Aguarde alguns instantes e preencha-o...</h3>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";

	
}else if($numbag > 12){
	echo "
		<h1 class='center-align'>Número de Bagagem Muito Alto!</h1>
		<h3 class='center-align'><b class='grey-text text-darken-3'>[Limite = 12]</b></h3>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
		
}else{
	
	include 'venda_assento.php';
	
	echo $rotaviagem."<br>";
}

?>



<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>

	
</body>
</html>
<?php
/* ------- DEBUG -------
echo $rotaviagem."<br>";
echo $cpf."<br>";
echo $mysqliDateFormat."<br>";
echo $numbag."<br>";
echo $vgmAuto."<br>";

echo $dataviagem."<br>";
echo $datePos."<br>";
echo $viagem."<br>";
   ------- DEBUG -------
*/
?>