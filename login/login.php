<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">
	<title>Login</title>
</head>

<body>
	
	<h1>Surreal Viagens</h1>
	<h5>Login do Funcionário</h5>
	
		  <div class="row">
    <form class="col s12" name="FormLogin" method="POST" action="userAuth.php">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="ID" id="nome_user" name="userid" type="text" class="validate">
          <label for="nome_user">ID do Usuário</label>
        </div>
		</div>
		<div class="row">
        <div class="input-field col s6">
          <input id="password_user" type="password" name="senha" class="validate">
          <label for="password_user">Senha</label>
        </div>
		</div>
		</div><br>
		<center><input type="submit" value="Entrar" name="enviar" class="btn black"></center>
		</form>

	<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
</body>

</html>