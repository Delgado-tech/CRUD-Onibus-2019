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

$passName = $_POST['username'];

$hidcpf = $_POST['cpf'];
$passCpf = $_POST['usercpf']; 
$passCpf2 = $_POST['usercpf']; 

$passCpf2 = str_replace(".","",(str_replace("-","",$passCpf2)));

include '../../../removeSpecialChar.php';
$cpfcorrection = str_replace($arrFrom2,"",(preg_replace($arrFrom,"",$passCpf)));
$cpfSize = strlen($cpfcorrection);
//if($cpfSize != 11){echo "diferente ".$cpfSize;}else{echo "igual";}
//if($passCpf != $cpfcorrect){echo "diferente";}else{echo "igual";}

$passCity = $_POST['usercity'];

$passObs = $_POST['userobs'];
if($passObs == ""){$passObs = "---";}

if(isset($_POST['estado']))
{
	$passState = $_POST['estado'];
}else{$passState = "";}

//----------- Nascimento
$dataNasc = $_POST['data']; //pega data formatada em padrão BR;

if($dataNasc == ""){$mysqliDateFormat = "";}else{
$date = date_create_from_format('d/m/Y', $dataNasc); //cria um formato de data para variável $
$mysqliDateFormat = date_format($date, 'Y-m-d'); //formata data em padrão US a qual o mysli lê;
}

$today = getdate();//função pega os dados de data e hora em array;
$today = $today['year'];
$today = intval($today);

$dNYear = substr($dataNasc, 6, 4);//pega o ano da variável $dataNasc;

$idade = $today - $dNYear;

//-----------
if($passCpf2 != $hidcpf){
$noRepeat = mysqli_query($conexao,"SELECT CPF FROM CAD_PASSAGEIRO WHERE CPF='$passCpf2'");

$row = mysqli_num_rows($noRepeat);
}else{$row=0;}

if($passCpf == "" || $passName == "" || $passCity == "" || $passState == "" || $mysqliDateFormat == ""
|| $row > 0 || $passCpf != $cpfcorrection || $cpfSize != 11) //tipos de erro;
{
	if($row > 0) //CPF Registrado;
	{
		echo "
		<h1 class='center-align'>CPF já registrado!</h1>
		<h3 class='center-align'>aguarde alguns instantes e altere-o...</h3>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
		
	}else if($passCpf != $cpfcorrection) //CPF cotem caracteres não numéricos;
	{
		echo "
		<h2 class='center-align'>[Erro: CPF inválido]</h2>
		<div class='grey-text text-darken-3'>
		<h5 class='center-align'><b>#Dica: Utilize apenas números no CPF</b></h5>
		</div>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
		
	}else if($passCpf == "" || $passName == "" || $passCity == "" || $passState == "" ||
	$mysqliDateFormat == "") //Campo vazio;
	{
		
		echo "
		<h1 class='center-align'>Você deixou algum campo vazio!</h1>
		<h3 class='center-align'>aguarde alguns instantes e preencha-os...</h3>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
	
	}else if($cpfSize != 11){//tamanho de CPF inválido!;
		
		echo "
		<h2 class='center-align'>[Erro: Tamanho de CPF inválido]</h2>
		<div class='grey-text text-darken-3'>
		<h5 class='center-align'><b>#Dica: Coloque exatamente 11 caracteres numéricos no CPF</b></h5>
		</div>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
	}
	
}else if(strlen($passObs) > 1000){//se as observações utrapassarem 1000 caracteres;
	echo "
		<h2 class='center-align'>[Limite de caracteres nas Observações Excedido]</h2>
		<div class='grey-text text-darken-3'>
		<h5 class='center-align'><b>#Dica: Utilize no máximo 1000 letras nas Observações</b></h5>
		</div>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";

}else if($dNYear <= $today && $idade < 12){ //se o passageiro for menor de 12 anos 
		//segundo a Lei penal do país, apenas pessoas maiores de 12 anos, podem viajar sozinhas;
		echo "
		<h2 class='center-align'>Criação não autorizada!</h2>
		<div class='grey-text text-darken-3'>
		<h5 class='center-align'><b>#Dica: Estão apenas autorizados passageiros
		maiores de 12 anos</b></h5>
		</div>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
	
	
}else if($dNYear > $today){//Se a data de Nascimento escolhida não ocorreu;
	
		echo "
		<h2 class='center-align'>[ERRO: Data de Nascimento Inválida]</h2>
		<div class='grey-text text-darken-3'>
		<h5 class='center-align'><b>#Dica: Selecione um ano de nascimento que já ocorreu!</b></h5>
		</div>
		";
		
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
	
}else{//Nenhum erro? Cadastro sucedido!
		$sql = mysqli_query($conexao,"UPDATE CAD_PASSAGEIRO SET
		CPF ='$passCpf2',
		PASS_NAME = '$passName',
		CIDADE_P ='$passCity',
		ESTADO_P = '$passState',
		PASS_NASC ='$mysqliDateFormat',
		OBS_PASS ='$passObs' WHERE CPF='$hidcpf'") or die(mysqli_error($conexao));
		
		$sql = mysqli_query($conexao,"UPDATE LCMT_VIAGEM_PASS SET
		CPF2 ='$passCpf2' WHERE CPF2='$hidcpf'") or die(mysqli_error($conexao));
		
		echo "<div class='container'>
		<h1 class='center-align'>Atualizando Passageiro! Aguarde...</h1>
		";
		echo "<div class='progress'>
			<div class='indeterminate'></div>
			</div></div>
			</div>
			";
		header("refresh:3;url='editarPass.php'");
}

?>

	<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	
	

	</body>
	
<!--Anotações:
------------------------
Debugar Informações:
-----
echo "nome: ".$passName;
echo "<br>cpf: ".$passCpf;
echo "<br>cidade: ".$passCity;
echo "<br>Obs: ".$passObs;
echo "<br> Estado: ". $passState;
echo "<br>Nascimento: ".$dataNasc;
echo "<br>MysqliDate: ".$mysqliDateFormat;
------------------------


-->
</html>

