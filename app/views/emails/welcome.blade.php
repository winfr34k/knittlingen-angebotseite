<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Ihre Nutzerdaten</h2>

		<div>
			<h3>Herzlichen Glückwunsch!</h3>
			<p>Ihr Account wurde erfolgreich bei uns erstellt.<br />Ihre Account-Daten sind wie folgt:</p>
			<table>
				<tr>
					<td><b>Nutzername:</b></td>
					<td>{{ $username  }}</td>
				</tr>
				<tr>
					<td><b>Passwort:</b></td>
					<td><i>{{ $password  }}</i></td>
				</tr>
			</table>
			<p>Der Link zur Seite ist: <a href="http://advent-knittlingen.de/login">Knittlingen-2020 | Login</a>.</p>
			<p>Viel Spaß beim Einstellen von Angeboten!</p>
		</div>
	</body>
</html>
