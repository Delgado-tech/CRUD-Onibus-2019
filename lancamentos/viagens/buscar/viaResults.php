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
$navbar = $_POST['navbar'];

echo'
	<form name="searchUserForm" method="POST" action="viaResults.php">

	<nav>
    <div class="nav-wrapper grey darken-3">
      <form>
        <div class="input-field">
          <input id="search" placeholder="Pesquisar por Viagem..." value="'.$navbar.'" name="navbar" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
    </nav>

	</form>
';
	echo"
  
  <a class='btn tooltipped grey darken-3' href='../cadViagensMain.php'><b><</b></a>
  ";
  
	
	$sql = mysqli_query($conexao,"SELECT * FROM LCMT_VIAGEM WHERE ROTA2 LIKE '%$navbar%' ORDER BY ROTA2 ASC");
	
	$row = mysqli_num_rows($sql);
	
	
	if($row > 0){
	echo '<h4 style="margin: 10px;">Resultado da Pesquisa: "'.$navbar.'"</h4>';
		
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
			  <th></th>
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
			if($placa == ""){$placa = "---";}
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
            <td>$placa</td>
			<td>$dataviagem</td>

			<td><a href='viagemPDF.php?
			rota=$rota&&
			mot=$mot&&
			placa=$placa&&
			dataviagem=$dataviagem&&
			' class='btn-floating grey darken-3'><i class='small material-icons'>assignment</i></a></td>
			
          </tr>
        </tbody>
      
	  ";
				
		}
		echo "</table></div></div><div>";
		
	}else{
		echo "<center><h1>Nenhuma Viagem Registrada</h1></center>";
	}
?>	

<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
</body>
</html>