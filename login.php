<?php
session_start();
$incorrectUser = '';
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
        <li><a href="index.php">Home</a></li>
        <li><a href="winkelwagen.php">Winkelwagen</a></li>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            ?><li><a href="admin.php">Admin</a></li>
            <li><a href="logout.php">Log out</a></li>
            <?php
        } else {
            ?><li><a class="active" href="login.php">Log In</a></li><?php
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
    <div class="product-toevoegen">
        <form class="fields" action="checkUser.php" method="POST">
            <h2 align="center";>Log In</h2>
            <?php if($_GET['incorrect'] == true) {
                $incorrectUser = "Gerbuikersnaam of paswoord is niet correct";
            } ?>
            <p align="center"><?php echo $incorrectUser; ?></p>
            Gebruikersnaam:
            <input class="form-control" type="text" name="gerbuikersnaam">

            Passwoord:
            <input class="form-control" type="password" name="passwoord">

            <div class="button">
                <input type="hidden" name="postcheck" value="true"/>
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</div>
</body>
</html>