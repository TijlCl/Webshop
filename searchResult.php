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
    <section class="table row">
        <?php
        include_once 'DAO/ProductDAO.php';
        foreach (ProductDAO::search($_GET['search']) as $product) { ?>
            <div class="card-block col-xs-4">
                <a href="detail.php?q=<?php echo $product->getProductId(); ?>"><img src="<?php echo $product->getLocatieFoto(); ?>"></a>
                <p class="col-xs-12"><?php echo $product->getNaam(); ?></p>
                <p class="col-xs-12">$<?php echo $product->getPrijsInclBtw(); ?></p>
                <p class="col-xs-12">Aantal is stock: <?php echo $product->getStock(); ?></p>
                <form class="col-xs-12" action="voegToeAanWinkelwagen.php" method="POST">
                    <input class="col-xs-4" name="aantal" type="number" min="0" max="<?php echo $product->getStock(); ?>" value="1">
                    <input type="hidden" name="productId" value="<?php echo $product->getProductId(); ?>">
                    <button class="col-xs-8" type="submit">In winkelmand!</button>
                </form>
            </div>
        <?php } ?>
    </section>
</div>
</body>
</html>