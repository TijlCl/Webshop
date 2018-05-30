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

function isVeldKleinerDanOfGekijkAan($naamVeld, $waarde) {
    return (getVeldWaarde($naamVeld) <= $waarde);
}

function isVeldNumeriek($naamVeld) {
    return is_numeric(getVeldWaarde($naamVeld));
}

function isVeldTekst($naamVeld) {
    return !is_numeric(getVeldWaarde($naamVeld));
}

//Error message generatie
function errRequiredVeld($naamVeld) {
    if (isVeldLeeg($naamVeld)) {
        return "Gelieve een waarde in te geven";
    } else {
        return "";
    }
}

function errVeldisTekst($naamVeld) {
    if (isVeldLeeg($naamVeld)) {
        return "";
    } else {
        return "Gelieve geen cijfers in te vullen";
    }
}

function errVeldMoetGroterDanWaarde($naamVeld, $waarde) {
    if (isVeldGroterDan($naamVeld, $waarde)) {
        return "";
    } else {
        return "Waarde moet groter zijn dan " . $waarde . ".";
    }
}

function errVeldMoetKleinerDanOfGelijkAanWaarde($naamVeld, $waarde) {
    if (isVeldKleinerDanOfGekijkAan($naamVeld, $waarde)) {
        return "";
    } else {
        return "Waarde moet kleiner of gelijk zijn aan " . $waarde . ".";
    }
}



function errVeldIsNumeriek($naamVeld) {
    if (isVeldNumeriek($naamVeld)) {
        return "";
    } else {
        return "Waarde moet numeriek zijn";
    }
}

function errVeldIsDag($naamVeld) {
    if ($naamVeld > 0 && $naamVeld <= 31) {
        return "";
    } else {
        return "Geef een waarde tussen de 0 en 31 in";
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
