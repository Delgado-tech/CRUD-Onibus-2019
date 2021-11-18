
<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "ONIBUS";

$conexao = mysqli_connect($host,$user,$pass) or die(mysqli_error());
mysqli_select_db($conexao,$banco);
mysqli_set_charset($conexao,'utf8');
			
?>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">
	<title>Surreal Viagens</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

	<body>

<br><br>


	<div class="card-panel teal darken-4">
		<h1 class="center-align" style="margin-right: 80px"><b class="white-text">Selecione Um Assento</b></h1>
	</div>
	<a class="btn tooltipped teal darken-4" href="#" onclick="window.history.go(-1);"><b><b><</b></b></a>
		
	<div class="container">	
	<div class="row">
	<div class="input-field col s5 offset-s3">
	<div class="card-panel teal darken-2"><p><b class="white-text">Motorista</b></p></div>
	<?php	
	$sql = mysqli_query($conexao,"SELECT * FROM CAD_ONIBUS WHERE PLACA='$placa'");
	
	while($linha = mysqli_fetch_array($sql))
		{		
			$num = $linha['NUM_ASSENTO'];
		}
	
	$col = 1; $colspace = 1; $letra = 0;
		
		for($i = 1; $i <= $num; $i++)
		{
			$numAssento = "A".$i;
			if($i < 10){$numAssento = "A0".$i;}
			
			if($col == 7){$letra++;}
			if($col == 7){echo "<br>"; $col = 2;}else{$col++;}
			
			$sql = mysqli_query($conexao,"SELECT *
			FROM LCMT_VIAGEM_PASS
			WHERE NUM_ASSENTO = '$i'
			AND DATA_VIAGEM2='$mysqliDateFormat'
			AND ROTA3='$rotaviagem'") ;
			
			$row = mysqli_num_rows($sql);
			
			if($row > 0){
				
			echo "<a class='btn-flat white-text grey lighten-1'>".$numAssento."</a>";
				
			}else{
			echo "<a href='cadVendasAuth2.php?
			numA=$i&&
			rota=$rotaviagem&&
			cpf=$cpf&&
			data=$mysqliDateFormat&&
			numbag=$numbag&&
			vgmAuto=$vgmAuto&&
			placa=$placa' class='btn-flat black-text teal lighten-2'>".$numAssento."</a>";
			}
			
			
			if($i == 3){echo "<br><br>"; $col = 1;
			}else if($i%3 == 0){echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;";}
			
			if($colspace == 27){echo "<br><br><br>"; $colspace = 4;}else{$colspace++;}
		}
	
	?>
    </div>
	</div>
	</div>
   
		
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	
	
	</body>
</html>


<?php

/*
href='cadVendasAuth2.php?
			numA=$i&&
			rota=$rotaviagem&&
			cpf=$cpf&&
			data=$mysqliDateFormat&&
			numbag=$numbag&&
			vgmAuto=$vgmAuto&&
			placa=$placa
*/
?>