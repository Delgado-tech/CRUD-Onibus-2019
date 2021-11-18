<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">
	<title>Surreal Viagens</title>
	
	<!--  USER_NAME ,USER_FONE  ,TIPO CHAR (1), -- A - administrador, G - gerente, C - caixa ,USER_ID  ,SENHA-->
</head>

	<body>
	<br>
	<a class="btn tooltipped" href="cadUserMain.php"><b><</b></a>
		<h1>Cadastro de Usuário</h1>
		  <div class="row">
    <form class="col s12" name="formCadUser" method="POST" action="cadUserAuth.php">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Nome e Sobrenome" id="nome_user" type="text" class="validate" name="username">
          <label for="nome_user">Nome</label>
        </div>
        <div class="input-field col s6">
		  <input name="userphone" placeholder="ex: +55 (11)98120-7359 (Usar apenas Números)" id="telefone_user" type="text" class="validate">
          <label for="telefone_user">Telefone</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input name="userid" placeholder="Aviso: você não vai poder alterar esse campo futuramente!" id="apelido_user" type="text" class="validate">
          <label for="apelido_user">Apelido (ID de Usuário)</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="password_user" type="password" class="validate" name="userpass">
          <label for="password_user">Senha</label>
        </div>
		</div>
		
	  <div class="row">
		  <!-- -->
		  
			<h3>Função do Usuário:</h3>
		  <p>
      <label>
        <input name="userfct" type="radio" value="A" checked />
        <span>Administrador</span>
      </label>
    </p>
    <p>
      <label>
        <input name="userfct" type="radio" value="G"/>
        <span>Gerente</span>
      </label>
    </p>
    <p>
      <label>
        <input name="userfct" type="radio"  value="C"/>
        <span>Caixa</span>
      </label>
    </p> 
	<br><br>
		  <div class="right-align" style="margin-right:50px;"><input type="submit" value="Enviar" class="btn #009688 teal"></div>
		  </div>
	<!---->
    </form>
  </div>
  
    
   
		
	<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	</body>
</html>