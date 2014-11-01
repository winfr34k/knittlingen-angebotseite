<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Passwort zurücksetzen</h2>

		<div>
			Um Ihr Passwort zurückzusetzen, folgen Sie dieser URL: {{ URL::to('password/reset', array($token)) }}.<br/>
			Dieser Link wird in {{ Config::get('auth.reminder.expire', 60) }} Minuten verfallen.
		</div>
	</body>
</html>
