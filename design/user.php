<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/stylesheet.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/bootstrap.min.js"></script>
	<title>Benutzerverwaltung</title>
</head>
<body>
	<div id="mainarea">

		<div class="header">

		</div>
		<div class="navbar"
		</div>
		<div class="content">
			<h3> Gewerbe Art Anlegen</h3>
			<form>
				<input type="text" class="form-control" placeholder="Art des Gewerbes">
				<button type="submit" class="btn btn-primary">Anlegen</button>
			</form>
			
			<h3> Neue User Anlegen:</h3>
			<form>
				<input type="text" class="form-control" placeholder="Firmenname">
				<select class="form-control"><option>#</option></select> <!--Gewerbe Art-->
				<input type="text" class="form-control" placeholder="Loginname">
				<input type="email" class="form-control" placeholder="E-Mail">
				<input type="url" class="form-control" placeholder="Webseite">
				<input type="text" class="form-control" placeholder="Passwort">
				</br>
				<button type="submit" class="btn btn-primary">Anlegen</button>
			</form>
			
			<h3>Vorhandene User:</h3>
				<table class="table table-striped">
				    <tr>
						<th>Firma</th>
						<th>Loginname</th>
						<th>Gewerbe</th>
						<th>Webseite</th>
						<th>Bearbeiten</th>
					  </tr>
					  <tr>
						<td>Beispielfirma</td>
						<td>Beispielname</td>
						<td>BeispielGewerbe</td>
						<td>BeispielWebseite</td>
						<td><button class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button><button class="btn btn-danger icon-t"><span class="glyphicon glyphicon-trash"></span></button></td>
					  </tr>
				</table>
		</div>
	</div>
   
		<div class="muted">
			Adventsangebote des Gewerbe- und Verkehrsverein Knittlingen | <a href="/impressum.php"> Impressum</a>
		</div>
</body>
</html>