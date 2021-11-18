<?php
	if(!session_id())
{
    session_start();
}
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
	$placa = filter_input(INPUT_GET, 'placa', FILTER_DEFAULT);
	$placa1 = str_replace("-","",$placa);
	
	$marca = filter_input(INPUT_GET, 'marca', FILTER_DEFAULT);
	$tipo = filter_input(INPUT_GET, 'tipo', FILTER_DEFAULT);
	$anofab = filter_input(INPUT_GET, 'anofab', FILTER_DEFAULT);
	$assentos = filter_input(INPUT_GET, 'assentos', FILTER_DEFAULT);
	$obs = filter_input(INPUT_GET, 'obs', FILTER_DEFAULT);
	
	$_SESSION['marca'] = $marca;
	
	//obs formatation
	if($obs == "---"){$obs = "";}

	
	echo '
	
	<br>
	<a class="btn tooltipped" href="editarBus.php"><b><</b></a>
		<h1>Editor de Ônibus</h1>
		
		  <div class="row"> 
    <form class="col s12" name="formCadUser" method="POST" action="alterarBusOK.php">
      <div class="row">
        <div class="input-field col s2">
          <input placeholder="ex: ABC1234" value="'.$placa1.'" id="placa" type="text" class="validate" name="placa" data-length="7">
          <input value="'.$placa.'" type="hidden" name="placa1">
		  <label for="placa">Placa</label>
        </div>
		<div class="input-field col s2">
			<input id="anofab" type="text" value="'.$anofab.'" class="validate" name="ano_fab" data-length="4">
			<label for="anofab">Ano de Fabricação</label>
		</div>
		
        <div class="input-field col s2">
		  <input name="assentos" id="assents" value="'.$assentos.'" type="text" class="validate" data-length="3">
          <label for="assents">Numero de Assentos</label>
        </div>
      
	  
	  <!---->
		<div class="row">
		<div class="col s2">
            <label>Marca</label>
		';	
	
		include "../../../inputmarca.php"; //utiliza informações externas pegas de um select de Estado;
		//obj de não colocar aqui: reduz memória, pois esse mesmo input pode ser usado em outros códigos;

		echo '
       </div></div></div>
	   		  <!-- -->
		  
		 
		 <div class="row">
			<h3>Tipo de Ônibus:</h3>
			';
			
		if($tipo == "V")
		{	
			echo '
		  <p>
      <label>
        <input name="bustype" type="radio" value="V" checked/>
        <span>Viagem</span>
      </label>
    </p>
    <p>
      <label>
        <input name="bustype" type="radio" value="F"/>
        <span>Fretado</span>
      </label>
    </p>
    <p>
      <label>
        <input name="bustype" type="radio"  value="L"/>
        <span>Leito</span>
      </label>
    </p> ';
		}else if($tipo == "F")
		{	
			echo '
		  <p>
      <label>
        <input name="bustype" type="radio" value="V"/>
        <span>Viagem</span>
      </label>
    </p>
    <p>
      <label>
        <input name="bustype" type="radio" value="F" checked/>
        <span>Fretado</span>
      </label>
    </p>
    <p>
      <label>
        <input name="bustype" type="radio"  value="L"/>
        <span>Leito</span>
      </label>
    </p> ';
		}else if($tipo == "L")
		{	
			echo '
		  <p>
      <label>
        <input name="bustype" type="radio" value="V"/>
        <span>Viagem</span>
      </label>
    </p>
    <p>
      <label>
        <input name="bustype" type="radio" value="F"/>
        <span>Fretado</span>
      </label>
    </p>
    <p>
      <label>
        <input name="bustype" type="radio"  value="L" checked/>
        <span>Leito</span>
      </label>
    </p> ';
		}	
		
	echo'
	
	<!---->
	   </div>
	   
	   <!--Enviar-->
	   <div class="right-align" style="margin-right:50px;"><input type="submit" value="Enviar" class="btn"></div>
		<!---->
	  <div class="row">
        <div class="input-field col s8">
		<div class="card-panel grey lighten-2">
		<h3>Observações:</h3>
          <textarea id="textarea1" class="materialize-textarea" name="busobs" data-length="1000">'.$obs.'</textarea>
        </div></div>
      </div>
	   
	  
	<br><br>
 </div>
	
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
            var textNeedCount = document.querySelectorAll('#placa, #anofab, #assents, #textarea1');
            M.CharacterCounter.init(textNeedCount);
	});
	</script>

	</body>
</html>