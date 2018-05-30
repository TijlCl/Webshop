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
        <section class="table row">
            <?php
        include_once 'DAO/ProductDAO.php';
            foreach (ProductDAO::getAll() as $product) { ?>
                <div class="card-block col-xs-3">
                    <a href="detail.php?q=<?php echo $product->getProductId(); ?>"><img src="<?php echo $product->getLocatieFoto(); ?>" width="223" height="310"></a>
                    <div class="row">
                        <p class="col-xs-7"><?php echo $product->getNaam(); ?></p>
                        <p class="col-xs-3">$<?php echo $product->getPrijsExclBtw(); ?></p>
                    </div>
                    <form action="voegToeAanWinkelwagen.php" method="POST">
                        <button type="submit">Toevoegen aan winkelmandje</button>
                        <input name="aantal" type="number" min="0" value="1">
                        <input type="hidden" name="productId" value="<?php echo $product->getProductId(); ?>">
                    </form>
                </div>
          <?php } ?>
        </section>
    </div>
</body>
</html>