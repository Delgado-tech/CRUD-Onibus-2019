

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
    <select name="RotaSel">
      <option value="" disabled <?php 
	  
	  if(isset($_SESSION['rota']))
	 {$rotaupd = $_SESSION['rota'];}else{$rotaupd = "";}

	  if($rotaupd == "") echo "selected"; ?>>Escolha uma Rota para a viagem</option>
	  <?php
	  $sql = mysqli_query($conexao,"SELECT * FROM CAD_PERCURSO ORDER BY ROTA ASC");
	  while($linha = mysqli_fetch_array($sql))
	  {
		  $Rota = $linha['ROTA'];
	  ?>
	  
      <option value='<?php echo $Rota; ?>'<?php if($rotaupd == $Rota) echo "selected"; ?>><?php echo $Rota; ?></option>
	  
	<?php
	  }
	 ?>
    </select>
    <label>Rota</label>
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