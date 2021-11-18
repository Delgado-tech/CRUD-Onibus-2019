<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "ONIBUS";

$conexao = mysqli_connect($host,$user,$pass) or die(mysqli_error());
mysqli_select_db($conexao,$banco);
mysqli_set_charset($conexao,'utf8');
			
?>

<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">
		
	<title>Surreal Viagens</title>

	</head>

	<body>
<?php

$assento = filter_input(INPUT_GET, 'numA', FILTER_DEFAULT);
$rota = filter_input(INPUT_GET, 'rota', FILTER_DEFAULT);
$cpf = filter_input(INPUT_GET, 'cpf', FILTER_DEFAULT);
$data = filter_input(INPUT_GET, 'data', FILTER_DEFAULT);
$numbag = filter_input(INPUT_GET, 'numbag', FILTER_DEFAULT);
$vgmAuto = filter_input(INPUT_GET, 'vgmAuto', FILTER_DEFAULT);
$placa = filter_input(INPUT_GET, 'placa', FILTER_DEFAULT);


mysqli_query($conexao, "INSERT INTO LCMT_VIAGEM_PASS VALUES('$data','$rota','$assento','$cpf','$vgmAuto','$numbag');");
mysqli_query($conexao, "UPDATE LCMT_VIAGEM SET PLACA2='$placa' WHERE DATA_VIAGEM='$data' AND ROTA2 = '$rota';")
or die(mysqli_error($conexao));

echo "<div class='container'>
		<h1 class='center-align'>Registrando Passagem! Aguarde...</h1>
		";
		echo "<div class='progress'>
			<div class='indeterminate'></div>
			</div></div>
			</div>
			";
		header("refresh:3;url='cadVendaMain.php'");

?>

<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	</body>
	</html>

<?php
/*-------------- DEBUG--------------
echo $assento." > Assento<br>";
echo $rota." > Rota<br>";
echo $cpf." > CPF<br>";
echo $data." > Data<br>";
echo $numbag." > Número Bagagem<br>";
echo $vgmAuto." > Autorizado<br>";
echo $placa." > Placa<br>";
--------------- DEBUG--------------*/
?>