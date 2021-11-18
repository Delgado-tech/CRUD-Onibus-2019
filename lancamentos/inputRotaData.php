

<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "ONIBUS";
$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());

mysqli_select_db($conexao,$banco) or die(mysqli_error());
mysqli_set_charset($conexao,"utf8");

?>

<?php

	if(!session_id())
{
    session_start();
} 

?>

<html>
<head>
<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<title>Surreal Viagens</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

	<div class="input-field col s4">
    <select name="ViagemSel">
      <option value="" disabled <?php 
	  
	  $Data = 0;
	  
	  if(isset($_SESSION['rotadata']))
	 {$rotadataupd = $_SESSION['rotadata'];}else{$rotadataupd = "";}

	  if($rotadataupd == "") echo "selected"; ?>>Escolha uma Viagem Cadastrada</option>
	  <?php
	  $sql = mysqli_query($conexao,"SELECT * FROM LCMT_VIAGEM ORDER BY ROTA2 ASC");
	  while($linha = mysqli_fetch_array($sql))
	  {
		  $Rota = $linha['ROTA2'];
		  $sql2 = mysqli_query($conexao,"SELECT * FROM LCMT_VIAGEM WHERE ROTA2 = '$Rota' AND DATA_VIAGEM != '$Data'");
		  $row = mysqli_num_rows($sql2);
		  if($row > 0)
		  {
			  if($linha2 = mysqli_fetch_array($sql2))
			  {
				  $Data = $linha2['DATA_VIAGEM'];
				  $Data = str_replace(" 00:00:00","",$Data);
				  
			$date = date_create_from_format('Y-m-d', $Data); //cria um formato de data para variável $
			$DateFormat = date_format($date, 'd/m/Y'); //formata data em padrão US a qual o mysli lê;
			
			  }
		  }
		  $RotaData = $Rota." [".$DateFormat."]";
		  $RotaDataVal = $Rota." --".$DateFormat;
		  
		  
	  ?>
	  
      <option value='<?php echo $RotaDataVal; ?>'<?php if($rotadataupd == $RotaData) echo "selected"; ?>><?php echo $RotaData; ?></option>
	  
	<?php
	  }
	 ?>
    </select>
    <label>Viagem</label>
  </div>
  

<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	
	<script>
	$(document).ready(function(){
    $('select').formSelect();
  });
	</script>
	
</body>
</html>