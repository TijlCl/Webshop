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
    <div class="admin">
        <table>
            <tr>
                <th>Naam</th>
                <th>foto</th>
                <th>Omschrijving</th>
                <th>prijs incl BTW</th>
                <th>Prijs excl BTW</th>
                <th>Aantal</th>
                <th>Verwijder</th>
            </tr>
            <tr>
                <td>craterhoof behemoth</td>
                <td><img src="img/craterhoof.jpg" height="50" width="35"></td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
                <td>4,34</td>
                <td>5</td>
                <td><input type="number" id="myNumber"></td>
                <td><button>Verwijder</button></td>
            </tr>
        </table>
        <a href="producttoevoegen.php"><button>Product Toevoegen</button></a>
    </div>
</div>
</body>
</html>