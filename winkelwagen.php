<?php
session_start();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="banner"></div>
<nav class="navbar">
    <ul>
        <li><a class="home" href="index.php">Home</a></li>
        <li><a href="winkelwagen.php">Winkelwagen</a></li>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            ?><li><a href="admin.php">Admin</a></li>
            <li><a href="logout.php">Log out</a></li>
            <?php
        } else {
            ?><li><a href="login.php">Log In</a></li><?php
        }
        ?>
        <div class="search-container">
            <form action="searchResult.php?=<?php echo $_GET['search']; ?>">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
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
            <form action="betaal.php" method="POST">
                <button type="submit">Betalen</button>
                <input type="hidden" name="bedrag" value="<?php echo WinkelwagenDao::getTotaalPrijsInclBtw() * 100; ?>">
            </form>
        </div>
    </div>
</div>
</body>
</html>
