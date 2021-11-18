<?php
	if(!session_id())
{
    session_start();
}

if(isset($_SESSION['nascPass'])){unset($_SESSION['nascPass']);}
?>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">
	
	
	<title>Surreal Viagens</title>
	

	</head>

	<body>
	
<?php

$id = filter_input(INPUT_GET, 'Id', FILTER_DEFAULT);
$name = filter_input(INPUT_GET, 'name', FILTER_DEFAULT);
$nasc = filter_input(INPUT_GET, 'nasc', FILTER_DEFAULT);
$cnhvenc = filter_input(INPUT_GET, 'cnhvenc', FILTER_DEFAULT);
$cnhtipo = filter_input(INPUT_GET, 'cnhtipo', FILTER_DEFAULT);
$fone = filter_input(INPUT_GET, 'fone', FILTER_DEFAULT);
$cidade = filter_input(INPUT_GET, 'cidade', FILTER_DEFAULT);
$estado = filter_input(INPUT_GET, 'estado', FILTER_DEFAULT);
$cep = filter_input(INPUT_GET, 'cep', FILTER_DEFAULT);
$rua = filter_input(INPUT_GET, 'rua', FILTER_DEFAULT);
$bairro = filter_input(INPUT_GET, 'bairro', FILTER_DEFAULT);
$numcasa = filter_input(INPUT_GET, 'numcasa', FILTER_DEFAULT);

$_SESSION['nascMot'] = $nasc;
$_SESSION['estado'] = $estado;

$_SESSION['vencCNH'] = $cnhvenc;
$_SESSION['cnh'] = $cnhtipo;

echo '
	<br>
	<a class="btn tooltipped" href="editarMot.php"><b><</b></a>
		<h2>Editor de Motorista <b class="grey-text text-lighten-1" style="font-size: 20px">[1/2]</b></h2>
		<h4 style="color: gray" id="motidtitle"><b>#'.$id.'</b></h4><br>
		
		  <div class="row"> 
    <form class="col s12" name="formCadUser" method="POST" action="alterarMotOK1.php">
		<input type="hidden" value="'.$id.'" name="codmot">
		
      <div class="row">
        <div class="input-field col s4">
          <input value="'.$name.'" placeholder="Nome Completo" id="nomemot" type="text" class="validate" name="motname">
          <label for="nomemot">Nome</label>
        </div>
		<div class="input-field col s3">
			<input value="'.$fone.'" id="motfone" type="text" class="validate" name="motphone">
			<label for="motfone">Telefone</label>
		</div>
		
        <div class="input-field col s2">
		  ';
		  
		  include '../../../inputcalendario.php';
		  
		  echo '
          <label for="datepicker">Data de Nascimento</label>
        </div></div>
      
	  
	  <!---->
	
	   		  <!-- -->
			  <div class="card-panel grey lighten-2">
	   <div class="row">
	   <h5><b>Endereço</b></h5>
	   <br>
	   <div class="input-field col s4">
	   <input value="'.$rua.'" id="enderecoMot" type="text" class="validate" name="enderecoMot" placeholder="ex: "Luis Caetano Bernardi"">
			<label for="enderecoMot">Rua</label>
	   </div>
	   
	   <div class="input-field col s3">
	   <input value="'.$bairro.'" id="bairro" type="text" class="validate" name="bairro" placeholder="ex: "Parque Jataí"">
			<label for="bairro">Bairro</label>
	   </div>
	   
	   <div class="input-field col s1">
	   <input value="'.$numcasa.'" id="numCasa" type="text" class="validate" name="numCasa" data-length="4">
			<label for="numCasa">Número</label>
	   </div>
	   </div>
	   
	   <div class="row">
	   <div class="input-field col s3">
	   <input value="'.$cep.'" id="cepmot" type="text" class="validate" name="cepmot" data-length="8">
			<label for="cepmot">CEP</label>
	   </div>
	   
	   <div class="input-field col s3">
	   <input value="'.$cidade.'" id="citymot" type="text" class="validate" name="citymot">
			<label for="citymot">Cidade</label>
	   </div>
	   
	   <div class="input-field col s2">
	   ';
			
				include "../../../inputestado.php";
			echo '
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
  ';
  ?>
    
   
		
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