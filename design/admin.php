﻿<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/stylesheet.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  	
  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script src="js/bootstrap.min.js"></script>
	  <script>
		  $(function() {
			$( "#accordion" ).accordion();
		  });
		</script>
	
	<title>Administration - GVV</title>
</head>
<body>
	<div id="mainarea">
		<div id="header"></div>

		<div id="content">
			<h3> Neues Angebot - %Loginname%</h3>
			<form>
				<input type="text" class="form-control" placeholder="Angebotsname">
				<input type="text" class="form-control" placeholder="Preis">
				<input type="text" class="form-control" placeholder="Gültig bis">
				<textarea class="form-control" rows="3" placeholder="Beschreibung"></textarea>
				<button type="submit" class="btn btn-primary">Anlegen</button>
			</form>
			
			<h3>Eigene Angebote:</h3>
			<table class="table table-striped">
				<tr>
					<th>Angebotsname</th>
					<th>Preis</th>
					<th>Gültig bis</th>
					<th>Beschreibung</th>
					<th>Bearbeiten</th>
				  </tr>
				  <tr>
					<td>Bsp</td>
					<td>Beispiel</td>
					<td>Beispiel</td>
					<td>Beispiel</td>
					<td><button class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button><button class="btn btn-danger icon-t"><span class="glyphicon glyphicon-trash"></span></button></td>
				  </tr>
			</table>
		</div>
	</div>
   
		<div id="muted">
			Adventsangebote des Gewerbe- und Verkehrsverein Knittlingen | <a href="/impressum.php"> Impressum</a>
		</div>
</body>
</html>

