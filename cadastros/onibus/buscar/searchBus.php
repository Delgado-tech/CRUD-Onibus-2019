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


	<form name="searchUserForm" method="POST" action="resultsBus.php">

	<nav>
    <div class="nav-wrapper grey darken-3">
      <form>
        <div class="input-field">
          <input id="search" placeholder="Pesquisar por Ônibus..." name="navbar" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
    </nav>

	</form>
<?php
	echo"
  
  <a class='btn tooltipped grey darken-3' href='../cadBusMain.php'><b><</b></a>
  ";
  
	
	$sql = mysqli_query($conexao,"SELECT * FROM CAD_ONIBUS ORDER BY PLACA ASC");
	
	$row = mysqli_num_rows($sql);
	
	//echo ' <b style="margin-left: 77%;">Quantidade de Ônibus Registrados: ['.$row.']</b> ';
	//usar função acima nos relatórios;
	
	if($row > 0){
	echo "<h4 style='margin: 10px;'>Todos os Ônibus Registrados:</h4>";
		
		echo"		
		<div class='center-align'>
		<div class='row'>
        <div class='input-field col s6'>
		<table class='responsive-table'>
        <thead>
          <tr>
              <th>Placa</th>
              <th>Marca</th>
              <th>Tipo</th>
			  <th>Ano</th>
			  <th>Assentos</th>
			  <th>Observações</th>
			  <th></th>
          </tr>
        </thead>
		";
		
		while($linha = mysqli_fetch_array($sql))
		{
			$placa = $linha['PLACA'];
			$marca = $linha['MARCA'];
			$tipo = $linha['TIPO_AUTO'];
			$anofab = $linha['FAB_ANO'];
			$assentos = $linha['NUM_ASSENTO'];
			$obs = $linha['OBS_AUTO'];
			
			$bustype = ""; //alterar a sigla do Tipo para palavra Inteira "A" vira Administrador;
			
					if($tipo == "V")
					{$bustype = "Viagem";}
					else if($tipo == "F")
					{$bustype = "Fretado";}
					else if($tipo == "L")
					{$bustype = "Leito";}
				
			//Obs config
		$obsline1 = substr($obs,0,70);
		$obsline2 = substr($obs,70,70);
		$obsline3 = substr($obs,140,70);
		$obsline4 = substr($obs,210,70);
		$obsline5 = substr($obs,280,70);
		$obsline6 = substr($obs,350,70);
		$obsline7 = substr($obs,420,70);
		$obsline8 = substr($obs,490,70);
		$obsline9 = substr($obs,560,70);
		$obsline10 = substr($obs,630,70);
		$obsline11 = substr($obs,700,70);
		$obsline12 = substr($obs,770,70);
		$obsline13 = substr($obs,840,70);
		$obsline14 = substr($obs,910,70);
		$obsline15 = substr($obs,980,20);
			
	
	echo "
        <tbody>
          <tr>
            <td>$placa</td>
            <td style='color: red;'>$marca</td>
            <td>$bustype</td>
			<td>$anofab</td>
			<td><p style='margin-left: 25px;'>$assentos</p></td>
			<td>";
			
			if($obs == "---"){echo "<p class='grey-text text-darken-1' style='margin-left: 36px;'>---</p>";}
			else{include "../../obs.php";}
			
			echo"</td>
			
			<td><a href='oniPDF.php?
			placa=$placa&&
			marca=$marca&&
			tipo=$bustype&&
			anofab=$anofab&&
			assentos=$assentos&&
			obs=$obs
			' class='btn-floating grey darken-3'><i class='small material-icons'>assignment</i></a></td>
			
          </tr>
        </tbody>
      
	  ";
				
		}
		echo "</table></div></div><div>";
		
	}else{
		echo "<center><h1>Nenhum Ônibus Registrado</h1></center>";
	}
?>	

<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
</body>
</html>