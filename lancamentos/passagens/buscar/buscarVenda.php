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


	<form name="searchUserForm" method="POST" action="vendaResults.php">

	<nav>
    <div class="nav-wrapper grey darken-3">
      <form>
        <div class="input-field">
          <input id="search" placeholder="Pesquisar por Passagem..." name="navbar" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
    </nav>

	</form>
<?php
	echo"
  
  <a class='btn tooltipped grey darken-3' href='../cadVendaMain.php'><b><</b></a>
  ";
  
	
	$sql = mysqli_query($conexao,"SELECT * FROM LCMT_VIAGEM_PASS ORDER BY ROTA3 ASC");
	
	$row = mysqli_num_rows($sql);
	
	if($row > 0){
	echo "<h4 style='margin: 10px;'>Todas as Passagens Registradas:</h4>";
		
		echo"		
		<div class='center-align'>
		<div class='row'>
        <div class='input-field col s12'>
		<table class='responsive-table'>
        <thead>
          <tr>
              <th>Rota</th>
              <th>Data da Viagem</th>
              <th>Passageiro [CPF]</th>
			  <th>Número <br>do Assento</th>
			  <th>Qtde. <br>Bagagem</th>
			  <th>Placa do Ônibus</th>
			  <th>Autorizado</th>
			   <th></th>
          </tr>
        </thead>
		";
		
		while($linha = mysqli_fetch_array($sql))
		{
			
			
			$rota = $linha['ROTA3'];
			
			$numAssento = $linha['NUM_ASSENTO'];
			if($numAssento < 10){$numAssento = "A0".$numAssento;}else{$numAssento = "A".$numAssento;}
			
			$CPF = $linha['CPF2'];
			
			$sql2 = mysqli_query($conexao,"SELECT * FROM CAD_PASSAGEIRO WHERE CPF='$CPF'");
			if($linha2 = mysqli_fetch_array($sql2))
			{
				$nomePass = $linha2['PASS_NAME'];
			}
			$nome = $nomePass." [".$CPF."]";
			
			
			
			$autoVgm = $linha['AUTO_VGM'];
			if($autoVgm == "S"){$autoVgm = "Sim";}else{$autoVgm = "Não";}
			
			$numbag = $linha['NUM_BAG'];
			if($numbag == 0){$numbag = "---";}
			
			
			$mysqliDateFormat = $linha['DATA_VIAGEM2'];
			$mysqliDateFormat = str_replace(" 00:00:00","",$mysqliDateFormat);
			
			$date = date_create_from_format('Y-m-d', $mysqliDateFormat); //cria um formato de data para variável $
			$dataviagem = date_format($date, 'd/m/Y');
			
			
			
			$sql3 = mysqli_query($conexao,"SELECT * FROM LCMT_VIAGEM 
			WHERE DATA_VIAGEM='$mysqliDateFormat' AND ROTA2='$rota'");
			if($linha3 = mysqli_fetch_array($sql3))
			{
				$placa = $linha3['PLACA2'];
			}
			
	
	echo "
        <tbody>
          <tr>
            <td><i>$rota</i></td>
            <td>$dataviagem</td>
            <td>$nome</td>
			<td><b>$numAssento</b></td>
			<td>$numbag</td>
			<td>$placa</td>
			<td>$autoVgm</td>
			
			
			<td><a href='vendaPDF.php?
			rota=$rota&&
			numAssento=$numAssento&&
			nome=$nome&&
			dataviagem=$dataviagem&&
			numbag=$numbag&&
			autoVgm=$autoVgm&&
			placa=$placa
			' class='btn-floating grey darken-3' style='margin-left: 5px'><i class='small material-icons'>assignment</i></a></td>
			<td style='color: darkred'>
			
          </tr>
        </tbody>
      
	  ";
				
		}
		echo "</table></div></div><div>";
		
	}else{
		echo "<center><h1>Nenhuma Passagem Registrada</h1></center>";
	}
?>	

<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
</body>
</html>