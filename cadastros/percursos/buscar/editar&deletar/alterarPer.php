<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">

	<title>Surreal Viagens</title>

	</head>

	<body>
<?php

$ROTA = filter_input(INPUT_GET, 'rota', FILTER_DEFAULT);
$rotaPos = strrpos($ROTA,"-");

$saida = substr($ROTA,0,($rotaPos - 1));
$destino = substr($ROTA,($rotaPos + 2),(strlen($ROTA) - $rotaPos));

$PER_TEMP = filter_input(INPUT_GET, 'pertemp', FILTER_DEFAULT);
$PASS_VALOR = filter_input(INPUT_GET, 'passvalor', FILTER_DEFAULT);
$PASS_BAG = filter_input(INPUT_GET, 'passbag', FILTER_DEFAULT);
$QTDE_MOT = filter_input(INPUT_GET, 'qtdemot', FILTER_DEFAULT);

$OPEN_VENDAS = filter_input(INPUT_GET, 'openvenda', FILTER_DEFAULT);
if($OPEN_VENDAS == "Sim"){$checked = "checked";}else{$checked = "";}
		

echo '
	<br>
	<a class="btn tooltipped" href="editarPer.php"><b><</b></a>
		<h1>Editor de Percurso</h1>
		
		  <div class="row"> 
    <form class="col s12" name="formCadUser" method="POST" action="alterarPerOK.php">
	
	<input type="hidden" value="'.$ROTA.'" name="rota2">
	
      <div class="row">
        <div class="input-field col s4">
          <input placeholder="Ponto de saída do Ônibus (ex: Av. Nogueira Padilha)" 
		  id="saidaPer" type="text" class="validate" name="saidaPer" value="'.$saida.'">
          <label for="saidaPer">Saída</label>
        </div>
		<div class="input-field col s4">
          <input placeholder="Ponto de chegada do Ônibus (ex: rua: Jardim Europa)" 
		  id="destinoPer" type="text" class="validate" name="destinoPer" value="'.$destino.'">
          <label for="destinoPer">Destino</label>
        </div>
		<div class="input-field col s2">
          <input value="'.$PER_TEMP.'" placeholder="(Usar apenas Números)" 
		  id="tempoPer" type="text" class="validate" name="tempoPer" onkeyup="tempo();" data-length="10">
          <label for="tempoPer">Tempo Estimado [Minutos]</label>  
        </div>
		</div>
		
		<div class="row">
        <div class="input-field col s2">
          <input value="'.$PASS_VALOR.'" 
		  id="custoPer" value="0,00" type="text" class="validate" name="custoPer" onkeyup="dinheiro();">
          <label for="custoPer">Preço da Passagem R$</label>
        </div>
		<div class="input-field col s2">
          <input value="'.$PASS_BAG.'"
		  id="custoBagPer" value="0,00" type="text" class="validate" name="custoBagPer" onkeyup="dinheiro2();">
          <label for="custoBagPer">Preço da Bagagem [unid.] R$</label>
        </div>
		</div>
		
		 <!--Enviar-->
	   <div class="right-align" style="margin-right:50px;"><input type="submit" value="Enviar" class="btn"></div>
		<!---->
		
		<div class="row">
		<div class="input-field col s2">
		<fieldset><legend>
			<b class="card-painel teal white-text"> Quantidade de Motoristas </b></legend>
          <input id="motqntd" value="'.$QTDE_MOT.'" type="text" name="motqntd" data-length="2">
			</fieldset>
		<p id="row1"></p>
		
		
		</div>
		<div class="input-field col s2">
		
		<p><label>
		<input type="checkbox" name="openvendas" class="filled-in" '.$checked.'/>
        <span style="font-size: 15px;"><b>Open Vendas</b></span>
		</label></p>
		
		</div>
		</div>
	  
 </div>
	
	<br><br>
    </form>

  ';
  ?>
  
  <!-- DEBUG
  		echo $ROTA."<br>";
		echo $PER_TEMP."<br>";
		echo $PASS_VALOR."<br>";
		echo $PASS_BAG."<br>";
		echo $QTDE_MOT."<br>";
		echo $OPEN_VENDAS."<br>";
  -->
  
	<!-- Compiled and minified JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" 
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>

	<script>

function tempo() {
  var tempo = document.getElementById('tempoPer');
  
  var valorT = tempo.value;
  
  
 valorT = valorT + '';
 valorT = parseInt(valorT.replace(/[\D]+/g,''));
 valorT = valorT + '';

	valorT = valorT.replace(/([0-9]{0})$/g, "$1 min");

	if (valorT == "NaN" || valorT == "NaN min" || valorT == "0 min") {
		valorT = "1 min";
	} if (valorT.length > 10) {
     valorT = "1 min";
  }

  tempo.value = valorT;
}

function dinheiro() {
  var dinheiro = document.getElementById('custoPer');
  
  var valor = dinheiro.value;
  
  
 valor = valor + '';
 valor = parseInt(valor.replace(/[\D]+/g,''));
 valor = valor + '';


	if (valor == "NaN" || valor == "0") {
		valor = "000";
	}
  if (valor.length > 2) {
    valor = valor.replace(/([0-9]{2})$/g, ",$1");
  }  if (valor.length > 6) {
     valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
  } if (valor.length > 10) {
     valor = "0,00";
  }


  dinheiro.value = valor;
}


function dinheiro2() {
  var dinheiro2 = document.getElementById('custoBagPer');
  
  var valor2 = dinheiro2.value;
  
  
 valor2 = valor2 + '';
 valor2 = parseInt(valor2.replace(/[\D]+/g,''));
 valor2 = valor2 + '';


	if (valor2 == "NaN" || valor2 == "0") {
		valor2 = "000";
	} 
  if (valor2.length > 2) {
    valor2 = valor2.replace(/([0-9]{2})$/g, ",$1");
  }  if (valor2.length > 6) {
     valor2 = valor2.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
  } if (valor2.length > 9) {
     valor2 = "0,00";
  }


  dinheiro2.value = valor2;
}

</script>



	<script>
	document.addEventListener('DOMContentLoaded', function () {
            var textNeedCount = document.querySelectorAll('#motqntd');
            M.CharacterCounter.init(textNeedCount);
	});
	</script>

	</body>
</html>