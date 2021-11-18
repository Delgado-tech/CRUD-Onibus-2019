<?php

	if(!session_id())
{
    session_start();
} 
   
?>

<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs
	/materialize/1.0.0/css/materialize.min.css">
	
</head>
<body>	

<?php



if(isset($_SESSION["vencCNH"])){$data2 = $_SESSION["vencCNH"];}else{$data2 = "";}

echo'
<input type="text" class="datepicker" name="dataCNH" value="'.$data2.'" id="datepicker2" class="validate">
';

?>

<script src="jquery-3.4.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	
<?php 

$today = getdate();//função pega os dados de data e hora em array;
$today = $today['year'];
$today = intval($today);

echo "
<script>	   
    const Calender2 = document.querySelector('.datepicker');
	M.Datepicker.init(Calender2,{
		format:'dd/mm/yyyy',
		autoClose: true,
		yearRange: 30,
		minYear: ".$today.",
		maxYear: 2050,
	showClearBtn:true,
	i18n: {
			months:[
  'Janeiro',
  'Fevereiro',
  'Março',
  'Abril',
  'Maio',
  'Junho',
  'Julho',
  'Agosto',
  'Setembro',
  'Outubro',
  'Novembro',
  'Dezembro'
],
	monthsShort: [
  'Jan',
  'Fev',
  'Mar',
  'Abr',
  'Maio',
  'Jun',
  'Jul',
  'Ago',
  'Set',
  'Out',
  'Nov',
  'Dez'
],
	weekdays:[
  'Domingo',
  'Segunda',
  'Terça',
  'Quarta',
  'Quinta',
  'Sexta',
  'Sabado'
],
	weekdaysShort:[
  'Dom',
  'Seg',
  'Ter',
  'Qua',
  'Qui',
  'Sex',
  'Sab'
],
	weekdaysAbbrev: ['D','S','T','Q','Q','S','S'],
            cancel: 'Cancelar',
            clear: 'Limpar',
            done: 'Ok'
        }
		});
</script>
";
?>

</body>
</html>