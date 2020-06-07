<!DOCTYPE html>
<html>
<head>
    <title>Rekening aanmaken</title>
</head>

<body>
<form action="rekening_aanmaken_controller.php" method="POST">
    <label>Naam:
        <input type="text" name="voornaam" placeholder="Voornaam" required/>
        <input type="text" name="tussenvoegsel" placeholder="Tussenvoegsel"/>
        <input type="text" name="achternaam" placeholder="Achternaam" required/>
    </label>
    <br>
    <label>
        Geboortedatum:
        <input type="date" name="geboorte_datum" required/>
    </label>
    <br>
    <label>
        Geslacht:
        <input type="radio" name="geslacht" value="M" required/> Man
        <input type="radio" name="geslacht" value="V" required/> Vrouw
        <input type="radio" name="geslacht" value="A" required/> Anders
    </label>
    <br>

    <label>Pasnummer:
        <input type="text" name="Pasnummer" placeholder="Pasnummer" required/>
    </label>
    <br>
    <label>Pincode:
        <input type="password" name="Pincode" placeholder="Pincode" maxlength="4" pattern="[0-9]{4}" required/>
    </label>

    <br><br>

    <input type="submit" class="input_ok" value="Submit"/>
    <input type="reset" class="input_corr" value="Reset">
</form>
</body>
</html>