<?php

//Auteur: Maarten Heylen

class Ingenico {

    private static $pspid = "2015ErasmusTest09";
    private static $shaKey = "ErasmusShaInHandtekening09";

    public static function genereerNieuweBetaling($bedragInCentiemen) {
        return new Betaling(self::$pspid, self::$shaKey, $bedragInCentiemen);
    }

}

class Betaling {

    private $pspid;
    private $orderId;
    private $bedragInCentiemen;
    private $currency;
    private $taalkeuzeIso;
    private $klantKaartEigenaar;
    private $klantEmail;
    private $klantPostcode;
    private $klantStraatEnHuisnummer;
    private $klantLand;
    private $klantGemeente;
    private $klantTelefoonnummer;
    private $opmaakTitel;
    private $opmaakAchtergrondKleur;
    private $opmaakTekstKleur;
    private $opmaakTabelAchtergrondKleur;
    private $opmaakTabelTekstKleur;
    private $opmaakKnoppenAchtergrondKleur;
    private $opmaakKnoppenTekstKleur;
    private $opmaakLogoUrl;
    private $opmaakLettertype;
    private $afhandelingBetalingGeaccepteerdUrl;
    private $afhandelingBetalingGeweigerdUrl;
    private $afhandelingBetalingFoutUrl;
    private $afhandelingBetalingGeannuleerdUrl;
    private $shaKey;

    public function getPspid() {
        return $this->pspid;
    }

    public function getOrderId() {
        return $this->orderId;
    }

