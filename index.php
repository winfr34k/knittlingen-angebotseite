<?php
	require_once('config.php');

	mysql_connect($dbHost, $dbUser, $dbPass);
	mysql_set_charset('utf-8');
	mysql_select_db($dbName);

	$selectQry = mysql_query("SELECT angebot.name, angebot.text, firma.name AS 'firma', firma.website AS 'website'
							FROM angebot
							INNER JOIN firma
							ON angebot.firmenId = firma.id
							ORDER BY firma.name");

	while($rows = mysql_fetch_assoc($selectQry))
	{
		echo "<h1>Firma: $rows[firma]</h1>";
		echo "<p><b>Website:</b> <a href='$rows[website]'>$rows[firma] - Website</a></p>";
		echo "<p><b>Angebot:</b> $rows[name]</p>";
		echo "<p>".nl2br($rows['text'])."</p>";
		echo '<hr />';
	}