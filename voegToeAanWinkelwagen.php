<?php
session_start();
header("location:winkelwagen.php");
include_once 'Dao/WinkelwagenDao.php';
include_once 'Model/WinkelwagenItem.php';
include_once 'Model/Product.php';
include_once 'Dao/ProductDAO.php';
$aantal = 1;

if (intval($_POST["aantal"]) == 1) {
    $winkelwagenitem = new WinkelwagenItem($aantal,  intval($_POST["productId"]));
    echo $aantal;
} else {
    $aantal = intval($_POST["aantal"]);
    $winkelwagenitem = new WinkelwagenItem($aantal,  intval($_POST["productId"]));
    echo $aantal;
}
WinkelwagenDao::voegItemToeAanWinkelwagen($winkelwagenitem);

$product = ProductDao::getById(intval($_POST["productId"]));
$updatedStock = $product->getStock() - intval($_POST["aantal"]);
$updateProduct = new Product($product->getProductId(), $product->getNaam(), $product->getBeschrijving(), $product->getBtwPercentage(), $product->getPrijsExclBtw(), $product->getLocatieFoto(), $updatedStock);
ProductDao::updateStock($updateProduct);



