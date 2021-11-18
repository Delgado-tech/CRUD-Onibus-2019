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
	  
	  
      <h4><b class="grey-text text-darken-3">[Sobre]</b></h4>
	  <p style="font-size: 20px" class="grey-text text-darken-3">A Surreal Viagens é uma empresa recente criada em 2019, que pretender 
	  ser proativa e eficiente no mercado de trabalho, com funcionários dedicados trazendo um atendimento de 24 horas em dias úteis, a principio
	  a empresa tende a conseguir a melhor nota dos viajantes ('MB'), por-favor nos avalie na 4º nota bimestral!</p>
	  <a href="#" style="font-size: 15px" class="grey-text text-darken-1" onclick="$('.modal').modal('close');"><i>[ Fechar ]</i></a>
    </div>
    <div class="modal-footer">
    </div>
  </div>
 <!-- Modal Structure -->
  
  <?php
  
  if(isset($_GET['modal'])){
	  echo "<script>
$(document).ready(function(){
    $('.modal').modal();
	$('.modal').modal('open');
  });
  </script>";
  }
  
  ?>


<ul id="dropdown1" class="dropdown-content grey darken-3">
    <li><a href="../cadastros/motorista/cadMotMain.php">Motoristas</a></li>
	<li class="divider teal darken-3"></li>
	<li><a href="../cadastros/onibus/cadBusMain.php">Ônibus</a></li>
	<li class="divider teal darken-3"></li>
	<li><a href="../cadastros/passageiro/cadPassMain.php">Passageiros</a></li>
	<li class="divider teal darken-3"></li>
	<li><a href="../cadastros/percursos/cadPerMain.php">Percursos</a></li>
	<li class="divider teal darken-3"></li>
	<li><a href="../cadastros/usuario/cadUserMain.php">Usuários</a></li> 
</ul>

<ul id="dropdown2" class="dropdown-content grey darken-3">
    <li><a href="../lancamentos/viagens/cadViagensMain.php">Viagens</a></li>
	<li class="divider teal darken-3"></li>
	<li><a href="../lancamentos/passagens/cadVendaMain.php">Vendas de Passagens</a></li>

</ul>

<ul id="dropdown3" class="dropdown-content grey darken-3">
    <li><a href="backup/backupMain.php">Back-Up</a></li>
	<li class="divider teal darken-3"></li>
	<li><a href="backup/loadMain.php">Load</a></li>
	<li class="divider teal darken-3"></li>
	<li><a href="menupg.php?modal=true">Sobre</a></li>
</ul>

<div class="row">
<div class="row">
<div class="input-field col s12">
<nav>
  <div class="nav-wrapper grey darken-3">
    <a href="#!" class="brand-logo center" style="font-family: 'COMIC SANS MS'">Surreal Viagens</a>
    <ul class="left hide-on-med-and-down">
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Cadastros<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Lançamentos<i class="material-icons right">arrow_drop_down</i></a></li>
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown3">Ajuda<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>

  </div>
</nav>
	<?php 
	  include "slidermenu.php";
	  ?>
	  
	  
<div class="row">
<div class="input-field col s12">

    <div class="section white">
      <div class="row container">
        <h2 class="header" style="margin-left: 10px"><b>Bem Vindo ao portal para Funcionários!</b></h2>
		<p class="grey-text text-darken-3" style="margin-left: 10px; font-size: 30px;"></p>
		<p class="grey-text text-darken-3" style="margin-left: 10px; font-size: 30px;">O portal funcionário é utilizado para o registro e 
		a verificação de Informações.</p>
		
		
		<p class="grey-text text-darken-3" style="margin-left: 10px; font-size: 25px;">
		Lembre-se que o site está em Beta e futuros erros ou "Bugs" podem vir a ocorrer, caso isso aconteça
		favor entrar em contato com o Hospedador do Site (EmailGenérico@gmail.com).</p>
		
		<p class="grey-text text-darken-3" style="margin-left: 10px; font-size: 25px;">
		Ambos funcionários devem estabeler respeito e serem profissionais na utilização desse portal, tendo sempre em mente
		que a Surreal Viagens é uma empresa de locomoção via ônibus sendo uma das empresas mais qualificadas para o mercado, 
		que sempre preza sua imagem e tenta entregar tudo á prazo.</p>
		
        <br><br>
      </div>
    </div>
    <div class="parallax-container">
      <div class="parallax"><img src="img/onibus4.jpg"></div>
    </div>
	<div class="section white">
      <div class="row container">
        <h2 class="header" style="margin-left: 10px"><b>Notas do Patch:</b></h2>
		<p class="grey-text text-darken-3" style="margin-left: 10px; font-size: 30px;"></p>
		
		<p class="grey-text text-darken-3" style="margin-left: 10px; font-size: 25px;">
		07 de novembro - Formatação do Site;</p>
		
		<p class="grey-text text-darken-3" style="margin-left: 10px; font-size: 25px;">
		15 de novembro - Campo data de registro eliminada do cadastro Usuários;</p>
		
		<p class="grey-text text-darken-3" style="margin-left: 10px; font-size: 25px;">
		26 de novembro - Adição de nova interface ao Menu príncipal;</p>
		
		<p class="grey-text text-darken-3" style="margin-left: 10px; font-size: 25px;">
		30 de novembro - Correção de Bugs ["10 eliminados"];</p>
		
		<p class="grey-text text-darken-3" style="margin-left: 10px; font-size: 25px;">
		11 de novembro - Se chegou até aqui, por obséquio vossa senhoria poderia estabelecer
		um valor que será submetido a 4º nota bimensal, onde tal valor é reconhecido pela sigla "MB"?;</p>
		
		
        <br><br><br><br><br><br>
		
		
      </div>
    </div>
	  <div class="card-panel grey lighten-2">
		<p class="center-align grey-text text-darken-3" style="margin-left: 10px; font-size: 25px;">
		<b style="font-size: 18px;" class="grey-text text-darken-1">Empresa de Ônibus - Trabalho PPWI/MDBD</b>
		<br>Realizado pelos alunos <b>Leonardo Felipe</b> & <b>Jhonatan Melo</b> do 2ºETIMIPI</p>
		</div>
	  </div></div></div>
	  
	



<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	
	<script>
	
	
	$(document).ready(function(){
    $('.parallax').parallax();
  });
	
	$(document).ready(function(){
    $(".dropdown-trigger").dropdown();
  });
	</script>
</body>
</html>