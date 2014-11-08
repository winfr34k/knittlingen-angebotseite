<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Ein Nutzer möchte mit Ihnen Kontakt aufnehmen!</h2>
		<h4>Betreff: {{ $subject  }}</h4>

        <table>
            <tr>
                <td>Von:</td>
                <td>E-Mail Adresse:</td>
            </tr>
            <tr>
                <td>{{ $from  }}</td>
                <td>{{ $email  }}</td>
            </tr>
        </table>

		<div>
            <h2>Nachricht:</h2>
            <p>{{ $mailMessage  }}</p>
            <hr />
			<p><a href="http://advent-knittlingen.de">advent-knittlingen.de</a>.</p>
			<p>Viel Spaß beim Einstellen von Angeboten!</p>
		</div>
	</body>
</html>
