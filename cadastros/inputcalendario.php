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

	if(isset($_SESSION["nascPass"])){$data = $_SESSION["nascPass"];}
	else if(isset($_SESSION["nascMot"])){$data = $_SESSION["nascMot"];}else{$data = "";}
 
echo'
<input type="text" class="datepicker" name="data" value="'.$data.'" id="datepicker" class="validate">
';

?>

<script src="jquery-3.4.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	

<script>	   
    const Calender = document.querySelector('.datepicker');
	M.Datepicker.init(Calender,{
		format:'dd/mm/yyyy',
		autoClose: true,
		yearRange: 120,
		minYear: 1900,
		maxYear: 2030,
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


</body>
</html>