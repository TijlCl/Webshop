<?php
header("location:winkelwagen.php");
include_once 'Dao/WinkelwagenDao.php';
include_once 'Model/WinkelwagenItem.php';
$aantal = 1;
if (intval($_POST["aantal"]) == 1) {
    $winkelwagenitem = new WinkelwagenItem($aantal,  intval($_POST["productId"]));
    echo $aantal;
} else {
    $aantal = intval($_POST["aantal"]);
    $winkelwagenitem = new WinkelwagenItem($aantal,  intval($_POST["productId"]));
    echo $aantal;
}

WinkelwagenDao::vermeerderAantalItems2($winkelwagenitem);

