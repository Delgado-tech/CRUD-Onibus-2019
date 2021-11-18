<?php
	if(!session_id())
{
    session_start();
}

if(isset($_SESSION['nascPass'])){$_SESSION['nascPass'] = "";}
if(isset($_SESSION['nascMot'])){$_SESSION['nascMot'] = "";}
if(isset($_SESSION['estado'])){$_SESSION['estado'] = "";}
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
	<a class="btn tooltipped" href="cadMotMain.php"><b><</b></a>
		<h1>Cadastro de Motorista <b class="grey-text text-lighten-1" style="font-size: 20px">[1/2]</b></h1>
		
		  <div class="row"> 
    <form class="col s12" name="formCadUser" method="POST" action="cadMotAuth1.php">
      <div class="row">
        <div class="input-field col s4">
          <input placeholder="Nome Completo" id="nomemot" type="text" class="validate" name="motname">
          <label for="nomemot">Nome</label>
        </div>
		<div class="input-field col s3">
			<input id="motfone" type="text" class="validate" name="motphone">
			<label for="motfone">Telefone</label>
		</div>
		
        <div class="input-field col s2">
		  <?php
		  include '../inputcalendario.php';
		  ?>
          <label for="datepicker">Data de Nascimento</label>
        </div></div>
      
	  
	  <!---->
	
	   		  <!-- -->
			  <div class="card-panel grey lighten-2">
	   <div class="row">
	   <h5><b>Endereço</b></h5>
	   <br>
	   <div class="input-field col s4">
	   <input id="enderecoMot" type="text" class="validate" name="enderecoMot" placeholder='ex: "Luis Caetano Bernardi"'>
			<label for="enderecoMot">Rua</label>
	   </div>
	   
	   <div class="input-field col s3">
	   <input id="bairro" type="text" class="validate" name="bairro" placeholder='ex: "Parque Jataí"'>
			<label for="bairro">Bairro</label>
	   </div>
	   
	   <div class="input-field col s1">
	   <input id="numCasa" type="text" class="validate" name="numCasa" data-length="4">
			<label for="numCasa">Número</label>
	   </div>
	   </div>
	   
	   <div class="row">
	   <div class="input-field col s3">
	   <input id="cepmot" type="text" class="validate" name="cepmot" data-length="8">
			<label for="cepmot">CEP</label>
	   </div>
	   
	   <div class="input-field col s3">
	   <input id="citymot" type="text" class="validate" name="citymot">
			<label for="citymot">Cidade</label>
	   </div>
	   
	   <div class="input-field col s2">
			<?php
				include "../inputestado.php";
			?>
	   </div>
	   
	   </div>
	   
	   </div>
	   <!--Enviar-->
	   <div class="right-align" style="margin-right:50px;"><input type="submit" value="Próximo" class="btn"></div>
		<!---->
 </div>
	
	<br><br>
    </form>
  </div>
  
    
   
		
	<!-- Compiled and minified JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" 
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	
	
	<script>
	document.addEventListener('DOMContentLoaded', function () {
            var textNeedCount = document.querySelectorAll('#numCasa, #cepmot');
            M.CharacterCounter.init(textNeedCount);
	});
	</script>

	</body>
</html>