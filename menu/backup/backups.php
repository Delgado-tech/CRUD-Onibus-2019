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
	  
	  
      <h4><b class="grey-text text-darken-3">[Back-Up Realizado com sucesso!]</b></h4>
	  <p style="font-size: 20px" class="grey-text text-darken-3">Perceba que o back-up não foi baixado, ele está salvo no servidor, você deseja ter um cópia em sua máquina?
	  <a href="#" style="font-size: 15px" class="grey-text text-darken-1" onclick="$('.modal').modal('close');"><i>[ Fechar ]</i></a>
    </div>
    <div class="modal-footer">
	  <a href="backup.sql" class="modal-close green-text btn-flat" style="font-size: 20px" download><b class="btn tooltipped green">
	  <i class="tiny material-icons left">file_download</i>Sim</b></a>
    </div>
  </div>

  
	
      <?php
	  
	function backup(){
		
$host = "localhost";
$user = "root";
$pass = "";
$banco = "ONIBUS";
$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());

mysqli_select_db($conexao,$banco) or die(mysqli_error());
mysqli_set_charset($conexao,"utf8");	
		
$tables = array();
$result = mysqli_query($conexao,"SHOW TABLES");

while($row = mysqli_fetch_array($result)){
  $tables[] = $row[0];
}
$tables = array_map("strtoupper",$tables);
$return = '';
$return = "
DROP DATABASE ONIBUS;

CREATE DATABASE ONIBUS;

USE ONIBUS;"."\n\n";

foreach($tables as $table){
	
	if($table != "BACKUPDAY"){
  $result = mysqli_query($conexao,"SELECT * FROM ".strtoupper($table));
  $num_fields = mysqli_num_fields($result);
  
  $row2 = mysqli_fetch_row(mysqli_query($conexao,"SHOW CREATE TABLE ".strtoupper($table)));
  $row2 = array_map("strtoupper",$row2);
  $row2 = str_replace("`","",$row2);
  $return .= "\n\n".$row2[1].";\n\n";
	}
}
  
  foreach($tables as $table){
	    $result = mysqli_query($conexao,"SELECT * FROM ".strtoupper($table));
  $num_fields = mysqli_num_fields($result);
  
  	if($table != "BACKUPDAY"){
  
  for($i=0;$i<$num_fields;$i++){
    while($row = mysqli_fetch_row($result)){
      $return .= "INSERT INTO ".strtoupper($table)." VALUES(";
      for($j=0;$j<$num_fields;$j++){
        $row[$j] = addslashes($row[$j]);
        if(isset($row[$j])){ $return .= "'".$row[$j]."'";}
        else{ $return .= "''";}
        if($j<$num_fields-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }
  $return .= "\n\n\n";
	
	}
  }

//save file
$handle = fopen("backup.sql","w+");
fwrite($handle,$return);
fclose($handle);	

mysqli_query($conexao,"USE ONIBUSBU;");
mysqli_query($conexao,"UPDATE BACKUPDAY SET BACKUPDAY=NOW() WHERE cod_backup = 1;");
mysqli_query($conexao,"USE ONIBUS;");

header("refresh:0;url='backupMain.php?modal=true'");

  
	}
	
	if(isset($_POST['save'])){
		backup();
	}
	
	if(isset($_GET['modal'])){
		echo "<script>
$(document).ready(function(){
    $('.modal').modal();
	$('.modal').modal('open');
  });
  </script>";
	}
  	  
	  ?>
	  
	  <!-- Modal Trigger -->
	  
	    <form name="modal" method="POST" action="backupMain.php">
  <div class="right-align" style="margin-right:10px">
  
  <input type="submit" class="btn modal-trigger green darken-4" value="Back-Up">
  <input type="hidden" value="true" name="save">
	</form>
	
  </div>

  

<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	
	
</body>
</html>