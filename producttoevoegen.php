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
    <div class="product-toevoegen">
        Naam: <input type="text" class="form-control">
        Prijs incl BTW: <input type="text" class="form-control">
        Aantal: <input type="number" class="form-control">
        Omschrijving: <textarea rows="5" class="form-control"></textarea>
        <button>Foto toevoegen</button>
        <br>
        <button>Product Toevoegen</button>
    </div>
</div>
</body>
</html>