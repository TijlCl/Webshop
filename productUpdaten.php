<?php
include_once 'Dao/ProductDao.php';
include_once 'Model/Product.php';
include_once './validatie.php';

$toonFormulier = true;
$selectedImage = "";
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

            <h1>Het product is Aangepast!</h1>
            <?php
                $productToUpdate = ProductDAO::getById($_GET['q']);
                if (empty($_FILES['bestand']['name'])) {
                    $selectedImage = $productToUpdate->getLocatieFoto();
                } else {
                    $selectedImage = "img/" . $_FILES["bestand"]["name"];
                }
                $productToUpdate->setNaam($_POST["naam"]);
                $productToUpdate->setBeschrijving($_POST["beschrijving"]);
                $productToUpdate->setBtwPercentage($_POST["btwPercentage"]);
                $productToUpdate->setPrijsExclBtw($_POST["prijsExclBtw"]);
                $productToUpdate->setLocatieFoto($selectedImage);
                ProductDao::update($productToUpdate);
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
            <?php $productToUpdate = ProductDAO::getById($_GET['q']) ?>
            <form class="fields" action="productUpdaten.php?q=<?php echo $productToUpdate->getProductId(); ?>" method="POST" enctype="multipart/form-data">
                <h2 align="center";>Pas Product aan</h2>
                Naam:
                <input class="form-control" type="text" name="naam" value="<?php echo $productToUpdate->getNaam(); ?>">
                <label><?php echo $naamErr; ?></label><br>

                Prijs Excl BTW:
                <input class="form-control" type="text" name="prijsExclBtw" value="<?php echo $productToUpdate->getPrijsExclBtw(); ?>"><br>
                <label><?php echo $prijsExclBtwErr; ?></label><br>

                Btw Percentage:
                <input class="form-control" type="text" name="btwPercentage" value="<?php echo $productToUpdate->getBtwPercentage(); ?>"><br>
                <label><?php echo $btwPercentageErr; ?></label><br>

                Omschrijving:
                <textarea rows="5" class="form-control" name="beschrijving"><?php echo $productToUpdate->getBeschrijving(); ?></textarea><br>
                <label><?php echo $beschrijvingErr; ?></label><br>

                <p>Momenteel gebruikt als file voor dit product: <?php echo $productToUpdate->getLocatieFoto(); ?></p>
                <p>Klik op "Choose file" om deze te veranderen</p>
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