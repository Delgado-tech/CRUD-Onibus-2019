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
$userid = $_POST['userid'];
$userName = $_POST['username'];
$userPhone = $_POST['userphone'];
$userSenha = $_POST['userpass'];

$userfct = $_POST['userfct'];

if($userName == "" || $userPhone == "" || $userSenha == "")
{
	echo "<center><h1>Não foi possivel salvar a Edição!</h1></center>";
	echo "<center><h3>Preencha todos o campos e tente novamente...</h3></center>";
	
	echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
	
}else{
	$sql = mysqli_query($conexao,"UPDATE cad_usuarios SET 
	USER_NAME = '$userName',
	USER_FONE = '$userPhone', 
	TIPO = '$userfct', 
	SENHA = '$userSenha' WHERE USER_ID = '$userid'");
	
	echo "<div class='container'>";
	echo "<center><h1>Atualizando Usuário! Aguarde...</h1></center>";
	echo "<div class='progress'>
			<div class='indeterminate'></div>
			</div></div>
			";
	echo "<script>registrado()</script>";
}
?>

<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
</body>
</html>