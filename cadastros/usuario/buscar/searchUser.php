<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "ONIBUS";

$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());

mysqli_select_db($conexao,$banco) or die (mysqli_error());
mysqli_set_charset($conexao,"utf8");
?>

<html>
<head>
<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<title>Surreal Viagens</title>
</head>
<body>


	<form name="searchUserForm" method="POST" action="results.php">

	<nav>
    <div class="nav-wrapper grey darken-3">
      <form>
        <div class="input-field">
          <input id="search" placeholder="Pesquisar Usuário..." name="navbar" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
    </nav>

	</form>
<?php
	echo"
  
  <a class='btn tooltipped grey darken-3' href='../cadUserMain.php'><b><</b></a>
      
  ";
	
	$sql = mysqli_query($conexao,"SELECT * FROM CAD_USUARIOS ORDER BY USER_ID ASC");
	
	$row = mysqli_num_rows($sql);
	
	if($row > 0){
	echo "<h4 style='margin: 10px;'>Todos os usuários cadastrados:</h4>";
		
		echo"		
		<div class='center-align'>
		<div class='row'>
        <div class='input-field col s6'>
		<table class='responsive-table'>
        <thead>
          <tr>
              <th>ID do Usuário</th>
              <th>Nome</th>
              <th>Telefone</th>
			  <th>Cargo</th>
			  <th>Senha</th>
			  <th><b></b></th>
          </tr>
        </thead>
		";
		
		while($linha = mysqli_fetch_array($sql))
		{
			$username = $linha['USER_NAME'];
			$userphone = $linha['USER_FONE'];
			$userfct = $linha['TIPO'];
			$userid = $linha['USER_ID'];
			$userpass = $linha['SENHA'];
			
			$userrank = ""; //alterar a sigla do Tipo para palavra Inteira "A" vira Administrador;
			
					if($userfct == "A")
					{$userrank = "Administrador";}
					else if($userfct == "G")
					{$userrank = "Gerente";}
					else if($userfct == "C")
					{$userrank = "Caixa";}
			
	
	echo "
        <tbody>
          <tr>
            <td>$userid</td>
            <td>$username</td>
            <td>$userphone</td>
			<td style='color: red;'>$userrank</td>
			<td>$userpass</td>
			
			<td><a href='userPDF.php?username=$username&&
			userphone=$userphone&&
			userid=$userid&&
			userpass=$userpass&&
			userrank=$userrank' 
			class='btn-floating grey darken-3' style='margin-left: 15px'><i class='material-icons'>assignment</i></a></td>
          </tr>
        </tbody>
      
	  ";
				
		}
		echo "</table></div></div><div>";
		
	}else{
		echo "<center><h1>Nenhum Usuário Registrado</h1></center>";
	}
?>	

<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
</body>
</html>