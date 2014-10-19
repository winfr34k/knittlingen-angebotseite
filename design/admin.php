<!DOCTYPE html>
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
	
	<title>Adventsangebote - GVV</title>
</head>
<body>
	<div id="mainarea">
		<div id="header"></div>
		
		<div class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Administration</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="user.php">Benutzerverwaltung</a></li>
              <li class="active"><a href="admin.php">Angebotsverwaltung</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

		<div id="content">
			<h3>Neues Angebot - %Loginname%</h3>
			<form>
				<input type="text" class="form-control" placeholder="Angebotsname">
				<input type="text" class="form-control" placeholder="Preis">
				<input type="text" class="form-control" placeholder="Gültig bis">
				<textarea class="form-control" rows="3" placeholder="Beschreibung"></textarea>
				<button type="submit" class="btn btn-primary">Anlegen</button>
			</form>
			
			<h3>Eigene Angebote:</h3>
			<table border="1" class="table table-striped">
				<tr>
					<th class="offername">Angebotsname</th>
					<th class="pricetable">Preis</th>
					<th class="lapsetable">Gültig bis</th>
					<th>Beschreibung</th>
					<th class="edit">Bearbeiten</th>
				  </tr>
				  <tr>
					<td class="offername">3 Karotten zum Preis von 4 </td>
					<td class="pricetable">24,99€</td>
					<td class="lapsetable">22:22 Uhr am 23.55.2993</td>
					<td>Beispiel</td>
					<td class="edit"><button class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button><button class="btn btn-danger icon-t"><span class="glyphicon glyphicon-trash"></span></button></td>
				  </tr>
			</table>
		</div>
		<div id="muted">
			Adventsangebote des Gewerbe- und Verkehrsverein Knittlingen | <a href="/impressum.php"> Impressum</a>
		</div>
	</div>
   

</body>
</html>

