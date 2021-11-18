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

<!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
	  
	  
      <h4><b class="grey-text text-darken-3">[Aviso!]</b></h4>
	  <p style="font-size: 20px" class="grey-text text-darken-3">Tem certeza que deseja sobrepor o banco de dados atual?<br>
	  <a href="#" style="font-size: 15px" class="grey-text text-darken-1" onclick="$('.modal').modal('close');"><i>[ Fechar ]</i></a>
    </div>
    <div class="modal-footer">
	
	<?php
	if(isset($_GET['modal1'])){
		
		echo '
	  <a href="loadMain.php?reset=true" class="modal-close green-text btn-flat" style="font-size: 20px"><b class="btn tooltipped red">
	  <i class="tiny material-icons left">autorenew</i>Resetar</b></a>
	  ';
	  
	}else if(isset($_GET['modal2'])){
		
		echo '
		<a href="loadMain.php?load1=true" class="modal-close green-text btn-flat" style="font-size: 20px"><b class="btn tooltipped red">
	  <i class="tiny material-icons left">cloud_upload</i>Carregar</b></a>
	  ';
	}
	?>
	
    </div>
  </div>

  
	
      <?php
	  
	function loadDB(){
		
$host = "localhost";
$user = "root";
$pass = "";
$banco = "ONIBUS";
$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());

mysqli_select_db($conexao,$banco) or die(mysqli_error());
mysqli_set_charset($conexao,"utf8");	
		

$filename = 'backup.sql';
$handle = fopen($filename,"r+");
$contents = fread($handle,filesize($filename));
$sql = explode(';',$contents);
foreach($sql as $query){
  $result = mysqli_query($conexao,$query);
  
}
fclose($handle);

 echo "<script>setTimeout(function(){alert('Último Backup feito Carregado com Sucesso!');}, 700);</script>";
  
}
	//------------------------reset
	function resetDB(){
		
$host = "localhost";
$user = "root";
$pass = "";
$banco = "ONIBUS";
$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());

mysqli_select_db($conexao,$banco) or die(mysqli_error());
mysqli_set_charset($conexao,"utf8");	
		

$filename = 'reset.sql';
$handle = fopen($filename,"r+");
$contents = fread($handle,filesize($filename));
$sql = explode(';',$contents);
foreach($sql as $query){
  $result = mysqli_query($conexao,$query);
  
}
fclose($handle);

 echo "<script>setTimeout(function(){alert('Banco de Dados Resetado com Sucesso!');}, 700);</script>";
  
}
	
	//----------------------------------------
	
	if(isset($_GET['load1'])){
		loadDB();
	}
	
	if(isset($_GET['reset'])){
		resetDB();
	}
	
	if(isset($_GET['modal1']) || isset($_GET['modal2'])){
		echo "<script>
$(document).ready(function(){
    $('.modal').modal();
	$('.modal').modal('open');
  });
  </script>";
	}
  	  
	  ?>
	  
	  <!-- Modal Trigger -->
	  
  <div class="right-align" style="margin-right:10px">
  <a href="loadMain.php?modal1=true" class="btn tooltipped red darken-4">Reset</a>
  
  <a class="btn modal-trigger red darken-2" href="loadMain.php?modal2=true">Load</a>
 
	
  </div>

  

<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	
	
</body>
</html>