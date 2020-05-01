<html>
<head>
    <link href="../CSS/bedrag_invoeren.css" rel="stylesheet" type="text/css"/>
    <title>Register</title>
</head>
<body>
<section id="register">
    <h1>Registreren</h1>
    <form action="../php/gebruiker_toevoegen.php" method="get">
        <fieldset>
            <label>Naam:</label>
            <input id="voornaam," type="text" name="voornaam" placeholder="Voornaam"/>
            <input id="achternaam," type="text" name="achternaam" placeholder="Achteraam"/>

            <label>Email:</label>
            <input type="email" name="emailadres" placeholder="Emailadres"/>

            <label>Wachtwoord</label>
            <input type="password" name="wachtwoord" placeholder="password123"/>

            <label>Wachtwoord bevestiging</label>
            <input type="password" name="wachtwoord2" placeholder="password123"/>

            <input type="submit" value="Registreren" />

            <p>al een account? <a href="../index.html">login</a></p>

            <text>${dbName}</text>
            <text>${lastName}</text>
            <text>${emailAddress}</text>
            <text>${Password}</text>
            <text>${Password2}</text>
            <text>${wachtwoord}</text>
            <text>${same}</text>
        </fieldset>
    </form>
</section>
</body>