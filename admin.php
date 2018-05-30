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
    <div class="admin">
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
            include_once 'DAO/ProductDAO.php';
            foreach (ProductDAO::getAll() as $product) { ?>
            <tr>
                <td><?php echo $product->getNaam(); ?></td>
                <td><img src="<?php echo $product->getLocatieFoto(); ?>" height="50" width="35"></td>
                <td><?php echo $product->getBeschrijving(); ?></td>
                <td><?php echo $product->getPrijsExclBtw(); ?></td>
                <td>5</td>
                <td><input type="number" id="myNumber"></td>
                <td><button>Verwijder</button></td>
            </tr>
            <?php } ?>
        </table>
        <a href="producttoevoegen.php"><button>Product Toevoegen</button></a>
    </div>
</div>
</body>
</html>