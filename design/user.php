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
              <li class="active"><a href="#">Benutzerverwaltung</a></li>
              <li><a href="#">Angebotsverwaltung</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

		<div id="content">
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
   
		<div id="muted">
			Adventsangebote des Gewerbe- und Verkehrsverein Knittlingen | <a href="/impressum.php"> Impressum</a>
		</div>
</body>
</html>