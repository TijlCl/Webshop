<?php
header("location:admin.php");
include_once 'Dao/ProductDao.php';
include_once 'Model/Product.php';
$product = ProductDao::getById($_POST['product']);
$updateProduct = new Product($product->getProductId(), $product->getNaam(), $product->getBeschrijving(), $product->getBtwPercentage(), $product->getPrijsExclBtw(), $product->getLocatieFoto(), $_POST['aantal']);
ProductDao::updateStock($updateProduct);