    public function getBedragInCentiemen() {
        return $this->bedragInCentiemen;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function getTaalkeuzeIso() {
        return $this->taalkeuzeIso;
    }

    public function getKlantKaartEigenaar() {
        return $this->klantKaartEigenaar;
    }

    public function getKlantEmail() {
        return $this->klantEmail;
    }

    public function getKlantPostcode() {
        return $this->klantPostcode;
    }

    public function getKlantStraatEnHuisnummer() {
        return $this->klantStraatEnHuisnummer;
    }

    public function getKlantLand() {
        return $this->klantLand;
    }

    public function getKlantGemeente() {
        return $this->klantGemeente;
    }

    public function getKlantTelefoonnummer() {
        return $this->klantTelefoonnummer;
    }

    public function getOpmaakTitel() {
        return $this->opmaakTitel;
    }

    public function getOpmaakAchtergrondKleur() {
        return $this->opmaakAchtergrondKleur;
    }

    public function getOpmaakTekstKleur() {
        return $this->opmaakTekstKleur;
    }

    public function getOpmaakTabelAchtergrondKleur() {
        return $this->opmaakTabelAchtergrondKleur;
    }

    public function getOpmaakTabelTekstKleur() {
        return $this->opmaakTabelTekstKleur;
    }

    public function getOpmaakKnoppenAchtergrondKleur() {
        return $this->opmaakKnoppenAchtergrondKleur;
    }

    public function getOpmaakKnoppenTekstKleur() {
        return $this->opmaakKnoppenTekstKleur;
    }

    public function getOpmaakLogoUrl() {
        return $this->opmaakLogoUrl;
    }

    public function getOpmaakLettertype() {
        return $this->opmaakLettertype;
    }

    public function getAfhandelingBetalingGeaccepteerdUrl() {
        return $this->afhandelingBetalingGeaccepteerdUrl;
    }

    public function getAfhandelingBetalingGeweigerdUrl() {
        return $this->afhandelingBetalingGeweigerdUrl;
    }

    public function getAfhandelingBetalingFoutUrl() {
        return $this->afhandelingBetalingFoutUrl;
    }

    public function getAfhandelingBetalingGeannuleerdUrl() {
        return $this->afhandelingBetalingGeannuleerdUrl;
    }

    public function setPspid($pspid) {
        $this->pspid = $pspid;
    }

    public function setOrderId($orderId) {
        $this->orderId = $orderId;
    }

    public function setBedragInCentiemen($bedragInCentiemen) {
        $this->bedragInCentiemen = $bedragInCentiemen;
    }

    public function setCurrency($currency) {
        $this->currency = $currency;
    }

    public function setTaalkeuzeIso($taalkeuzeIso) {
        $this->taalkeuzeIso = $taalkeuzeIso;
    }

    public function setKlantKaartEigenaar($klantKaartEigenaar) {
        $this->klantKaartEigenaar = $klantKaartEigenaar;
    }

    public function setKlantEmail($klantEmail) {
        $this->klantEmail = $klantEmail;
    }

    public function setKlantPostcode($klantPostcode) {
        $this->klantPostcode = $klantPostcode;
    }

    public function setKlantStraatEnHuisnummer($klantStraatEnHuisnummer) {
        $this->klantStraatEnHuisnummer = $klantStraatEnHuisnummer;
    }

    public function setKlantLand($klantLand) {
        $this->klantLand = $klantLand;
    }

    public function setKlantGemeente($klantGemeente) {
        $this->klantGemeente = $klantGemeente;
    }

    public function setKlantTelefoonnummer($klantTelefoonnummer) {
        $this->klantTelefoonnummer = $klantTelefoonnummer;
    }

    public function setOpmaakTitel($opmaakTitel) {
        $this->opmaakTitel = $opmaakTitel;
    }

    public function setOpmaakAchtergrondKleur($opmaakAchtergrondKleur) {
        $this->opmaakAchtergrondKleur = $opmaakAchtergrondKleur;
    }

    public function setOpmaakTekstKleur($opmaakTekstKleur) {
        $this->opmaakTekstKleur = $opmaakTekstKleur;
    }

    public function setOpmaakTabelAchtergrondKleur($opmaakTabelAchtergrondKleur) {
        $this->opmaakTabelAchtergrondKleur = $opmaakTabelAchtergrondKleur;
    }

    public function setOpmaakTabelTekstKleur($opmaakTabelTekstKleur) {
        $this->opmaakTabelTekstKleur = $opmaakTabelTekstKleur;
    }

    public function setOpmaakKnoppenAchtergrondKleur($opmaakKnoppenAchtergrondKleur) {
        $this->opmaakKnoppenAchtergrondKleur = $opmaakKnoppenAchtergrondKleur;
    }

    public function setOpmaakKnoppenTekstKleur($opmaakKnoppenTekstKleur) {
        $this->opmaakKnoppenTekstKleur = $opmaakKnoppenTekstKleur;
    }

    public function setOpmaakLogoUrl($opmaakLogoUrl) {
        $this->opmaakLogoUrl = $opmaakLogoUrl;
    }

    public function setOpmaakLettertype($opmaakLettertype) {
        $this->opmaakLettertype = $opmaakLettertype;
    }

    public function setAfhandelingBetalingGeaccepteerdUrl($afhandelingBetalingGeaccepteerdUrl) {
        $this->afhandelingBetalingGeaccepteerdUrl = $afhandelingBetalingGeaccepteerdUrl;
    }

    public function setAfhandelingBetalingGeweigerdUrl($afhandelingBetalingGeweigerdUrl) {
        $this->afhandelingBetalingGeweigerdUrl = $afhandelingBetalingGeweigerdUrl;
    }

    public function setAfhandelingBetalingFoutUrl($afhandelingBetalingFoutUrl) {
        $this->afhandelingBetalingFoutUrl = $afhandelingBetalingFoutUrl;
    }

    public function setAfhandelingBetalingGeannuleerdUrl($afhandelingBetalingGeannuleerdUrl) {
        $this->afhandelingBetalingGeannuleerdUrl = $afhandelingBetalingGeannuleerdUrl;
    }

    public function setShaKey($shaKey) {
        $this->shaKey = $shaKey;
    }

    public function __construct($pspid, $shaKey, $bedragInCentiemen, $currency = "EUR", $taalkeuzeIso = "nl_NL") {
        $this->pspid = $pspid;
        $this->shaKey = $shaKey;
        $this->bedragInCentiemen = $bedragInCentiemen;
        $this->currency = $currency;
        $this->taalkeuzeIso = $taalkeuzeIso;

        $this->orderId = uniqid();
    }

    private function genereerSha() {
        $parameterLijst = $this->genereerParameterlijst();
        $shaString = "";
        foreach ($parameterLijst as $parameterData) {
            $shaString = $shaString . $parameterData->getNaam() . "=" . $parameterData->getWaarde() . $this->shaKey;
        }
        return sha1($shaString);
    }

    private function genereerParameterlijst() {
        $parameterLijst = array();
        //Moet in alfabetische volgorde
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "ACCEPTURL", $this->afhandelingBetalingGeaccepteerdUrl);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "AMOUNT", $this->bedragInCentiemen);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "BGCOLOR", $this->opmaakAchtergrondKleur);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "BUTTONBGCOLOR", $this->opmaakKnoppenAchtergrondKleur);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "BUTTONTXTCOLOR", $this->opmaakKnoppenTekstKleur);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "CANCELURL", $this->afhandelingBetalingGeannuleerdUrl);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "CN", $this->klantKaartEigenaar);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "CURRENCY", $this->currency);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "DECLINEURL", $this->afhandelingBetalingGeweigerdUrl);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "EMAIL", $this->klantEmail);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "EXCEPTIONURL", $this->afhandelingBetalingFoutUrl);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "FONTTYPE", $this->opmaakLettertype);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "LANGUAGE", $this->taalkeuzeIso);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "LOGO", $this->opmaakLogoUrl);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "ORDERID", $this->orderId);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "OWNERADDRESS", $this->klantStraatEnHuisnummer);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "OWNERCTY", $this->klantLand);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "OWNERTELNO", $this->klantTelefoonnummer);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "OWNERTOWN", $this->klantGemeente);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "OWNERZIP", $this->klantPostcode);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "PSPID", $this->pspid);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "TBLBGCOLOR", $this->opmaakTabelAchtergrondKleur);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "TBLTXTCOLOR", $this->opmaakTabelTekstKleur);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "TITLE", $this->opmaakTitel);
        $parameterLijst = $this->voegToeAanParameterlijst($parameterLijst, "TXTCOLOR", $this->opmaakTekstKleur);

        return $parameterLijst;
    }

    private function voegToeAanParameterlijst($parameterLijst, $naam, $waarde) {
        if ($waarde != "") {
            $nieuweShaData = new parameterData(strtoupper($naam), $waarde);
            array_push($parameterLijst, $nieuweShaData);
        }
        return $parameterLijst;
    }

    public function genereerBetalingsformulier() {
        ?>
        <form method="post" action="https://secure.ogone.com/ncol/test/orderstandard.asp">

            <?php foreach ($this->genereerParameterlijst() as $parameterData) { ?>
                <input type="hidden" name="<?php echo $parameterData->getNaam(); ?>" value="<?php echo $parameterData->getWaarde(); ?>">
            <?php } ?>


            <input type="hidden" name="SHASIGN" value="<?php echo $this->genereerSha(); ?>">

            <input type="submit" value="Betalen">
        </form>
        <?php
    }

}

class parameterData {

    private $naam;
    private $waarde;

    public function __construct($naam, $waarde) {
        $this->naam = $naam;
        $this->waarde = $waarde;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function getWaarde() {
        return $this->waarde;
    }

    public function setNaam($naam) {
        $this->naam = $naam;
    }

    public function setWaarde($waarde) {
        $this->waarde = $waarde;
    }

}
?>