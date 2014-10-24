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
  
  <title>{{ $title }} | GVV-Angebotsseite</title>
</head>
<body>
  <div id="mainarea">
    <div id="header"></div>
    
    <div class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="/">Home</a></li>
              <li><a href="/offers/search">Angebote durchsuchen</a></li>
              <li><a href="/login">Login</a></li>
              <li><a href="/admin">Adminbereich</a></li>
              <li><a href="/imprint">Impressum</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

    <div id="content">
      @yield('content')
    </div>
  </div>
   

</body>
</html>