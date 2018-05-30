<?php
include_once 'Dao/ProductDao.php';
include_once 'Model/Product.php';
include_once './validatie.php';

$toonFormulier = true;

$naamVal = $beschrijvingVal = $prijsExclBtwVal = $btwPercentageVal = $typeVal = "";
$fotoErr = $naamErr = $prijsExclBtwErr = $btwPercentageErr = $beschrijvingErr = "";

if (isFormulierIngediend()) {
    $naamErr = errRequiredVeld("naam");
    $btwPercentageErr = errBtw("btwPercentage");
    $prijsExclBtwErr = errVoegMeldingToe(errRequiredVeld("prijsExclBtw"), errVeldIsNumeriek("prijsExclBtw"));
    $beschrijvingErr = errRequiredVeld("beschrijving");
    $fotoErr = errFoto("bestand");

    if (isFormulierValid()) {
        $toonFormulier = false;
        ?>
        <html lang="en">
            <head>
                <meta charset="utf-8">

                <title>Webshop</title>
                <link rel="stylesheet" href="css/app.css?">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            </head>

            <body>
                <div class="banner"></div>
                <nav class="navbar">
                    <ul>
                        <li><a class="home" href="index.php">Home</a></li>
                        <li><a href="winkelwagen.php">Winkelwagen</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="admin.php">Admin</a></li>
                    </ul>
                </nav>

                <h1>Het product is toegevoegd!</h1>
                <?php
                    $selectedImage = "img/" . $_FILES["bestand"]["name"];
                    $newProduct = new Product(0, $_POST["naam"], $_POST["beschrijving"], $_POST["btwPercentage"], $_POST["prijsExclBtw"], $selectedImage);
                    ProductDao::voegToe($newProduct);
    } else {
        //Toon formulierpagina met eventuele feedbackvelden (err-velden)
        //Eventueel kan je ervoor zorgen dat foutief ingevulde waarden terug worden afgeprint in het formulier

        $naamVal = getVeldWaarde("naam");
        $beschrijvingVal = getVeldWaarde("beschrijving");
        $prijsExclBtwVal = getVeldWaarde("prijsExclBtw");
        $btwPercentageVal = getVeldWaarde("btwPercentage");

    }
}

function isFormulierIngediend() {
    return isset($_POST['postcheck']);
}

function isFormulierValid() {
    global $fotoErr, $naamErr, $prijsExclBtwErr, $btwPercentageErr, $beschrijvingErr;
    $allErr = $fotoErr . $naamErr . $prijsExclBtwErr . $btwPercentageErr . $beschrijvingErr;
    if (empty($allErr)) {
        //Formulier is valid
        return true;
    } else {
        return false;
    }
}
if ($toonFormulier) {
    ?>
    <html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Webshop</title>
        <link rel="stylesheet" href="css/app.css?">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>

    <body>
    <div class="banner"></div>
    <nav class="navbar">
        <ul>
            <li><a class="home" href="index.php">Home</a></li>
            <li><a href="winkelwagen.php">Winkelwagen</a></li>
            <li><a href="#">About</a></li>
            <li><a href="admin.php">Admin</a></li>
        </ul>
    </nav>

    <div class="content">
        <div class="product-toevoegen">
            <form class="fields" action="productToevoegen.php" method="POST" enctype="multipart/form-data">
                <h2 align="center";>Voeg product toe</h2>
                Naam:
                <input class="form-control" type="text" name="naam" value="<?php echo $naamVal; ?>">
                <label><?php echo $naamErr; ?></label><br>

                Prijs Excl BTW:
                <input class="form-control" type="text" name="prijsExclBtw" value="<?php echo $prijsExclBtwVal ?>"><br>
                <label><?php echo $prijsExclBtwErr; ?></label><br>

                Btw Percentage:
                <input class="form-control" type="text" name="btwPercentage" value="<?php echo $btwPercentageVal; ?>"><br>
                <label><?php echo $btwPercentageErr; ?></label><br>

                Omschrijving:
                <textarea rows="5" class="form-control" name="beschrijving" value="<?php echo $beschrijvingVal; ?>"></textarea><br>
                <label><?php echo $beschrijvingErr; ?></label><br>

                <input class="button" type="file" name="bestand"><br>
                <label><?php echo $fotoErr; ?></label><br>

                <div class="button">
                    <input type="hidden" name="postcheck" value="true"/>
                    <input class="verzenden" type="submit" value="Product uploaden">
                </div>
            </form>
        </div>
    </div>
    </body>
    </html>
<?php } ?>