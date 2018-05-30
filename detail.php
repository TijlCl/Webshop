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
        <li><a class="home" href="index.php">Home</a></li>
        <li><a href="winkelwagen.php">Winkelwagen</a></li>
        <li><a href="#">About</a></li>
        <li><a href="admin.php">Admin</a></li>
    </ul>
</nav>

<div class="content">
    <?php include_once 'DAO/ProductDAO.php';
    $productdetail = ProductDAO::getById($_GET['q']) ?>
    <h1><?php echo $productdetail->getNaam(); ?></h1>
    <img class="col-xs-3" src="<?php echo $productdetail->getLocatieFoto(); ?>" width="223" height="310">
    <p class="col-xs-9"><?php echo $productdetail->getBeschrijving(); ?></p>
    <p class="col-xs-9">incl</p>
    <p class="col-xs-9"><?php echo $productdetail->getPrijsExclBtw(); ?></p>
    <button>Add to cart</button>
</div>
</body>
</html>