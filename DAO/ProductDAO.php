<?php
//Kopieer deze template en pas deze aan naargelang de benodigde functionaliteit
include_once 'Model/Product.php';
include_once 'DAO/verbinding/DatabaseFactory.php';

class ProductDAO {

    private static function getVerbinding() {
        return DatabaseFactory::getDatabase();
    }

    public static function getAll() {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM Product");
        $resultatenArray = array();
        for ($index = 0; $index < $resultaat->num_rows; $index++) {
            $databaseRij = $resultaat->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultatenArray[$index] = $nieuw;
        }
        return $resultatenArray;
    }

    public static function getById($id) {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM Product WHERE productId=?", array($id));
        if ($resultaat->num_rows == 1) {
            $databaseRij = $resultaat->fetch_array();
            return self::converteerRijNaarObject($databaseRij);
        } else {
            //Er is waarschijnlijk iets mis gegaan
            return false;
        }
    }

    public static function search($query) {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM Product WHERE naam LIKE '%$query%'");
        $resultatenArray = array();
        for ($index = 0; $index < $resultaat->num_rows; $index++) {
            $databaseRij = $resultaat->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultatenArray[$index] = $nieuw;
        }
        return $resultatenArray;
    }

    public static function voegToe($product) {
        return self::getVerbinding()->voerSqlQueryUit("INSERT INTO Product(naam, beschrijving, btwPercentage, prijsExclBtw, locatieFoto, stock) VALUES ('?','?','?','?','?','?')", array($product->getNaam(), $product->getBeschrijving(), $product->getBtwPercentage(), $product->getPrijsExclBtw(), $product->getLocatieFoto(), $product->getStock()));
    }


    public static function deleteById($id) {
        return self::getVerbinding()->voerSqlQueryUit("DELETE FROM Product where productId=?", array($id));
    }


    public static function update($product) {
        return self::getVerbinding()->voerSqlQueryUit("UPDATE Product SET naam='?',beschrijving='?',btwPercentage='?',prijsExclBtw='?',locatieFoto='?', stock='?' WHERE productId=?", array($product->getNaam(), $product->getBeschrijving(), $product->getBtwPercentage(), $product->getPrijsExclBtw(), $product->getLocatieFoto(), $product->getStock(), $product->getProductId()));
    }

    public static function updateStock($product) {
        return self::getVerbinding()->voerSqlQueryUit("UPDATE Product SET stock='?' WHERE productId=?", array($product->getStock(), $product->getProductId()));
    }

    protected static function converteerRijNaarObject($databaseRij) {
        return new Product($databaseRij['productId'], $databaseRij['naam'], $databaseRij['beschrijving'], $databaseRij['btwPercentage'], $databaseRij['prijsExclBtw'], $databaseRij['locatieFoto'], $databaseRij['stock']);
    }

}
