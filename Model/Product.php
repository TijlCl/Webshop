<?php

class Product {

    private $productId;
    private $naam;
    private $beschrijving;
    private $btwPercentage;
    private $prijsExclBtw;
    private $locatieFoto;

    public function getProductId() {
        return $this->productId;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function getBeschrijving() {
        return $this->beschrijving;
    }

    public function getBtwPercentage() {
        return $this->btwPercentage;
    }

    public function getPrijsExclBtw() {
        return $this->prijsExclBtw;
    }

    public function getLocatieFoto() {
        return $this->locatieFoto;
    }

    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function setNaam($naam) {
        $this->naam = $naam;
    }

    public function setBeschrijving($beschrijving) {
        $this->beschrijving = $beschrijving;
    }

    public function setBtwPercentage($btwPercentage) {
        $this->btwPercentage = $btwPercentage;
    }

    public function setPrijsExclBtw($prijsExclBtw) {
        $this->prijsExclBtw = $prijsExclBtw;
    }

    public function setLocatieFoto($locatieFoto) {
        $this->locatieFoto = $locatieFoto;
    }

    public function __construct($productId, $naam, $beschrijving, $btwPercentage, $prijsExclBtw, $locatieFoto) {
        $this->productId = $productId;
        $this->naam = $naam;
        $this->beschrijving = $beschrijving;
        $this->btwPercentage = $btwPercentage;
        $this->prijsExclBtw = $prijsExclBtw;
        $this->locatieFoto = $locatieFoto;
    }

    public function getBtw() {
        return $this->prijsExclBtw * $this->btwPercentage / 100;
    }

    public function getPrijsInclBtw() {
        return $this->prijsExclBtw + $this->getBtw();
    }

    //Extra functionaliteit kan je hier schrijven
}
