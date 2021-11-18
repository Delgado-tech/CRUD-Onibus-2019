<?php

	if(!session_id())
{
    session_start();
} 
 
 if(isset($_SESSION['rota'])){$_SESSION['rota'] = "";}
 if(isset($_SESSION['placa'])){$_SESSION['placa'] = "";}
 if(isset($_SESSION['mot'])){$_SESSION['mot'] = "";}
 if(isset($_SESSION['dataviagem'])){$_SESSION['dataviagem'] = "";}
 
?>

<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">
	<title>Surreal Viagens</title>
	
	<!--  USER_NAME ,USER_FONE  ,TIPO CHAR (1), -- A - administrador, G - gerente, C - caixa ,USER_ID  ,SENHA-->
</head>

	<body>
	<br>
	<a class="btn tooltipped" href="cadViagensMain.php"><b><</b></a>
		<h1>Cadastrar Viagem</h1>
		  <div class="row">
    <form class="col s12" name="formCadUser" method="POST" action="cadViagensAuth.php">
      <div class="row">
		<?php include "../inputRota.php"; ?>
		<?php include "../inputMot.php"; ?>
		<?php include "../inputPlaca.php"; ?>	
		<div class="input-field col s2">
		<?php include "../inputData.php"; ?>
		<label>Data da Viagem</label>
		</div>
       </div></div>
	   <br>
	   <div class="right-align" style="margin-right:50px;"><input type="submit" value="Enviar" class="btn #009688 teal"></div>
    </form>
  </div>
  
    
   
		
	<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	</body>
</html>