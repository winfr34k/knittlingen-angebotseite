<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/stylesheet.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
  	
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/bootstrap.min.js"></script>
	  <script>
		  $(function() {
			$( "#tabs" ).tabs();
		  });

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
              <li><a href="index.php">Home</a></li>
              <li><a href="search.php">Angebote durchsuchen</a></li>
              <li><a href="login.php">Login</a></li>
              <li class="active"><a href="admin.php">Adminbereich</a></li>
              <li><a href="imprint.php">Impressum</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

		<div id="content">
      <div id="tabs">
        <ul>
          <li><a href="#tabs-1">Angebot erstellen</a></li>
          <li><a href="#tabs-2">Eigene Angebote</a></li>
          <li><a href="#tabs-3">Eigene Firma</a></li>
          <li><a href="#tabs-4">Kategorien verwalten</a></li>
          <li><a href="#tabs-5">Benutzerverwaltung</a>
          <li><a href="#tabs-6">System</a></li>
        </ul>

        <div id="tabs-1">
          <h3>Neues Angebot - %Loginname%</h3>
          <form>
            <input type="text" class="form-control" placeholder="Angebotsname">
            <input type="text" class="form-control" placeholder="Preis">
            <input type="text" class="form-control" placeholder="Gültig bis">
            <textarea class="form-control" rows="3" placeholder="Beschreibung"></textarea>
            <button type="submit" class="btn btn-primary">Anlegen</button>
          </form>
        </div>

        <div id="tabs-2">
          <h3>Eigene Angebote:</h3>
          <table class="table table-striped">
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
        <div id="tabs-3">
          <form>
            <h3>Firmenname ändern:</h3>
            <input type="text" class="form-control" placeholder="%Firmenname%">
            <h3>Passwort ändern:</h3>
            <input type="password" class="form-control" placeholder="Aktuelles Passwort">
            <input type="password" class="form-control" placeholder="Neues Passwort">
            <input type="password" class="form-control" placeholder="Neues Passwort wiederholen">
            <h3>Gewerbe ändern:</h3>
            <select class="form-control"><option>#</option></select> <!--Gewerbe Art-->
            <button type="submit" class="btn btn-primary">Ändern</button>
          </form> 
        </div>
        <div id="tabs-4">
            <h3> Gewerbe Art Anlegen</h3>
            <form>
              <input type="text" class="form-control" placeholder="Art des Gewerbes">
              <button type="submit" class="btn btn-primary">Anlegen</button>
            </form>
          </div>
        <div id="tabs-5">
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
            <th class="edit">Bearbeiten</th>
            </tr>
            <tr>
            <td>Beispielfirma</td>
            <td>Beispielname</td>
            <td>BeispielGewerbe</td>
            <td>BeispielWebseite</td>
            <td class="edit"><button class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button><button class="btn btn-danger icon-t"><span class="glyphicon glyphicon-trash"></span></button></td>
            </tr>
        </table>
        </div>
        <div id="tabs-6">
        test
        </div>
      </div>
		</div>
		<div id="muted">
			Adventsangebote des Gewerbe- und Verkehrsverein Knittlingen | <a href="/impressum.php"> Impressum</a>
		</div>
	</div>
   

</body>
</html>

