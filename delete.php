<?php
include_once 'Dao/ProductDao.php';
include_once 'Model/Product.php';
ProductDao::deleteById($_POST["productId"]);
header('Location:admin.php');
?>
/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

