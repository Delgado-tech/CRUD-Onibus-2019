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
 if(isset($_SESSION['cnh']))
 {$CNH = $_SESSION['cnh'];}else{$CNH = "";}
?>
<select name="CNHMOT" class="browser-default grey lighten-2">
		<option value="" disabled <?php if($CNH == "") echo "selected";?>>Selecione o seu Tipo de CNH</option>
				<option value="A" <?php if($CNH == "A") echo "selected";?>>Tipo A</option>
				<option value="B" <?php if($CNH == "B") echo "selected";?>>Tipo B</option>
				<option value="C" <?php if($CNH == "C") echo "selected";?>>Tipo C</option>
				<option value="D" <?php if($CNH == "D") echo "selected";?>>Tipo D</option>
				<option value="E" <?php if($CNH == "E") echo "selected";?>>Tipo E</option>
		</select>
		
		<script src="jquery-3.4.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" 
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	
	</body>
</html>