<!DOCTYPE html>
<html>
<head>
    <title>gebruiker toevoegen</title>
</head>

<body>
<form action="gebruiker_toevoegen_controller.php" method="POST">
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
    <label>
        Telefoonnummer:
        <select name="landcode">
            <option value="+31">+31</option>
            <option value="+1">+1</option>
            <option value="+44">+44</option>
            <option value="+90">+90</option>
            <option value="+33">+33</option>
            <option value="+49">+49</option>
            <option value="+86">+86</option>
            <option value="+32">+32</option>
        </select>
        <input type="tel" name="nummer" pattern="[0-9]{9}" required>
        format: +31 612345678

    </label>
    <br>
    <label>
        Emailadres:
        <input type="email" name="emailadres" required/>
    </label>
    <br><br>
    <input type="submit" class="input_ok" value="Submit"/>
    <input type="reset" class="input_corr" value="Reset">
</form>
</body>
</html>