<?php
include_once './DAO/ProductDAO.php';

class WinkelwagenItem {
    private $aantal;
    private $productId;

    function getAantal() {
        return $this->aantal;
    }

    function getProductId() {
        return $this->productId;
    }

    function setAantal($aantal) {
        $this->aantal = $aantal;
    }

    function setProductId($productId) {
        $this->productId = $productId;
    }

    function __construct($aantal, $productId) {
        $this->aantal = $aantal;
        $this->productId = $productId;
    }

    function getProduct() {
        return ProductDao::getById($this->productId);
    }

    function getTotaalPrijsExclBtw() {
        return $this->getProduct()->getPrijsExclBtw() * $this->aantal;
    }

    function getTotaalBtw() {
        return $this->getProduct()->getBtw() * $this->aantal;
    }

    function getTotaalPrijsInclBtw() {
        return $this->getProduct()->getPrijsInclBtw() * $this->aantal;
    }
}