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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<?php

if(isset($_POST['RotaSel'])){$rota = $_POST['RotaSel'];}
else{$rota = "";}// If Rota setada;

if(isset($_POST['MotSel'])){$mot = $_POST['MotSel'];}
else{$mot = "";}// If Motorista setada;

if(isset($_POST['PlacaSel'])){$placa = $_POST['PlacaSel'];}
else{$placa = "";}// If Placa setada;


//---------Formatação Data
if(isset($_POST['dataviagem'])){$dataviagem = $_POST['dataviagem'];}
else{$dataviagem = "";}// If Data da Viagem setada;

if($dataviagem == ""){$mysqliDateFormat = "";}else{
$date = date_create_from_format('d/m/Y', $dataviagem); //cria um formato de data para variável $
$mysqliDateFormat = date_format($date, 'Y-m-d'); //formata data em padrão US a qual o mysli lê;
$mysqliDateFormat = $mysqliDateFormat." 00:00:00";
}

//---------DataInválida
$today = getdate(); //$today['mday'] - dia; $today['mon'] - mês; $today['year'] - ano;

$datanumbers = str_replace("/","", $dataviagem);

$dvDia = substr($datanumbers,0,2);
$dvMes = substr($datanumbers,2,2);
$dvAno = substr($datanumbers,4,4);


//---------------------

$sql = mysqli_query($conexao,"SELECT * FROM LCMT_VIAGEM WHERE ROTA2 = '$rota' AND DATA_VIAGEM = '$mysqliDateFormat'");
$row = mysqli_num_rows($sql);


if($rota == "" || $mot == "" || $dataviagem == ""){
	echo "
		<h2 class='center-align'>Você deixou algum campo obrigatório Vazio!</h2>
		<h3 class='center-align'>Aguarde alguns instantes e preencha-o...</h3>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";

	
}else if($row > 0){
	echo "
		<h1 class='center-align'>Viagem já registrada!</h1>
		<h4 class='center-align'><b class='grey-text text-darken-3'>#Dica: Escolha uma outra Rota ou Data</b></h4>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
		
}else if($today['year'] == $dvAno && 
		$today['mon'] >= $dvMes && 
		$today['mday'] > $dvDia){
			
	echo "
		<h1 class='center-align'>[Data Selecionada Inválida]</h1>
		<h4 class='center-align'><b class='grey-text text-darken-3'>#Dica: Escolha uma Data que NÃO ocorreu ainda!</b></h4>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
}else{
	
	mysqli_query($conexao,"INSERT INTO LCMT_VIAGEM VALUES('$mysqliDateFormat','$rota','$placa',
	'$mot')") or die(mysqli_error($conexao));
	
	mysqli_query($conexao,"INSERT INTO LCMT_VIAGEM_PASS VALUES('$mysqliDateFormat','$rota','',
	'','','')") or die(mysqli_error($conexao));

	
		
		echo "<div class='container'>
		<h1 class='center-align'>Cadastrando Viagem! Aguarde...</h1>
		";
		echo "<div class='progress'>
			<div class='indeterminate'></div>
			</div></div>
			</div>
			";
		header("refresh:3;url='cadViagensMain.php'");
	
}

?>



<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>

	
</body>
</html>
<?php
/* ------- DEBUG -------
echo $rota."<br>";
echo $mot."<br>";
echo $placa."<br>";
echo $dataviagem."<br>";
echo $mysqliDateFormat."<br>";
   ------- DEBUG -------
*/
?>