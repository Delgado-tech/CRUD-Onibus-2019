<html>
<title>Surreal Viagens</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<?php
if(!isset($i)){$i=1;}

echo "

<div class='w3-container'>
  <button onclick=";echo'"document.getElementById(';echo"'$i').style.display='block'";echo'"';echo" class='w3-button w3-white'>[...]</button>
  <div id='$i' class='w3-modal'>
    <div class='w3-modal-content w3-animate-opacity'>
      <div class='w3-container'>
        <span onclick=";echo'"document.getElementById(';echo"'$i').style.display='none'";echo'"';echo" class='w3-button w3-display-topright'>&times;</span>
		
		<h2 class='grey-text text-darken-1'><b>Observações:</b></h2>
		<p>
		$obsline1<br>
		$obsline2<br>
		$obsline3<br>
		$obsline4<br>
		$obsline5<br>
		$obsline6<br>
		$obsline7<br>
		$obsline8<br>
		$obsline9<br>
		$obsline10<br>
		$obsline11<br>
		$obsline12<br>
		$obsline13<br>
		$obsline14<br>
		$obsline15<br>
		  </p>

      </div>
    </div>
  </div>
</div>
";
$i++;
   ?>         
</body>
</html>