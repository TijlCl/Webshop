<?php
header("location:winkelwagen.php");
include_once 'Dao/WinkelwagenDao.php';
include_once 'Model/WinkelwagenItem.php';
WinkelwagenDao::verwijderProduct(intval($_POST["productId"]));