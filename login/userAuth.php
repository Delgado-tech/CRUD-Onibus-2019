<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "ONIBUS";
$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());

mysqli_select_db($conexao,$banco) or die(mysqli_error());
?>

	<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title>Aguarde...</title>
	
		<script type="text/javascript">
			function authenticOK()
			{
				setTimeout("window.location = '../menu/menupg.php'", 5000);
			}
			
			function authenticNO()
			{
				setTimeout("window.location = 'login.php'", 3500);
			}
			
		</script>
		</head>
	<body>
<?php
$userid = $_POST['userid'];
$senha = $_POST['senha'];

$sql= mysqli_query($conexao,"SELECT * FROM CAD_USUARIOS WHERE USER_ID = '$userid' AND SENHA = '$senha'") or die(mysqli_error($conexao));

$row = mysqli_num_rows($sql);

	if($row > 0)
	{
		session_start();
		$_SESSION['userid'] = $_POST['userid'];
		$_SESSION['senha'] = $_POST['senha'];
		
		echo "<div class='container'>";
		echo "<center><h2>Autenticando...</h2></center>";
		echo "<center><h3>Isso pode levar alguns segundos</h3></center>";
		echo "<div class='progress'>
			<div class='indeterminate'></div>
			</div></div>
			";
		
		echo "<script>authenticOK()</script>";
	}else{
		
		echo "<center><h2>ERRO!</h2></center>";
		echo "<center><h3>ID de Usuário ou Senha inválidos! Aguarde alguns instantes para tentar novamente...</h3></center>";
		echo "<script>authenticNO()</script>";
		
	}
	
?>

<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	</body>
	</html>