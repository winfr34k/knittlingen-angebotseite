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
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="#">Home</a></li>
              <li><a href="#">Angebote durchsuchen</a></li>
              <li class="active"><a href="#">Login</a></li>
              <li><a href="#">Impressum</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

		<div id="content">
			<h2>Login für Angebotsersteller</h2>

			<form class="form-horizontal" role="form">
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Benutzer</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="inputEmail3" placeholder="Benutzer">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Passwort</label>
				<div class="col-sm-10">
				  <input type="password" class="form-control" id="inputPassword3" placeholder="Passwort">
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-default">Login</button>
				</div>
			  </div>
			</form>
		</div>
	</div>
   
		<div id="muted">
			Adventsangebote des Gewerbe- und Verkehrsverein Knittlingen | <a href="/impressum.php"> Impressum</a>
		</div>
</body>
</html>