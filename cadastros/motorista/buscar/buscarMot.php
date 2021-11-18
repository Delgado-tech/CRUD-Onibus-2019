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
	<form name="searchUserForm" method="POST" action="motResults.php">

	<nav>
    <div class="nav-wrapper grey darken-3">
      <form>
        <div class="input-field">
          <input id="search" placeholder="Pesquisar Motorista..." name="navbar" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
    </nav>

	</form>';

	echo"
  
  <a class='btn tooltipped grey darken-3' href='../cadMotMain.php'><b><</b></a>
      
  ";
	
	$sql = mysqli_query($conexao,"SELECT * FROM CAD_MOTORISTA ORDER BY MOT_NAME ASC");
	
	$row = mysqli_num_rows($sql);
	
	if($row > 0){
	echo '<h4></h4>';
		
		echo"		
		<div class='center-align'>
		<div class='row'>
        <div class='input-field col s11'>
		<table class='responsive-table'>
        <thead>
          <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Telefone</th>
			  <th>Tipo do CNH</th>
			  <th>Venc. CNH</th>
			  <th>Nascimento</th>
			  <th>Endereço</th>
			  <th></th>
          </tr>
        </thead>
		";
		$i=1;
		while($linha = mysqli_fetch_array($sql))
		{
			
			$Id = $linha['COD_MOT'];
			$name = $linha['MOT_NAME'];
			$nasc = $linha['MOT_NASC'];
			$cnhvenc = $linha['CNH_VENC'];
			$cnhtipo = $linha['CNH_TIPO'];
			$fone = $linha['FONE_M'];
			//Endereço
			$cidade = $linha['CIDADE_M'];
			$estado = $linha['ESTADO_M'];
			$cep = $linha['CEP_M'];
			$rua = $linha['ENDERECO_M'];
			$bairro = $linha['BAIRRO_M'];
			$numcasa = $linha['NUMERO_M'];
			
			//Nasc config
			$NASCcomp1 = substr($nasc,0,4);//ano
			$NASCcomp2 = substr($nasc,5,2);//mês
			$NASCcomp3 = substr($nasc,8,2);//dia
			
			$nasc = $NASCcomp3."/".$NASCcomp2."/".$NASCcomp1;
			
			//CNHVENC config
			$CNHcomp1 = substr($cnhvenc,0,4);//ano
			$CNHcomp2 = substr($cnhvenc,5,2);//mês
			$CNHcomp3 = substr($cnhvenc,8,2);//dia
			
			$cnhvenc = $CNHcomp3."/".$CNHcomp2."/".$CNHcomp1;
			
			//Obs config
		$obsline1 = "<b style='font-size: 20px' class='grey-text text-darken-3'>[Endereço]</b>";
		$obsline2 = "<b style='font-size: 12px' class='grey-text text-ligthen-2'>Rua: </b>".substr($rua,0,70);
		$obsline3 = "<b style='font-size: 12px' class='grey-text text-ligthen-2'>Nº: </b>".substr($numcasa,0,70);
		$obsline4 = "<b style='font-size: 12px' class='grey-text text-ligthen-2'>Bairro: </b>".substr($bairro,0,70);
		$obsline5 = "<b style='font-size: 12px' class='grey-text text-ligthen-2'>Cidade: </b>".substr($cidade,0,70);
		$obsline6 = "<b style='font-size: 12px' class='grey-text text-ligthen-2'>Estado: </b>".substr($estado,0,70);
		$obsline7 = "<b style='font-size: 12px' class='grey-text text-ligthen-2'>CEP: </b>".substr($cep,0,70);
		$obsline8 = "";
		$obsline9 = "";
		$obsline10 = "";
		$obsline11 = "";
		$obsline12 = "";
		$obsline13 = "";
		$obsline14 = "";
		$obsline15 = "";
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
            <td style='color: red'>#$Id</td>
            <td>$name</td>
			<td>$fone</td>
            <td><p style='margin-left: 50px'>$cnhtipo</p></td>
			<td>$cnhvenc</td>
			<td>$nasc</td>
			<td>";
				
		include '../../obs.php';
				
			echo "</td>
			
			</td>
			<td><a href='motPDF.php?Id=$Id&& 
			name=$name&&
			nasc=$nasc&&
			cnhvenc=$cnhvenc&&
			cnhtipo=$cnhtipo&&
			fone=$fone&&
			cidade=$cidade&&
			estado=$estado&&
			cep=$cep&&
			rua=$rua&&
			bairro=$bairro&&
			numcasa=$numcasa
			' class='btn-floating grey darken-3' style='margin-left: 10px'><i class='small material-icons'>assignment</i></a></td>
			
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