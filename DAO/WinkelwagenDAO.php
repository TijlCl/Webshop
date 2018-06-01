<?php
include_once 'Model/WinkelwagenItem.php';


class WinkelwagenDao {
    public static function getWinkelwagenItems() {
        if (isset($_COOKIE['winkelwagen'])) {
            return unserialize($_COOKIE['winkelwagen']);
        } else {
            $winkelwagenItems = array();
            return $winkelwagenItems;
        }
    }
    public static function veranderAantalItems($winkelwagenItem) {
        $winkelwagenItems = self::getWinkelwagenItems();
        $bool = false;

        foreach ($winkelwagenItems as $huidigWinkelwagenItem) {
            if ($winkelwagenItem->getProductId() == $huidigWinkelwagenItem->getProductId()) {
                $huidigWinkelwagenItem->setAantal($winkelwagenItem->getAantal());
                setcookie('winkelwagen', serialize($winkelwagenItems));
                $bool = true;
            }
        }
        if ($bool == false) {
            $winkelwagenItems[] = $winkelwagenItem;
            $cookie = serialize($winkelwagenItems);
            setcookie('winkelwagen', $cookie);
        }

    }
    public static function voegItemToeAanWinkelwagen($winkelwagenItem) {
        $winkelwagenItems = self::getWinkelwagenItems();
        $bool = false;

        foreach ($winkelwagenItems as $huidigWinkelwagenItem) {
            if ($winkelwagenItem->getProductId() == $huidigWinkelwagenItem->getProductId()) {
                $huidigWinkelwagenItem->setAantal($huidigWinkelwagenItem->getAantal() + $winkelwagenItem->getAantal());
                setcookie('winkelwagen', serialize($winkelwagenItems));
                $bool = true;
            }
        }
        if ($bool == false) {
            $winkelwagenItems[] = $winkelwagenItem;
            $cookie = serialize($winkelwagenItems);
            setcookie('winkelwagen', $cookie);
        }

    }

    public static function verwijderProduct($productId) {
        $winkelwagenItems = self::getWinkelwagenItems();

        foreach ($winkelwagenItems as $index=>$huidigWinkelwagenItem) {
            if($huidigWinkelwagenItem->getProductId() == $productId) {
                unset($winkelwagenItems[$index]);
            }
        }

        setcookie('winkelwagen',  serialize($winkelwagenItems));
    }

    public static function getTotaalPrijsExclBtw() {
        $totPrijsExclBtw = 0;
        foreach (self::getWinkelwagenItems() as $winkelwagenItem) {
            $totPrijsExclBtw += $winkelwagenItem->getTotaalPrijsExclBtw();
        }
        return $totPrijsExclBtw;
    }

    public static function getTotaalBtw() {
        $totPrijsBtw = 0;
        foreach (self::getWinkelwagenItems() as $winkelwagenItem) {
            $totPrijsBtw += $winkelwagenItem->getTotaalBtw();
        }
        return $totPrijsBtw;
    }

    public static function getTotaalPrijsInclBtw(){
        $totPrijsInclBtw = 0;
        foreach (self::getWinkelwagenItems() as $winkelwagenItem) {
            $totPrijsInclBtw += $winkelwagenItem->getTotaalPrijsInclBtw();
        }
        return $totPrijsInclBtw;
    }
}
?>
