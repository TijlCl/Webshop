<?php
//Kopieer deze template en pas deze aan naargelang de benodigde functionaliteit
include_once '/Applications/AMPPS/www/Webshop/Model/Product.php';
include_once '/Applications/AMPPS/www/Webshop/DAO/verbinding/DatabaseFactory.php';

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

//    public static function getAllByVoornaam($voornaam) {
//        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM Persoon WHERE voornaam='?'", array($voornaam));
//        $resultatenArray = array();
//        for ($index = 0; $index < $resultaat->num_rows; $index++) {
//            $databaseRij = $resultaat->fetch_array();
//            $nieuw = self::converteerRijNaarObject($databaseRij);
//            $resultatenArray[$index] = $nieuw;
//        }
//        return $resultatenArray;
//    }

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

//    public static function insert($persoon) {
//        return self::getVerbinding()->voerSqlQueryUit("INSERT INTO Persoon(voornaam, achternaam) VALUES ('?','?')", array($persoon->getVoornaam(), $persoon->getAchternaam()));
//    }

//    public static function deleteById($id) {
//        return self::getVerbinding()->voerSqlQueryUit("DELETE FROM Persoon where persoonId=?", array($id));
//    }

//    public static function delete($persoon) {
//        return self::deleteById($persoon->getPersoonId());
//    }

//    public static function update($persoon) {
//        return self::getVerbinding()->voerSqlQueryUit("UPDATE Persoon SET voornaam='?',achternaam='?' WHERE persoonId=?", array($persoon->getVoornaam(), $persoon->getAchternaam(), $persoon->getPersoonId()));
//    }

    protected static function converteerRijNaarObject($databaseRij) {
        return new Product($databaseRij['productId'], $databaseRij['naam'], $databaseRij['beschrijving'], $databaseRij['btwPercentage'], $databaseRij['prijsExclBtw'], $databaseRij['locatieFoto']);
    }

}
