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
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<title>Surreal Viagens</title>
</head>
<body>

<?php
	
	echo '
	<form name="searchUserForm" method="POST" action="perResults.php">

	<nav>
    <div class="nav-wrapper brown darken-3">
      <form>
        <div class="input-field">
          <input id="search" placeholder="Pesquisar Percurso..." name="navbar" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
    </nav>

	</form>';

	echo"
  
  <a class='btn tooltipped brown darken-3' href='../../cadPerMain.php'><b><</b></a>
      
  ";
	
	$sql = mysqli_query($conexao,"SELECT * FROM CAD_PERCURSO ORDER BY ROTA ASC");
	
	$row = mysqli_num_rows($sql);
	
	if($row > 0){
	echo '<h4></h4>';
		
		echo"		
		<div class='center-align'>
		<div class='row'>
        <div class='input-field col s12'>
		<table class='responsive-table'>
        <thead>
          <tr>
              <th><br>Rota</th>
              <th><br>Duração</th>
              <th><br>Preço</th>
			  <th>Bagagem <br>[unid.]</th>
			  <th>Quantidade <br>de Motorista</th>
			  <th>Troca <br>de Motorista</th>
			  <th><br>Open Vendas</th>
			  <th style='color: #009688'>Editar</th>
			  <th style='color: #009688'>Deletar</th>
          </tr>
        </thead>
		";
		
		while($linha = mysqli_fetch_array($sql))
		{
			
			$ROTA = $linha['ROTA'];
			$PER_TEMP = $linha['PER_TEMP'];
			$TEMP_AROUND = $linha['PER_TEMP'];
			
			include "../../../removeSpecialChar.php";
			$TEMP_Num = preg_replace($arrFrom,"",$PER_TEMP);
			
			if($TEMP_Num > 59){
				
				if($TEMP_Num > 1439){
				$TEMP_Num = intval($TEMP_Num) / 1440;
				$TEMP_AROUND = round($TEMP_Num)." Dia";
				if(round($TEMP_Num) > 1){$TEMP_AROUND = round($TEMP_Num)." Dias";}
				
				}
				else{
				$TEMP_Num = intval($TEMP_Num) / 60;
				$TEMP_AROUND = round($TEMP_Num)." Hora";
				if($TEMP_Num > 1){$TEMP_AROUND = round($TEMP_Num)." Horas";}
				}
			}
			
			$TROCAR_MOT = $linha['TROCAR_MOT'];
			if($TROCAR_MOT == "S"){$TROCAR_MOT = "Sim";}else{$TROCAR_MOT = "Não";}
				
			$QTDE_MOT = $linha['QTDE_MOT'];
			
			$OPEN_VENDAS = $linha['OPEN_VENDAS'];
			if($OPEN_VENDAS == "S"){$OPEN_VENDAS = "Sim";}else{$OPEN_VENDAS = "Não";}
			
			
			
			
			//----------valor Passageiro
			$PASS_VALOR = $linha['PASS_VALOR']; //ex: 10000.00
			$PASS_VALOR = str_replace(".",",",$PASS_VALOR);//10000,00
			
			$valorPosition = strrpos($PASS_VALOR,",");//6pos
			$PASS_VALOR0 = substr($PASS_VALOR,0,($valorPosition - 3));//10
			$PASS_VALOR1 = substr($PASS_VALOR,($valorPosition - 3),7);//000,00
			
			$PASS_VALOR3 = "R$ ".$PASS_VALOR;
			
			if(strlen($PASS_VALOR)> 6){
			$PASS_VALOR2 = "<b class='brown-text text-darken-4'>R$ ".$PASS_VALOR0.".".$PASS_VALOR1."</br>";}
			else{$PASS_VALOR2 = "<b class='brown-text text-darken-4'>R$ ".$PASS_VALOR."</b>";}
			
			if($PASS_VALOR3 == "R$ 0,00")
			{$PASS_VALOR2 = "<b class='brown-text text-lighten-4'>[Grátis]</b>";}
			
			
			//-----------valor bag
			$PASS_BAG = $linha['PASS_BAG'];
			
			$PASS_BAG = str_replace(".",",",$PASS_BAG);//10000,00
			
			$bagPosition = strrpos($PASS_BAG,",");//6pos
			$BAG_VALOR0 = substr($PASS_BAG,0,($bagPosition - 3));//10
			$BAG_VALOR1 = substr($PASS_BAG,($bagPosition - 3),7);//000,00
			
			$PASS_BAG3 = "R$ ".$PASS_BAG;
			
			if(strlen($PASS_BAG)> 6){
			$PASS_BAG2 = "<b class='brown-text text-darken-4'>R$ ".$BAG_VALOR0.".".$BAG_VALOR1."</br>";}
			else{$PASS_BAG2 = "<b class='brown-text text-darken-4'>R$ ".$PASS_BAG."</b>";}
			
			if($PASS_BAG3 == "R$ 0,00")
			{$PASS_BAG2 = "<b class='brown-text text-lighten-4'>[Grátis]</b>";}

		
			
	echo "
        <tbody>
          <tr>
            <td><i>$ROTA</i></td>
            <td>$TEMP_AROUND</td>
            <td>$PASS_VALOR2</td>
			<td>$PASS_BAG2</td>
			<td>$QTDE_MOT</td>
			<td>$TROCAR_MOT</td>
			<td>$OPEN_VENDAS</td>
			
			<td><a href='alterarPer.php?rota=$ROTA&&
			pertemp=$PER_TEMP&&
			passvalor=$PASS_VALOR&&
			passbag=$PASS_BAG&&
			qtdemot=$QTDE_MOT&&
			openvenda=$OPEN_VENDAS' class='btn-floating pulse blue' style='margin-left: 10px'><i class='small material-icons'>edit</i></a></td>
			<td style='color: darkred'>
			
			<a href='deletarPer.php?rota=".$ROTA."' 
			class='btn-floating pulse #b71c1c red darken-4' style='margin-left: 10px'><i class='small material-icons'>delete</i></a></td>
			
          </tr>
        </tbody>";
      
		
		}
		
		echo "</table></div></div><div>";
		
	}else{
		echo "<center><h1>Nenhum Percurso Criado</h1></center>";
	}
	
		
?>	

<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
</body>
</html>