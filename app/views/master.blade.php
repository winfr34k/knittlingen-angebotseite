<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.5">
  <meta name="keywords" content="GVV, Knittlingen, Gewerbe, Verkehr, Gewerbeverein, Verkehrsverein, Angebote, Kaufen, kostenlos, gÃ¼nstig, billig, Laden, Advent, Weihnachten, Adventszeit, Adventsdangebot, Weihnachtsgeschenk, Geschenk, Computer, Apoteke, Architekt, Krankenkasse, Gastronomie, GÃ¤rtnerei, Metallverarbeitung, Schlosser, Schreiner, Maler, Versicherungen, Heizung, SanitÃ¤r, Weinbau, Tankstelle, Mode, Modellbau, Camping, Kunst, Motorrad, Fahrrad, Pizzaria, Restaurant, MRR PC-Serice, Computer, Reperatur, Webdesign, Webseite, Homepage, gestallten">
  <meta name="description" content="Auf dieser Homepage finden Sie die Adventsangebote des Gewerbe- und Verkehrsvereins Knittlingen">
  
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/stylesheet.css">
  <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="/css/jquery-ui.css">
  <link rel="stylesheet" href="/css/jquery-te.css">
  <link rel="stylesheet" href="/css/jquery.mobile.min.css">
  <link rel="stylesheet" href="/css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="/css/shariff.min.css">
    
  <script src="/js/jquery.js"></script>
  <script src="/js/jquery-ui.js"></script>
  <script src="/js/jquery-te.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery-ui-i18n.min.js"></script>
  <script src="/js/jquery.dataTables.min.js"></script>
  <script src="/js/dataTables.bootstrap.js"></script>
  <script src="/js/app.js"></script>

  <!-- Piwik -->
  <script type="text/javascript">
    var _paq = _paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u="//piwik.advent-knittlingen.de/";
      _paq.push(['setTrackerUrl', u+'piwik.php']);
      _paq.push(['setSiteId', 1]);
      var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
      g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
  </script>
  <noscript><p><img src="//piwik.advent-knittlingen.de/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
  <!-- End Piwik Code -->

  <title>{{ $title }} | GVV Adventskalender</title>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">GVV Adventskalender</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li @if($title == 'Home' || starts_with($title, 'Angebot:')) class="active" @endif><a href="/">Home</a></li>
              <li @if($title == 'Late-Night Aktion') class="active" @endif><a href="/latenight">Late-Night Aktion</a></li>
              @if(Auth::guest())
              <li @if($title == 'Login') class="active" @endif><a href="/login">Login</a></li>
              @else
              <li><a href="/logout">Logout</a></li>
              <li @if($title == 'ACP') class="active" @endif><a href="/admin">Adminbereich</a></li>
              @endif
              <li @if($title == 'Kontakt') class="active" @endif><a href="/contact">Kontakt</a></li>
              <li @if($title == 'Impressum') class="active" @endif><a href="/imprint">Impressum</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

  <div id="mainarea">
    <a href="/"><div id="header"></div></a>

      <div id="content">
      @if(isset($errors) && count($errors) > 0)
        @foreach($errors->all() as $error)
        <p class="alert alert-danger"><b>Fehler:</b> {{ $error }}</p>
        @endforeach
      @endif
      @if(Session::get('success'))
        <p class="alert alert-success"><b>Erfolg:</b> {{ Session::get('success') }}</p>
      @endif

      @if(Setting::find(1)->value != '1' || (is_object(Auth::user()) && Auth::user()->is_admin == '1') || Request::is('login') || Request::is('imprint'))
      @yield('content')
      @else
      <h3 style="color: red">Die Seite ist derzeit offline</h3>
      <p><b>Grund:</b> {{ Setting::find(2)->value  }}</p>
      @endif
      <div class="shariff"></div>
    </div>

    <div id="muted">
      Adventskalender des <a href="http://gvv-knittlingen.de" target="_blank">Gewerbe- und Verkehrsverein Knittlingen</a> | <a href="/imprint"> Impressum</a>
    </div>
    <script src="/js/shariff.min.js"></script>
</body>
</html>