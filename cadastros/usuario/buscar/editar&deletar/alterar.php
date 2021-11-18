<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">
	<title>Surreal Viagens</title>
	
	<!--  USER_NAME ,USER_FONE  ,TIPO CHAR (1), -- A - administrador, G - gerente, C - caixa ,USER_ID  ,SENHA-->
</head>

	<body>
	
<?php

	$username = filter_input(INPUT_GET, 'username', FILTER_DEFAULT);
	$userid = filter_input(INPUT_GET, 'userid', FILTER_DEFAULT);
	$userphone = filter_input(INPUT_GET, 'userphone', FILTER_DEFAULT);
	$userpass = filter_input(INPUT_GET, 'userpass', FILTER_DEFAULT);
	$userfct = filter_input(INPUT_GET, 'userfct', FILTER_DEFAULT);

echo '
	<br>
	<a class="btn tooltipped" href="editarUser.php"><b><</b></a>
		<h1>Editor de Usuário</h1>
		<h3 style="color: gray" id="useridtitle"><b>#ID: '.$userid.'</b></h3>
		
		  <div class="row">
    <form class="col s12" name="formCadUser" method="POST" action="alterarOK.php">
	<input type="hidden" name="userid" value="'.$userid.'">
      <div class="row">
        <div class="input-field col s6">
          <input value="'.$username.'" placeholder="Nome e Sobrenome" id="nome_user" type="text" class="validate" name="username">
          <label for="nome_user">Nome</label>
        </div>
        <div class="input-field col s6">
		  <input value="'.$userphone.'" name="userphone" placeholder="ex: +55 (11)98120-7359 (Usar apenas Números)" id="telefone_user" type="text" class="validate">
          <label for="telefone_user">Telefone</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input value="'.$userpass.'" id="password_user" type="text" class="validate" name="userpass">
          <label for="password_user">Senha</label>
        </div>
		</div>
		
	  <div class="row">
		  <!-- -->
		  
		 ';
		 
		 if($userfct == "A")
		 {
		 echo ' 
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
	';
		 }
		else if($userfct == "G")
		 {
		 echo ' 
			<h3>Função do Usuário:</h3>
		  <p>
      <label>
        <input name="userfct" type="radio" value="A"/>
        <span>Administrador</span>
      </label>
    </p>
    <p>
      <label>
        <input name="userfct" type="radio" value="G" checked/>
        <span>Gerente</span>
      </label>
    </p>
    <p>
      <label>
        <input name="userfct" type="radio"  value="C"/>
        <span>Caixa</span>
      </label>
    </p> 
	';
		 }
		 else if($userfct == "C")
		 {
		 echo ' 
			<h3>Função do Usuário:</h3>
		  <p>
      <label>
        <input name="userfct" type="radio" value="A"/>
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
        <input name="userfct" type="radio"  value="C" checked/>
        <span>Caixa</span>
      </label>
    </p> 
	';
		 }
	
	echo '
	<br><br>
		  <div class="right-align">
		  <input type="submit" value="Enviar" class="btn #009688 teal">
		  </div>
		  </div>
	<!---->
    </form>
  </div>
';


?>
    
   
		
	<!-- Compiled and minified JQuery -->
<script src="jquery-3.4.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	</body>
</html>