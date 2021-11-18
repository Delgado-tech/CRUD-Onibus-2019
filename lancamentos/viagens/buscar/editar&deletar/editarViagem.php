<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "ONIBUS";

$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());

mysqli_select_db($conexao,$banco) or die (mysqli_error());
mysqli_set_charset($conexao,"utf8");
mysqli_set_charset($conexao,'utf8');
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


	<form name="searchUserForm" method="POST" action="viaResults.php">

	<nav>
    <div class="nav-wrapper black darken-3">
      <form>
        <div class="input-field">
          <input id="search" placeholder="Pesquisar por Viagem..." name="navbar" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
    </nav>

	</form>
<?php
	echo"
  
  <a class='btn tooltipped black darken-3' href='../../cadViagensMain.php'><b><</b></a>
  ";
  
	
	$sql = mysqli_query($conexao,"SELECT * FROM LCMT_VIAGEM ORDER BY ROTA2 ASC");
	
	$row = mysqli_num_rows($sql);
	
	if($row > 0){
	echo "<h4 style='margin: 10px;'>Todas as Viagens Registradas:</h4>";
		
		echo"		
		<div class='center-align'>
		<div class='row'>
        <div class='input-field col s8'>
		<table class='responsive-table'>
        <thead>
          <tr>
              <th>Rota</th>
              <th>Motorista [ID]</th>
              <th>Placa</th>
			  <th>Data da Viagem</th>
			   <th style='color: #009688'>Editar</th>
			  <th style='color: #009688'>Deletar</th>
          </tr>
        </thead>
		";
		
		while($linha = mysqli_fetch_array($sql))
		{
			
			
			$rota = $linha['ROTA2'];
			$motid = $linha['COD_MOT2'];
			
			$sql2 = mysqli_query($conexao,"SELECT * FROM CAD_MOTORISTA WHERE COD_MOT = '$motid'");
			if($linha2 = mysqli_fetch_array($sql2)){
				$motname = $linha2['MOT_NAME'];
			}
			
			$placa = $linha['PLACA2'];
			$placa2 = $linha['PLACA2'];
			if($placa2 == ""){$placa2 = "---";}
			$mysqliDateFormat = $linha['DATA_VIAGEM'];
			$mysqliDateFormat = str_replace(" 00:00:00","",$mysqliDateFormat);
			
			$date = date_create_from_format('Y-m-d', $mysqliDateFormat); //cria um formato de data para variável $
			$dataviagem = date_format($date, 'd/m/Y');
			
			$mot = $motname." [".$motid."]";
			
	
	echo "
        <tbody>
          <tr>
            <td><i>$rota</i></td>
            <td>$mot</td>
            <td>$placa2</td>
			<td>$dataviagem</td>

			<td><a href='alterarViagem.php?
			rota=$rota&&
			motid=$$motid&&
			placa=$placa&&
			dataviagem=$dataviagem
			' class='btn-floating pulse blue' style='margin-left: 5px'><i class='small material-icons'>edit</i></a></td>
			<td style='color: darkred'>
			
			<a href='deletarViagem.php?rota=$rota' 
			class='btn-floating pulse #b71c1c red darken-4' style='margin-left: 5px'><i class='small material-icons'>delete</i></a></td>
			
          </tr>
        </tbody>
      
	  ";
				
		}
		echo "</table></div></div><div>";
		
	}else{
		echo "<center><h1>Nenhuma Viagem Encontrada</h1></center>";
	}
?>	

<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
</body>
</html>
