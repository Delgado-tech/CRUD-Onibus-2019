<?php
	if(!session_id())
{
    session_start();
}

if(isset($_SESSION['nascPass'])){$_SESSION['nascPass'] = "";}
?>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">
	
	
	<title>Surreal Viagens</title>
	

	</head>

	<body>
	<br>
	<a class="btn tooltipped" href="#" onclick="window.history.go(-1);"><b><</b></a>
		<h1>Cadastro de Motorista <b class="grey-text text-lighten-1" style="font-size: 20px">[2/2]</b></h1>
		
		  <div class="row"> 
    <form class="col s12" name="formCadUser" method="POST" action="cadMotAuth2.php">
      <div class="row">
		<div class="input-field col s2">
		  <?php
		  include '../inputCNH.php';
		  ?>
        </div>
		
        <div class="input-field col s2">
		  <?php
		  include '../inputCNHvenc.php';
		  ?>
          <label for="datepicker">Vencimento do CNH</label>
        </div></div></div>
		<div class="right-align" style="margin-right:50px;"><input type="submit" value="Enviar" class="btn"></div>
		
		<!-- hiddens -->
		<?php
		
		echo "
		<input type='hidden' value='$motName' name='motName'>
		<input type='hidden' value='$motPhone' name='motPhone'>
		<input type='hidden' value='$motCity' name='motCity'>
		<input type='hidden' value='$motRua' name='motRua'>
		<input type='hidden' value='$motBairro' name='motBairro'>
		<input type='hidden' value='$motNumCasa' name='motNumCasa'>
		<input type='hidden' value='$motState' name='motState'>
		<input type='hidden' value='$mysqliDateFormat' name='motNasc'>
		<input type='hidden' value='$motCEP' name='motCEP'>
		";
		?>
		
	<br><br>
    </form>
  </div>
  
    
   
		
	<!-- Compiled and minified JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" 
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	

	</body>
</html>