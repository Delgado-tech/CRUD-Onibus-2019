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
$userName = $_POST['username'];
$userPhone = $_POST['userphone'];
$userID = $_POST['userid'];
$userSenha = $_POST['userpass'];

$userfct = $_POST['userfct'];

$noRepeat = mysqli_query($conexao,"SELECT USER_ID FROM CAD_USUARIOS WHERE USER_ID = '$userID'");

$row = mysqli_num_rows($noRepeat);

if($userName == "" || $userPhone == "" || $userID == "" || $userSenha == "" || $row > 0)
{
if($userName == "" || $userPhone == "" || $userID == "" || $userSenha == "")
{
	echo "<center><h1>Você deixou algum campo vazio!</h1></center>";
	echo "<center><h3>aguarde alguns instantes e preencha-o...</h3></center>";
	
	echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
	
}else if($row > 0){
	echo "<center><h1>ID de Usuário já Existente!</h1></center>";
	echo "<center><h3>aguarde alguns instantes e escolha um Apelido disponível...</h3></center>";
	
	echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
}
}else{
	$sql = mysqli_query($conexao,"INSERT INTO cad_usuarios(USER_NAME, USER_FONE, TIPO, USER_ID, SENHA) 
VALUES('$userName', '$userPhone', '$userfct', '$userID', '$userSenha')");
	
	echo "<div class='container'>";
	echo "<center><h1>Cadastrando Usuário! Aguarde...</h1></center>";
	echo "<div class='progress'>
			<div class='indeterminate'></div>
			</div></div>
			";
	header("refresh:3;url='cadUserMain.php'");
}
?>

<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
</body>
</html>