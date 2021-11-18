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

$motName = $_POST['motname'];

$motPhone = $_POST['motphone'];

// ---- Endereço
$motRua = $_POST['enderecoMot']; 

$motBairro = $_POST['bairro'];

$motNumCasa = $_POST['numCasa'];
$motNumSize = strlen($motNumCasa);

$motCity = $_POST['citymot'];

if(isset($_POST['estado']))
{
	$motState = $_POST['estado'];
}else{$motState = "";}


$motCEP = $_POST['cepmot'];

include '../removeSpecialChar.php';
$CEPcorrection = str_replace($arrFrom2,"",(preg_replace($arrFrom,"",$motCEP)));
$cepSize = strlen($CEPcorrection);
//if($cpfSize != 11){echo "diferente ".$cpfSize;}else{echo "igual";}
//if($passCpf != $cpfcorrect){echo "diferente";}else{echo "igual";}

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

if($motName == "" || $motPhone == "" || $dataNasc == "" || $motRua == "" || 
$motBairro == "" || $motNumCasa == "" || $motCity == "" || $motState == "")
{
	echo "
		<h1 class='center-align'>Você deixou algum campo vazio!</h1>
		<h3 class='center-align'>aguarde alguns instantes e preencha-os...</h3>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
		
}else if($motCEP != $CEPcorrection || $cepSize > 8)
{
	echo "
		<h2 class='center-align'>[Erro: CEP inválido]</h2>
		<div class='grey-text text-darken-3'>
		<h5 class='center-align'><b>#Dica: Utilize apenas números no CEP 
		<br>sem passar o número de dígitos índicado</b></h5>
		</div>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
		
}else if($motNumSize > 4)
{
	echo "
		<h1 class='center-align'>Número de casa infomado muito alto!</h1>
		<h5 class='center-align'><b>#Dica: Siga a quantidade de dígitos Índicada</b></h5>
		</div>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
		
}else if($dNYear <= $today && $idade < 18)
{
	echo "
		<h2 class='center-align'>Criação não autorizada!</h2>
		<div class='grey-text text-darken-3'>
		<h5 class='center-align'><b>#Dica: Estão apenas autorizados Motoristas
		maiores de 18 anos</b></h5>
		</div>
		";
	
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
		
}else if($dNYear > $today){
	
		echo "
		<h2 class='center-align'>[ERRO: Data de Nascimento Inválida]</h2>
		<div class='grey-text text-darken-3'>
		<h5 class='center-align'><b>#Dica: Selecione um ano de nascimento que já ocorreu!</b></h5>
		</div>
		"; 
		
		echo "<script>setTimeout(function(){window.history.go(-1)}, 3000);</script>";
	
}else{
	include "cad_motCNH.php";
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
echo "nome: ".$motName;
echo "<br>telefone: ".$motPhone;
echo "<br>cidade: ".$motCity;
echo "<br>Rua: ".$motRua;
echo "<br>Bairro: ".$motBairro;
echo "<br>Numero: ".$motNumCasa;
echo "<br>Estado: ". $motState;
echo "<br>Nascimento: ".$dataNasc;
echo "<br>MysqliDate: ".$mysqliDateFormat;
echo "<br>Idade: ".$idade;
------------------------


-->
</html>

