<?php

class Admin {

    private $adminId;
    private $gebruikersnaam;
    private $passwoord;

    public function getAdminID() {
        return $this->adminId;
    }

    public function getGebruikersnaam() {
        return $this->gebruikersnaam;
    }

    public function getPasswoord() {
        return $this->passwoord;
    }

    public function setAdminID($adminId) {
        $this->adminId = $adminId;
    }

    public function setGebruikersnaam($gebruikersnaam) {
        $this->gebruikersnaam = $gebruikersnaam;
    }

    public function setPasswoord($passwoord) {
        $this->passwoord = $passwoord;
    }

    public function __construct($adminId, $gebruikersnaam, $passwoord) {
        $this->adminId = $adminId;
        $this->gebruikersnaam = $gebruikersnaam;
        $this->passwoord = $passwoord;
    }
}
