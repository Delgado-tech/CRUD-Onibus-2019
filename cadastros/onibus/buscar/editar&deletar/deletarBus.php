<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco = "ONIBUS";

$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());

mysqli_select_db($conexao,$banco) or die (mysqli_error());
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
	$placa = filter_input(INPUT_GET, 'placa', FILTER_DEFAULT);

mysqli_query($conexao,"DELETE FROM CAD_ONIBUS WHERE PLACA = '$placa'") or die(mysqli_error($conexao));

$sql = mysqli_query($conexao,"UPDATE LCMT_VIAGEM SET PLACA2=''
WHERE PLACA2 = '$placa'") or die(mysqli_error($conexao));
		


echo "<div class='container'>";
echo "<center><h1 style='color: #d32f2f'>Deletando Ônibus</h1></center>";
echo "<div class='progress red lighten-4'>
			<div class='indeterminate red darken-3'></div>
			</div></div></div>
			";
header("refresh:3;url='editarBus.php'");

?>
</body>
</html>