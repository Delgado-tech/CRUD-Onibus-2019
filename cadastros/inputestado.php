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
 if(isset($_SESSION['estado']))
 {$estado = $_SESSION['estado'];}else{$estado = "";}
?>
<select name="estado" class="browser-default grey lighten-2">
		<option value="" disabled <?php if($estado == "") echo "selected";?>>Selecione um Estado</option>
							<option value="AC" <?php if($estado == "AC") echo "selected";?>>Acre (AC)</option>
							<option value="AL" <?php if($estado == "AL") echo "selected";?>>Alagoas (AL)</option>
							<option value="AP" <?php if($estado == "AP") echo "selected";?>>Amapá (AP)</option>
							<option value="AM" <?php if($estado == "AM") echo "selected";?>>Amazonas (AM)</option>
							<option value="BA" <?php if($estado == "BA") echo "selected";?>>Bahia (BA)</option>
							<option value="CE" <?php if($estado == "CE") echo "selected";?>>Ceará (CE)</option>
							<option value="DF" <?php if($estado == "DF") echo "selected";?>>Distrito Federal (DF)</option>
							<option value="ES" <?php if($estado == "ES") echo "selected";?>>Espírito Santo (ES)</option>
							<option value="GO" <?php if($estado == "GO") echo "selected";?>>Goiás (GO)</option>
							<option value="MA" <?php if($estado == "MA") echo "selected";?>>Maranhão (MA)</option>
							<option value="MT" <?php if($estado == "MT") echo "selected";?>>Mato Grosso (MT)</option>
							<option value="MS" <?php if($estado == "MS") echo "selected";?>>Mato Grosso do Sul (MS)</option>
							<option value="MG" <?php if($estado == "MG") echo "selected";?>>Minas Gerais (MG)</option>
							<option value="PB" <?php if($estado == "PB") echo "selected";?>>Paraíba (PB)</option>
							<option value="PR" <?php if($estado == "PR") echo "selected";?>>Paraná (PR)</option>
							<option value="PE" <?php if($estado == "PE") echo "selected";?>>Pernambuco (PE)</option>
							<option value="PI" <?php if($estado == "PI") echo "selected";?>>Piauí (PI)</option>
							<option value="RJ" <?php if($estado == "RJ") echo "selected";?>>Rio de Janeiro (RJ)</option>
							<option value="RN" <?php if($estado == "RN") echo "selected";?>>Rio Grande do Norte (RN)</option>
							<option value="RS" <?php if($estado == "RS") echo "selected";?>>Rio Grande do Sul (RS)</option>
							<option value="RO" <?php if($estado == "RO") echo "selected";?>>Rondônia (RO)</option>
							<option value="RR" <?php if($estado == "RR") echo "selected";?>>Roraima (RR)</option>
							<option value="SC" <?php if($estado == "SC") echo "selected";?>>Santa Catarina (SC)</option>
							<option value="SP" <?php if($estado == "SP") echo "selected";?>>São Paulo (SP)</option>
							<option value="SE" <?php if($estado == "SE") echo "selected";?>>Sergipe (SE)</option>
							<option value="TO" <?php if($estado == "TO") echo "selected";?>>Tocantins (TO)</option>
							<option value="PA" <?php if($estado == "PA") echo "selected";?>>Pará (PA)</option>	
		</select>
		
		<script src="jquery-3.4.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/
	js/materialize.min.js"></script>
	</body>
</html>