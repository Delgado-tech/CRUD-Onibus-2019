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
$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

$sql_del = "DELETE FROM CAD_USUARIOS WHERE USER_ID = '$id'";

mysqli_query($conexao,$sql_del) or die(mysqli_error($conexao));

echo "<div class='container'>";
echo "<center><h1 style='color: #d32f2f'>Deletando Usuario</h1></center>";
echo "<div class='progress red lighten-4'>
			<div class='indeterminate red darken-3'></div>
			</div></div></div>
			";
header("refresh:3;url='editarUser.php'");

?>
</body>
</html>