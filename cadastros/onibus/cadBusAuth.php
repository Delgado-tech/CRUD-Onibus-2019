<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$banco = 'ONIBUS';

$conexao = mysqli_connect($host,$user,$pass) or die(mysqli_error());

mysqli_select_db($conexao, $banco) or die(mysqli_error($conexao));
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
	$placa = $_POST['placa'];
	
	include '../removeSpecialChar.php';
	
	//formatação da placa
	
	$placasize = strlen($placa);
	
	$placaABC = str_replace($arrFrom3,'',(str_replace($arrFrom2,'',(substr($placa, 0, 3)) )) );
	$placa123 = str_replace($arrFrom2,'',(preg_replace($arrFrom,'',(substr($placa, 3, 4)) )) );
	$placafinal = "$placaABC"."$placa123";
	
	//echo $placa123; echo '<br>'.$placaABC;echo '<br>'.$placa;
	//
	
	$anofab = $_POST['ano_fab'];
	$assentos = $_POST['assentos'];
	
	if(isset($_POST['marca']))
	{$marca = $_POST['marca'];}else{$marca = '';}

	$bustype = $_POST['bustype'];
	
	$obs = $_POST['busobs'];
	if(strlen($obs) == 0){$obs = "---";}
	
	$noRepeat = mysqli_query($conexao,"SELECT * FROM CAD_ONIBUS WHERE PLACA = '$placa'");
	$row = mysqli_num_rows($noRepeat);
	
	
	if($placa == "" || $anofab == "" || $assentos == "" || $marca == "" || $row > 0 || $placasize != 7 || 
	$placa != $placafinal || strlen($obs) > 1000 || strlen($anofab) != 4 || strlen($assentos) > 2) //filtro de erro
	{
		if($row > 0)
		{
			echo "
		<h1 class='center-align'>Placa já registrada!</h1>
		<h3 class='center-align'>aguarde alguns instantes e altere-a...</h3>
		";
		
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
		
		}else if($placa == "" || $anofab == "" || $assentos == "" || $marca == "" ){//erro de espaço vazio
			
			echo "
		<h1 class='center-align'>Você deixou algum campo vazio!</h1>
		<h3 class='center-align'>aguarde alguns instantes e preencha-os...</h3>
		";
		
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
			
		}else if($placasize != 7 || $placa != $placafinal){//erro de placa;
			echo '
		<h1 class="center-align">Placa inválida!</h1>
		<h5 class="center-align grey-text text-darken-3"><b>#Dica: A placa deve conter até 7 dígitos,<br>
		onde os 3 primeiros sejam letras e os 4 últimos sejam números <br>(Ex: "ABC1234")</b></h5>
		';
		
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
		
		}else if(strlen($obs) > 1000){//erro de obs;
			echo "
		<h2 class='center-align'>[Limite de caracteres nas Observações Excedido]</h2>
		<div class='grey-text text-darken-3'>
		<h5 class='center-align'><b>#Dica: Utilize no máximo 1000 letras nas Observações</b></h5>
		</div>
		"; 
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
		
		}else if(strlen($anofab) != 4 || strlen($assentos) > 2){
			if(strlen($assentos) > 2)
			{//erro de assento;
				echo "
		<h2 class='center-align'>Número de Assentos muito Alto!</h2>
		<div class='grey-text text-darken-3'>
		<h5 class='center-align'><b>#Dica: Coloque um número de assentos de até 2 dígitos</b></h5>
		</div>
		"; 
		
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
		
			}else{//erro de ano;
			echo "
		<h2 class='center-align'>Ano ínvalido!</h2>
		<div class='grey-text text-darken-3'>
		<h5 class='center-align'><b>#Dica: Informe um ano de 4 dígitos</b></h5>
		</div>
		"; 
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
			}
		}
		
		
	}else{
		$sql = mysqli_query($conexao,"INSERT INTO CAD_ONIBUS VALUES('$placa','$marca','$bustype',
'$anofab','$assentos','$obs')") or die(mysqli_error($conexao));
		
		echo "<div class='container'>
		<h1 class='center-align'>Registrando Ônibus! Aguarde...</h1>
		";
		echo "<div class='progress'>
			<div class='indeterminate'></div>
			</div></div>
			</div>
			";
		header("refresh:3;url='cadBusMain.php'");
	}
	
	?>
	
	
		<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	</body>
	</html>