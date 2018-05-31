<?php
session_start();
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
    <?php include_once 'DAO/ProductDAO.php';
    $productdetail = ProductDAO::getById($_GET['q']) ?>
    <h1><?php echo $productdetail->getNaam(); ?></h1>
    <img class="col-xs-3" src="<?php echo $productdetail->getLocatieFoto(); ?>" width="187" height="310">
    <p class="col-xs-9"><?php echo $productdetail->getBeschrijving(); ?></p>
    <p class="col-xs-9">Prijs Excl BTW <?php echo '&euro; ' . $productdetail->getPrijsExclBtw(); ?></p>
    <p class="col-xs-9">Totale BTW <?php echo '&euro; ' . $productdetail->getBtw(); ?></p>
    <p class="col-xs-9">Prijs Incl BTW <?php echo '&euro; ' . $productdetail->getPrijsInclBtw(); ?></p>
    <p class="col-xs-9">Aantal in Stock <?php echo $productdetail->getStock(); ?></p>
    <form class="col-xs-8" action="voegToeAanWinkelwagen.php" method="POST">
        <input class="col-xs-1" name="aantal" type="number" min="0" max="<?php echo $productdetail->getStock(); ?>" value="1">
        <input type="hidden" name="productId" value="<?php echo $productdetail->getProductId(); ?>">
        <button class="col-xs-3" type="submit">In winkelmand!</button>
    </form>
</div>
</body>
</html>