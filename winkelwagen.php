<?php
// something
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
        <li><a class="active" href="#">Home</a></li>
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
                <th>Verwijder</th>
            </tr>
            <?php
            include_once 'DAO/WinkelwagenDAO.php';
            foreach (WinkelwagenDao::getWinkelwagenItems() as $product) { ?>
                <?php $huidigProduct = $product->getProduct(); ?>
                <tr>
                    <td><?php echo $huidigProduct->getNaam(); ?></td>
                    <td><img src="<?php echo $huidigProduct->getLocatieFoto(); ?>" height="50" width="35"></td>
                    <td><?php echo $huidigProduct->getBeschrijving(); ?></td>
                    <td><?php echo $huidigProduct->getPrijsExclBtw(); ?></td>
                    <td>5</td>
                    <td><input type="number" id="myNumber" value="<?php $product->getAantal(); ?>"></td>
                    <td><button>Verwijder</button></td>
                </tr>
            <?php } ?>
        </table>
        <div class="finalize">
            <div class="row"><p class="col-xs-9">Totaal excl BTW</p><p>4,34 euro</p></div>
            <div class="row"><p class="col-xs-9">Tatale BTW</p><p>0,66 euro</p></div>
            <div class="row"><p class="col-xs-9">Totaal incl BTW</p><p>5 euro</p></div>
            <button>Betalen</button>
        </div>
    </div>
</div>
</body>
</html>