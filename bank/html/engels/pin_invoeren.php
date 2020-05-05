<!DOCTYPE html>
<html>
<head>
    <title>pin invoeren</title>
    <link href="../../CSS/pin_invoeren.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="buttons">
    <button>
        <a href="index.php"><img src="../../Pictures/algemeen/home_button.png"
                                 class="home_button"></a>
        <h3>D</h3>
    </button>
</div>

<div class="main">
    <section class="background"></section>
    <section>
        <h1>Batbank</h1>
        <h2>Please enter your pincode</h2>
        <br>
        <form>
            <input type="password" class="input_pin" name="pincode" placeholder="Pincode" pattern="[0-9]{4}"
                   maxlength="4" required/>
            <br>
            <input type="submit" class="input_ok" value="A   OK">
            <input type="reset" class="input_corr" value="B   CORR">
        </form>
        <br>
        <h2>Keep your pincode secret. Don't let anyone watch</h2>

        <a href="menu.php"><img src="../../Pictures/algemeen/passcode.png" style="width: 40%"></a>
    </section>
</div>
</body>
</html>