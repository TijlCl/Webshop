<?php
include_once 'Dao/ProductDao.php';
include_once 'Model/Product.php';
include_once 'Dao/WinkelwagenDao.php';
include_once 'Model/WinkelwagenItem.php';
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
    <div class="winkelwagen">
        <table>
            <tr>
                <th>Naam</th>
                <th>foto</th>
                <th>Omschrijving</th>
                <th>prijs excl BTW</th>
                <th>Prijs incl BTW</th>
                <th>Aantal</th>
                <th>Totaal Incl BTW</th>
                <th>Verwijder</th>
            </tr>
            <?php
            foreach (WinkelwagenDao::getWinkelwagenItems() as $product) { ?>
                <?php $huidigProduct = $product->getProduct(); ?>
                <?php $aantal = $product->getAantal(); ?>
                <tr>
                    <td><?php echo $huidigProduct->getNaam(); ?></td>
                    <td><img src="<?php echo $huidigProduct->getLocatieFoto(); ?>" height="50" width="35"></td>
                    <td><?php echo $huidigProduct->getBeschrijving(); ?></td>
                    <td><?php echo $huidigProduct->getPrijsExclBtw(); ?></td>
                    <td><?php echo $huidigProduct->getPrijsInclBtw(); ?></td>
                    <td>
                        <form action="pasAantalAan.php" method="POST">
                            <input onchange ="this.form.submit()" name="aantal" type="number" value="<?php echo $product->getAantal(); ?>" min="0">
                            <input type="hidden" name="productId" value="<?php echo $product->getProductId(); ?>">
                        </form>
                    </td>
                    <td><?php echo $product->getTotaalPrijsInclBtw(); ?></td>
                    <td>
                        <form action="verwijderUitKar.php" method="POST">
                            <button type="submit">Verwijder</button>
                            <input type="hidden" name="productId" value="<?php echo $product->getProductId(); ?>">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <div class="finalize">
            <div class="row"><p class="col-xs-9">Totaal excl BTW</p><p><?php echo '&euro; ' . WinkelwagenDao::getTotaalPrijsExclBtw() ?></p></div>
            <div class="row"><p class="col-xs-9">Tatale BTW</p><p><?php echo '&euro; ' . WinkelwagenDao::getTotaalBtw() ?></p></div>
            <div class="row"><p class="col-xs-9">Totaal incl BTW</p><p><?php echo '&euro; ' . WinkelwagenDao::getTotaalPrijsInclBtw() ?></p></div>
            <button>Betalen</button>
        </div>
    </div>
</div>
</body>
</html>
