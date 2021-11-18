

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

	<div class="input-field col s3">
    <select name="PlacaSel">
      <option value="" disabled <?php 
	  
	  if(isset($_SESSION['placa']))
	 {$placaupd = $_SESSION['placa'];}else{$placaupd = "";}

	  if($placaupd == "") echo "selected"; ?>>Escolha a Placa do Ônibus</option>
	  <?php
	  $sql = mysqli_query($conexao,"SELECT * FROM CAD_ONIBUS ORDER BY PLACA ASC");
	  while($linha = mysqli_fetch_array($sql))
	  {
		  $Placa = $linha['PLACA'];
	  ?>
	  
      <option value='<?php echo $Placa; ?>'<?php if($placaupd == $Placa) echo "selected"; ?>><?php echo $Placa; ?></option>
	  
	<?php
	  }
	 ?>
    </select>
    <label>Placa do Ônibus</label>
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