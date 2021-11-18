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
    <select name="MotSel">
      <option value="" disabled <?php 
	  
	  if(isset($_SESSION['mot']))
	 {$motidupd = $_SESSION['mot'];}else{$motidupd = "";}

	  if($motidupd == "") echo "selected"; ?>>Escolha o Motorista Principal da Viagem</option>
	  
	  <?php
	  $sql = mysqli_query($conexao,"SELECT * FROM CAD_MOTORISTA ORDER BY MOT_NAME ASC");
	  while($linha = mysqli_fetch_array($sql))
	  {
		  $nomemot = $linha['MOT_NAME'];
		  $codmot = $linha['COD_MOT'];
      ?>
	  
      <option value='<?php echo $codmot; ?>'<?php if($motidupd == $codmot) echo "selected"; ?>><?php echo $nomemot; ?></option>
	  
	<?php
	  }
	 ?>
    </select>
    <label>Motorista</label>
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