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
	<form name="searchUserForm" method="POST" action="results.php">

	<nav>
    <div class="nav-wrapper grey darken-3">
      <form>
        <div class="input-field">
          <input id="search" placeholder="Pesquisar Usuário..." name="navbar" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
    </nav>

	</form>';

	echo"
  
  <a class='btn tooltipped grey darken-3' href='../cadPassMain.php'><b><</b></a>
      
  ";
	
	$sql = mysqli_query($conexao,"SELECT * FROM CAD_PASSAGEIRO ORDER BY PASS_NAME ASC");
	
	$row = mysqli_num_rows($sql);
	
	if($row > 0){
	echo '<h4></h4>';
		
		echo"		
		<div class='center-align'>
		<div class='row'>
        <div class='input-field col s10'>
		<table class='responsive-table'>
        <thead>
          <tr>
              <th>CPF</th>
              <th>Nome</th>
              <th>Cidade</th>
			  <th>Estado</th>
			  <th>Nascimento</th>
			  <th>Observações</th>
			  <th></th>
          </tr>
        </thead>
		";
		$i=1;
		while($linha = mysqli_fetch_array($sql))
		{
			
			$cpf = $linha['CPF'];
			$name = $linha['PASS_NAME'];
			$nasc = $linha['PASS_NASC'];
			$cidade = $linha['CIDADE_P'];
			$estado = $linha['ESTADO_P'];
			$obs = $linha['OBS_PASS'];
			
			//CPF config
			$CPFcomp1 = substr($cpf,0,3);
			$CPFcomp2 = substr($cpf,3,3);
			$CPFcomp3 = substr($cpf,6,3);
			$CPFcomp4 = substr($cpf,9,2);
			
			$cpf = $CPFcomp1.".".$CPFcomp2.".".$CPFcomp3."-".$CPFcomp4;
			
			//Nasc config
			$NASCcomp1 = substr($nasc,0,4);//ano
			$NASCcomp2 = substr($nasc,5,2);//mês
			$NASCcomp3 = substr($nasc,8,2);//dia
			
			$nasc = $NASCcomp3."/".$NASCcomp2."/".$NASCcomp1;
			
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
		/*echo "<p>
		$obsline1<br>
		$obsline2<br>
		$obsline3<br>
		$obsline4<br>
		$obsline5<br>
		$obsline6<br>
		$obsline7<br>
		$obsline8<br>
		$obsline9<br>
		$obsline10<br>
		$obsline11<br>
		$obsline12<br>
		$obsline13<br>
		$obsline14<br>
		$obsline15<br>
		  </p>";*/
		
			
	echo "
        <tbody>
          <tr>
            <td style='color: red'>$cpf</td>
            <td>$name</td>
            <td>$cidade</td>
			<td>$estado</td>
			<td>$nasc</td>
			<td>";
				
		if($obs == "---"){
		echo "<p class='grey-text text-darken-1' 
		style='margin-left:35px;'><b>---</b></p>";
		}else{include '../../obs.php';}
				
			echo "</td>
			
			<td><a href='passPDF.php?
			cpf=$cpf&&
			name=$name&&
			nasc=$nasc&&
			cidade=$cidade&&
			estado=$estado&& 
			obs=$obs
			' class='btn-floating grey darken-3'><i class='small material-icons'>assignment</i></a></td>
			
          </tr>
        </tbody>";
      
		
		}
		
		echo "</table></div></div><div>";
		
	}else{
		echo "<center><h1>Nenhum Passageiro Registrado</h1></center>";
	}
	
		
?>	

<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
</body>
</html>