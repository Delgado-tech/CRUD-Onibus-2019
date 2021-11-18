<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "ONIBUS";

$conexao = mysqli_connect($host,$user,$pass) or die(mysqli_error());
mysqli_select_db($conexao,$banco) or die(mysqli_error($conexao));
mysqli_set_charset($conexao,"utf8");

?>

<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">
	
	
	<title>Surreal Viagens</title>
	
	<!-- nome/ cidade/ estado/ nascimento/ cpf/ obs -->
	</head>

	<body>
	
<?php
$motName = $_POST['motName'];
$motPhone = $_POST['motPhone'];
$motCity = $_POST['motCity'];
$motRua = $_POST['motRua'];
$motBairro = $_POST['motBairro'];
$motNumCasa = $_POST['motNumCasa'];
$motState = $_POST['motState'];
$motNasc = $_POST['motNasc'];
$motCEP = $_POST['motCEP'];

if(isset($_POST['CNHMOT'])){$CNHtipo = $_POST['CNHMOT'];}
else{$CNHtipo = "";}

//data
$CNHvenc = $_POST['dataCNH'];

if($CNHvenc == ""){$mysqliDateFormat = "";}else{
$date = date_create_from_format('d/m/Y', $CNHvenc); //cria um formato de data para variável $
$mysqliDateFormat = date_format($date, 'Y-m-d'); //formata data em padrão US a qual o mysli lê;
}
	$dateY = substr($mysqliDateFormat,0,4);
	$dateM = substr($mysqliDateFormat,5,2);
	$dateD = substr($mysqliDateFormat,8,2); 
	
	$today = getdate();
	$todayY = $today['year'];
	$todayM = $today['mon'];
	$todayD = $today['mday'];
	
//-------------
if($mysqliDateFormat == "" || $CNHtipo == "")
{
	echo "
		<h1 class='center-align'>Você deixou algum campo vazio!</h1>
		<h3 class='center-align'>aguarde alguns instantes e preencha-os...</h3>
		";
	
	echo "<script>setTimeout(function(){window.history.go(-2)}, 2000);</script>";

	
}else if($dateY <= $todayY && $dateM <= $todayM){
	
	echo "
		<h1 class='center-align'>CNH Expirado!</h1>
		<h5 class='center-align'><b>ou muito perto da expiração</b></h5>
		";
	
	echo "<script>setTimeout(function(){window.history.go(-2)}, 3400);</script>";
	
}else{
	
	do{
		$codmot = rand(100000,999999);
		
	$sql = mysqli_query($conexao,"SELECT * FROM CAD_MOTORISTA WHERE COD_MOT = '$codmot'");
	
	$row = mysqli_num_rows($sql);
	
	}while($row > 0);
	
	mysqli_query($conexao,"INSERT INTO CAD_MOTORISTA VALUES('$codmot','$motName','$motRua',
'$motNumCasa','$motBairro','$motCity','$motState','$motCEP','$motPhone','$motNasc',
'$mysqliDateFormat','$CNHtipo')") or die(mysqli_error($conexao));
		
		echo "<div class='container'>
		<h1 class='center-align'>Cadastrando Motorista! Aguarde...</h1>
		";
		echo "<div class='progress'>
			<div class='indeterminate'></div>
			</div></div>
			</div>
			";
		header("refresh:3;url='cadMotMain.php'");
}

?>


	<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	
	

	</body>
</html>