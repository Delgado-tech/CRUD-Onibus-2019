<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "ONIBUS";
$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());

mysqli_select_db($conexao,$banco) or die(mysqli_error());
mysqli_set_charset($conexao,"utf8");


mysqli_query($conexao,"USE ONIBUSBU;");
$sql = mysqli_query($conexao,"SELECT * FROM BACKUPDAY;");

$day = mysqli_fetch_array($sql);
$backup = $day['BackUPday'];

$ano = substr($backup,0,4);
$mes = substr($backup,5,2);
$dia = substr($backup,8,2);
$hora = substr($backup,11,9);

$backup = $dia."/".$mes."/".$ano." [".$hora."]";
mysqli_query($conexao,"USE ONIBUS;");

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

<a class="btn tooltipped green darken-3" href="../menupg.php" style="margin-top: 10px"><</a>

<div class="container">
<br>
<div class="card-painel green darken-2">
	<h1 class="center-align white-text"><b>Back-Up</b></h1>


<div class="card-painel green lighten-3">
	<p style="font-size: 30px; margin: 20px"> <b style="font-size: 40px;">Por que manter o backup atualizado?</b><br>
Somos todos reféns de nossas informações, eventualmente, elas podem acabar sendo perdidas por um erro, desastre, e até mesmo roubadas,
para elas não serem perdidas é recomendado fazer seu backup em um servidor ou em meios precários como um <i>pen-driver</i> ou no próprio 
<i>computador</i>.<br>

<b style="font-size: 20px;" class="grey-text text-darken-2">[Estão apenas habilitados Administradores e Gerentes para a execução dessa função!]</b></p>
<br><br>
<span style="font-size: 15px; margin: 15px" class="right-align"><b class="grey-text text-darken-3">Ultimo Back-Up Realizado: 
<b style="font-size: 20px"><?php echo $backup; ?></b></b></span>
<?php
include "backups.php";
?>
<br>
</div>
</div>
</div>
	



<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	
	
</body>
</html>