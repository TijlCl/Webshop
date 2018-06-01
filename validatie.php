<?php

function getVeldWaarde($naamVeld) {
    return $_POST[$naamVeld];
}

//Logische tests
function isVeldLeeg($naamVeld) {
    $waarde = getVeldWaarde($naamVeld);
    return empty($waarde);
}

function isVeldGroterDan($naamVeld, $waarde) {
    return (getVeldWaarde($naamVeld) > $waarde);
}

function isVeldNumeriek($naamVeld) {
    return is_numeric(getVeldWaarde($naamVeld));
}

//Error message generatie
function errRequiredVeld($naamVeld) {
    if (isVeldLeeg($naamVeld)) {
        return "Gelieve een waarde in te geven";
    } else {
        return "";
    }
}

function errVeldMoetGroterDanWaarde($naamVeld, $waarde) {
    if (isVeldGroterDan($naamVeld, $waarde)) {
        return "";
    } else {
        return "Waarde moet groter zijn dan " . $waarde . ".";
    }
}

function errVeldIsNumeriek($naamVeld) {
    if (isVeldNumeriek($naamVeld)) {
        return "";
    } else {
        return "Waarde moet numeriek zijn";
    }
}

function errVoegMeldingToe($huidigeErrMelding, $toeTeVoegenErrMelding) {
    if (empty($huidigeErrMelding)) {
        return $toeTeVoegenErrMelding;
    } else {
        if (empty($toeTeVoegenErrMelding)) {
            return $huidigeErrMelding;
        } else {
            return $huidigeErrMelding . "<br>" . $toeTeVoegenErrMelding;
        }
    }
}

function errBtw($naamVeld) {
    if (isVeldLeeg($naamVeld)) {
        return "";
    } else {
        if (isVeldNumeriek($naamVeld)){
            return "";
        } else {
            return "Waarde moet numeriek zijn";
        }
    }
}

function errFoto ($naamVeld) {
    if (empty($_FILES[$naamVeld]["name"])) {
        return 'Er is geen foto geselecteerd';
    } else {
        if($_FILES[$naamVeld]["type"] == "image/png" || $_FILES[$naamVeld]["type"]== "image/jpeg" || $_FILES[$naamVeld]["type"] == "image/gif") {
            return "";
        } else {
            return "Deze file is niet van het type jpg, png of gif";
        }
    }
}

?>
