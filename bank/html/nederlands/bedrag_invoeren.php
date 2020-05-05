<!DOCTYPE html>
<html>
<head>
    <title>pin invoeren</title>
    <link href="../../CSS/bedrag_invoeren.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="buttons">
    <button>
        <a href="../../index.php"><img src="../../Pictures/algemeen/home_button.png"
                                       class="home_button"></a>
        <h3>D</h3>
    </button>

    <button>
        <a href="opnemen.php"><img src="../../Pictures/algemeen/left-teal-arrow.png"
                                   class="home_button"></a>
        <h3>C</h3>
    </button>
</div>

<div class="main">
    <section class="background"></section>
    <section>
        <h1>Batbank</h1>
        <h2>Voer het bedrag in.</h2>
        <br>
        <form>
            <input type="text" class="input_bedrag" name="Bedrag" placeholder="Bedrag" maxlength="4"/>
            <br>
            <input type="submit" class="input_ok" value="A   OK">
            <input type="reset" class="input_corr" value="B   CORR">
        </form>

        <br><br><br><br><br><br>
        <a href="menu.php"><img src="../../Pictures/algemeen/geld.png" style="width: 60%"></a>
    </section>
</div>
</body>
</html>