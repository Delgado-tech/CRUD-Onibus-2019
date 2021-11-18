<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "ONIBUS";
$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());

mysqli_select_db($conexao,$banco) or die(mysqli_error());
mysqli_set_charset($conexao,"utf8");
?>

<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<title>Surreal Viagens</title>

		</head>
	<body>
<?php
include "../../../removeSpecialChar.php";

$rota2 = $_POST['rota2'];

$saidaPer = $_POST['saidaPer'];
$saidaPer2 = str_replace("-","",$saidaPer);

$destinoPer = $_POST['destinoPer'];
$destinoPer2 = str_replace("-","",$destinoPer);


$rota = $saidaPer2." - ".$destinoPer2;

$tempoPer = $_POST['tempoPer'];

$custoPer = $_POST['custoPer'];
	$custoPer = str_replace(",",".",(str_replace(".","",$custoPer)));
$custoPerBag = $_POST['custoBagPer'];
	$custoPerBag = str_replace(",",".",(str_replace(".","",$custoPerBag)));
	
$motqntd = $_POST['motqntd'];
$motqntd = preg_replace($arrFrom,"",(str_replace($arrFrom2,"",$motqntd)));

if($motqntd > 1){$trocaMot = "S";}else{$trocaMot = "N";}
if($motqntd == 0 || $motqntd == ""){$motqntd = 1;}

if(isset($_POST['openvendas'])){$openvendas = "S";}else{$openvendas = "N";}

$row = 0;

if($rota != $rota2)
{
$noRepeat = mysqli_query($conexao,"SELECT * FROM CAD_PERCURSO WHERE ROTA = '$rota'");
$row = mysqli_num_rows($noRepeat);
}

if($row > 0){
	echo "
		<h1 class='center-align'>Percurso já registrado!</h1>
		<h3 class='center-align'>aguarde alguns instantes e altere-o...</h3>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
		
}else if($destinoPer == "" || $saidaPer == "" || $tempoPer == "" || $motqntd == "" ){
	echo "
		<h1 class='center-align'>Você deixou algum campo vazio!</h1>
		<h3 class='center-align'>aguarde alguns instantes e preencha-o...</h3>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
		
}else if(strlen($motqntd) > 2 || strlen($tempoPer) > 10){
		echo "
		<h1 class='center-align'>Você utrapassou a quantidade <br>de caracteres de algum campo!</h1>
		<h3 class='center-align'>aguarde alguns instantes e altere-o...</h3>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
		
}else if($motqntd > 12){
	echo "
		<h2 class='center-align'>Quantidade de Motoristas Muito Alta!</h2>
		<h3 class='center-align'><b>[Limite = 12]</b></h3>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
	
}else{
	
	mysqli_query($conexao,"UPDATE CAD_PERCURSO SET 
	ROTA='$rota',PER_TEMP='$tempoPer',TROCAR_MOT='$trocaMot',QTDE_MOT='$motqntd',
	OPEN_VENDAS='$openvendas',PASS_VALOR='$custoPer',PASS_BAG='$custoPerBag' 
	WHERE ROTA = '$rota2'"  ) or die(mysqli_error($conexao));
	
	mysqli_query($conexao,"UPDATE LCMT_VIAGEM SET 
	ROTA2='$rota' WHERE ROTA2 = '$rota2'") or die(mysqli_error($conexao));
	
	mysqli_query($conexao,"UPDATE LCMT_VIAGEM_PASS SET 
	ROTA3='$rota' WHERE ROTA3 = '$rota2'") or die(mysqli_error($conexao));
	
	
	
	
		
	
		
		echo "<div class='container'>
		<h1 class='center-align'>Atualizando Percurso! Aguarde...</h1>
		";
		echo "<div class='progress'>
			<div class='indeterminate'></div>
			</div></div>
			</div>
			";
		header("refresh:3;url='editarPer.php'");
		
}


?>

<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
</body>
</html>

<!--
Debug
echo $saidaPer."<br>".$destinoPer."<br>".$tempoPer."<br>".$custoPer."<br>".$custoPerBag."<br>";
echo $openvendas."<br>".$rota."<br>";
echo $motqntd."<br>".$trocaMot;
-->