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
    <div class="admin">
        <table>
            <tr>
                <th>Naam</th>
                <th>foto</th>
                <th>Omschrijving</th>
                <th>prijs excl BTW</th>
                <th>Prijs incl BTW</th>
                <th>Aantal</th>
                <th>Pas aan</th>
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
                <td><a href="productUpdaten.php?q=<?php echo $product->getProductId(); ?>"><button>Pas product aan</button></a></td>
                <td>
                    <form action="delete.php" method="POST">
                        <button type="submit">Verwijder</button>
                        <input type="hidden" name="productId" value="<?php echo $product->getProductId(); ?>">
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
        <a href="producttoevoegen.php"><button>Product Toevoegen</button></a>
    </div>
</div>
</body>
</html>