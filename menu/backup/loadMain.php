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

<a class="btn tooltipped red darken-3" href="../menupg.php" style="margin-top: 10px"><</a>

<div class="container">
<br>
<div class="card-painel red darken-2">
	<h1 class="center-align white-text"><b>Load</b></h1>


<div class="card-painel red lighten-3">
	<p style="font-size: 30px; margin: 20px"> <b style="font-size: 40px;">O que é Load?</b><br>
Load é a palavra inglesa para "<i>carregar</i>", nessa interface você pode carregar o último backup salvo clicando no botão <b><i>[Load]</i></b>,
ou pode restaurar o banco de dados a <i>zero</i> clicando no botão <b><i>[Reset]</b></i>.</p>

<p style="font-size: 20px; margin: 20px"> <b style="font-size: 20px;">Atenção!</b><br>
Para evitar erros após clicar em [Reset] ou [Load], espere aparecer a mensagem de confirmação que a função foi realizada com Sucesso.</p>

<p><b style="font-size: 15px; margin: 20px" class="grey-text text-darken-2">
[Estão apenas habilitados Administradores e Gerentes para executar a função "Load"]</b>
<br>
<b style="font-size: 15px; margin: 20px" class="grey-text text-darken-2">
[Estão apenas habilitados Administradores para executar a função "Reset"]</b></p>

<br><br>
<span style="font-size: 15px; margin: 15px" class="right-align"><b class="grey-text text-darken-3">Ultimo Back-Up Realizado: 
<b style="font-size: 20px"><?php echo $backup; ?></b></b></span>
<?php
include "loads.php";
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