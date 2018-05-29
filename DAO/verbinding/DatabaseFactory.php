<?php
//In deze klasse moet je in principe alleen de connectiegegevens voor jou mysql server aanpassen.
include_once 'DAO/Verbinding/Database.php';

class DatabaseFactory {

    //Singleton
    private static $verbinding;

    public static function getDatabase() {

        if (self::$verbinding == null) {
            $mijnComputernaam = "dt5.ehb.be";
            $mijnGebruikersnaam = "18BD045";
            $mijnWachtwoord = "54963827";
            $mijnDatabase = "18BD045";
            self::$verbinding = new Database($mijnComputernaam, $mijnGebruikersnaam, $mijnWachtwoord, $mijnDatabase);
        }
        return self::$verbinding;
    }

}
?>

