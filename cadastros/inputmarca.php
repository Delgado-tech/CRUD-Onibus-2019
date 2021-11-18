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
 if(isset($_SESSION['marca']))
 {$marca = $_SESSION['marca'];}else{$marca = "";}
?>
<select name="marca" class="browser-default grey lighten-2">
		<option value="" disabled <?php if($marca == "") echo "selected";?>>Selecione uma Marca</option>
				<option value="Agrale" <?php if($marca == "Agrale") echo "selected";?>>Agrale</option>
				<option value="International" <?php if($marca == "International") echo "selected";?>>International</option>
				<option value="Iveco" <?php if($marca == "Iveco") echo "selected";?>>Iveco</option>
				<option value="Jimbei" <?php if($marca == "Jimbei") echo "selected";?>>Jimbei</option>
				<option value="Marcopolo" <?php if($marca == "Marcopolo") echo "selected";?>>Marcopolo</option>
				<option value="Mercedes" <?php if($marca == "Mercedes") echo "selected";?>>Mercedes</option>
				<option value="Scania" <?php if($marca == "Scania") echo "selected";?>>Scania</option>
				<option value="Volkswagen" <?php if($marca == "Volkswagen") echo "selected";?>>Volkswagen</option>
				<option value="Volvo" <?php if($marca == "Volvo") echo "selected";?>>Volvo</option>
		</select>
		
		<script src="jquery-3.4.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" 
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	
	</body>
</html>