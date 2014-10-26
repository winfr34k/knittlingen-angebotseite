<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.5">
  
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/stylesheet.css">
  <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="/css/jquery-ui.css">
  <link rel="stylesheet" href="/css/jquery.mobile.min.css">
    
  <script src="/js/jquery.js"></script>
  <script src="/js/jquery-ui.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery-ui-i18n.min.js"></script>
  <script>      
      $(function()
      {
        //Register tabs on element#tabs
        $('#tabs').tabs
        ({
           active: sessionStorage['tabs'], //read from local storage, event activated onLoad
           activate: function(event,ui) //Activated whenever you switch tabs
           {
            sessionStorage[''+this.id]=(ui.newPanel.index()-1); //Create new local storage or saving the tab's index to it
           }
        });
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
              <li @if($title == 'Home' || starts_with($title, 'Angebot:')) class="active" @endif><a href="/">Home</a></li>
              <li @if($title == 'Angebote durchsuchen') class="active" @endif><a href="/offers/search">Angebote durchsuchen</a></li>
              @if(Auth::guest())
              <li @if($title == 'Login') class="active" @endif><a href="/login">Login</a></li>
              @else
              <li><a href="/logout">Logout</a></li>              
              <li @if($title == 'ACP') class="active" @endif><a href="/admin">Adminbereich</a></li>
              @endif
              <li @if($title == 'Impressum') class="active" @endif><a href="/imprint">Impressum</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

    <div id="content">
      @if(isset($errors) && count($errors) > 0)
        @foreach($errors->all() as $error)
        <p class="alert alert-danger"><b>Fehler:</b> {{ $error }}</p>
        @endforeach
      @endif
      @if(Session::get('success'))
        <p class="alert alert-success"><b>Erfolg:</b> {{ Session::get('success') }}</p>
      @endif
      @yield('content')
    </div>
    <div id="muted">
      Adventsangebote des Gewerbe- und Verkehrsverein Knittlingen | <a href="/impressum.php"> Impressum</a>
    </div>
  </div>
</body>
</html>