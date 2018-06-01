<?php
//Kopieer deze template en pas deze aan naargelang de benodigde functionaliteit
include_once '../Webshop/Model/Admin.php';
include_once '../Webshop/DAO/verbinding/DatabaseFactory.php';

class AdminDAO {

    private static function getVerbinding() {
        return DatabaseFactory::getDatabase();
    }

    public static function getAll() {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM Admin");
        $resultatenArray = array();
        for ($index = 0; $index < $resultaat->num_rows; $index++) {
            $databaseRij = $resultaat->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultatenArray[$index] = $nieuw;
        }
        return $resultatenArray;
    }

    protected static function converteerRijNaarObject($databaseRij) {
        return new Admin($databaseRij['adminId'], $databaseRij['gebruikersnaam'], $databaseRij['passwoord']);
    }

}
