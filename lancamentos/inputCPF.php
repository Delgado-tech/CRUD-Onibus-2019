<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "ONIBUS";
$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());

mysqli_select_db($conexao,$banco) or die(mysqli_error());
mysqli_set_charset($conexao,"utf8");

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
    <select name="cpfSel">
      <option value="" disabled <?php 
	  
	  if(isset($_SESSION['cpf']))
	 {$cpfupd = $_SESSION['cpf'];}else{$cpfupd = "";}

	  if($cpfupd == "") echo "selected"; ?>>Selecione um Passageio</option>
	  
	  <?php
	  $sql = mysqli_query($conexao,"SELECT * FROM CAD_PASSAGEIRO ORDER BY PASS_NAME ASC");
	  while($linha = mysqli_fetch_array($sql))
	  {
		  $nomepass = $linha['PASS_NAME'];
		  $cpfpass = $linha['CPF'];
      ?>
	  
      <option value='<?php echo $cpfpass; ?>'<?php if($cpfupd == $cpfpass) echo "selected"; ?>><?php echo $nomepass; ?></option>
	  
	<?php
	  }
	 ?>
    </select>
    <label>Passageiro</label>
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