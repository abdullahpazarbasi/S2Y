<?php
/**
 * @name        Sayidan Yaziya
 * @version     2.0.0
 * @author      Mehmet Abdullah Pazarbasi
 * @link        http://www.abdullahpazarbasi.com
 * @since       12.08.2011 Fri
 * @licence     BSD
 *
 * Example:
 * print_r(Helper_S2Y::get($_GET["number"]));
 *
 **/

class Helper_S2Y {

    private static $aBasamakBirler = array(
        array("BasamakEki" => "Sıfır", "SiralamaEki" => "ıncı"),
        array("BasamakEki" => "Bir", "SiralamaEki" => "inci"),
        array("BasamakEki" => "İki", "SiralamaEki" => "nci"),
        array("BasamakEki" => "Üç", "SiralamaEki" => "üncü"),
        array("BasamakEki" => "Dört", "SiralamaEki" => "üncü"),
        array("BasamakEki" => "Beş", "SiralamaEki" => "inci"),
        array("BasamakEki" => "Altı", "SiralamaEki" => "ncı"),
        array("BasamakEki" => "Yedi", "SiralamaEki" => "nci"),
        array("BasamakEki" => "Sekiz", "SiralamaEki" => "inci"),
        array("BasamakEki" => "Dokuz", "SiralamaEki" => "uncu"),
    );
    private static $aBasamakOnlar = array(
        array("BasamakEki" => "On", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Yirmi", "SiralamaEki" => "nci"),
        array("BasamakEki" => "Otuz", "SiralamaEki" => "uncu"),
        array("BasamakEki" => "Kırk", "SiralamaEki" => "ıncı"),
        array("BasamakEki" => "Elli", "SiralamaEki" => "nci"),
        array("BasamakEki" => "Altmış", "SiralamaEki" => "ıncı"),
        array("BasamakEki" => "Yetmiş", "SiralamaEki" => "inci"),
        array("BasamakEki" => "Seksen", "SiralamaEki" => "inci"),
        array("BasamakEki" => "Doksan", "SiralamaEki" => "ıncı"),
    );
    private static $aBasamakYuzler = array(
        array("BasamakEki" => "Yüz", "SiralamaEki" => "üncü", "OndalikEki" => "de"),
        array("BasamakEki" => "İki Yüz", "SiralamaEki" => "üncü"),
        array("BasamakEki" => "Üç Yüz", "SiralamaEki" => "üncü"),
        array("BasamakEki" => "Dört Yüz", "SiralamaEki" => "üncü"),
        array("BasamakEki" => "Beş Yüz", "SiralamaEki" => "üncü"),
        array("BasamakEki" => "Altı Yüz", "SiralamaEki" => "üncü"),
        array("BasamakEki" => "Yedi Yüz", "SiralamaEki" => "üncü"),
        array("BasamakEki" => "Sekiz Yüz", "SiralamaEki" => "üncü"),
        array("BasamakEki" => "Dokuz Yüz", "SiralamaEki" => "üncü"),
    );
    private static $aBasamakBinler = array(
        array("BasamakEki" => "", "SiralamaEki" => "", "OndalikEki" => ""), // 10 üzeri 0
        array("BasamakEki" => "Bin", "SiralamaEki" => "inci", "OndalikEki" => "de"),
        array("BasamakEki" => "Milyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Milyar", "SiralamaEki" => "ıncı", "OndalikEki" => "da"),
        array("BasamakEki" => "Trilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Katrilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Kentilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Sekstilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Septilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Oktilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Nonilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"), // 10 üzeri 30
        array("BasamakEki" => "Desilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Andesilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Dodesilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Tredesilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Katordesilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Kendesilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Seksdesilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Septendesilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Oktodesilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Novemdesilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"), // 10 üzeri 60
        array("BasamakEki" => "Vigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Anvigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Dovigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Tresvigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Katorvigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Kenvigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Sesvigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Septemvigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Oktovigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Novemvigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"), // 10 üzeri 90
        array("BasamakEki" => "Trigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Antrigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Dotrigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Trestrigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Katortrigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Kenkatrigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Sestrigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Septentrigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Oktotrigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"),
        array("BasamakEki" => "Novemtrigintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"), // 10 üzeri 120
        array("BasamakEki" => "Katragintilyon", "SiralamaEki" => "uncu", "OndalikEki" => "da"), // 10 üzeri 123
    );

    public static function get($sSayi, $bSiralamaSayisi = FALSE, $bOndalikIfade = TRUE, $bIsaretDaima = FALSE) {
        //echo "Maximum : " . PHP_INT_MAX . "<br />";
        $sYazi = "";
        $aSayi = self::explode($sSayi);
        if ($aSayi === FALSE) {
            return "";
        }
        if (strlen($aSayi["TamKisim"]) > 0) {
            $aYazi = self::tamsayi2yazi($aSayi["TamKisim"]);
            $sYazi .= $aYazi["SayiYazisi"];
        }
        if ($aSayi["OndalikKisim"] != "") {
            if ($bOndalikIfade) {
                $sYazi .= " Tam ";
                $sPaydaSayi = "1" . str_repeat("0", strlen($aSayi["OndalikKisim"]));
                $aPaydaYazi = self::tamsayi2yazi($sPaydaSayi);
                $sYazi .= $aPaydaYazi["SayiYazisi"];
                $sYazi .= $aPaydaYazi["OndalikEki"] . " ";
            }
            else {
                $sYazi .= " Nokta ";
            }
            $aYazi = self::tamsayi2yazi($aSayi["OndalikKisim"]);
            $sYazi .= $aYazi["SayiYazisi"];
        }
        if ($aSayi["Isaret"] == "-") {
            $sYazi = "Eksi " . $sYazi;
        }
        else {
            if ($aSayi["SiralamaIsareti"] == ".") {
                $bSiralamaSayisi = TRUE;
            }
            if ($bSiralamaSayisi && isset($aYazi["SiralamaEki"])) {
                $sYazi .= $aYazi["SiralamaEki"];
            }
            if ($bIsaretDaima) {
                $sYazi = "Artı " . $sYazi;
            }
        }
        return trim($sYazi);
    }

    private static function tamsayi2yazi($sSayi) {
        $aYazi = array();
        $aYazi["SayiYazisi"] = "";
        $aYazi["SiralamaEki"] = "";
        $aYazi["OndalikEki"] = "";
        if ($sSayi == "0") {
            $aYazi["SayiYazisi"] = self::$aBasamakBirler[0]["BasamakEki"];
            $aYazi["SiralamaEki"] = self::$aBasamakBirler[0]["SiralamaEki"];
            $aYazi["OndalikEki"] = self::$aBasamakBirler[0]["OndalikEki"];
            return $aYazi;
        }
        $sSayi = strval($sSayi);
        $iSayiUzunluk = strlen($sSayi);
        $iBinKatiUzunluk = ceil($iSayiUzunluk / 3) * 3;
        $sSayi = str_pad($sSayi, $iBinKatiUzunluk, "0", STR_PAD_LEFT);
        for ($iBasamakBinlik = 0; $iBasamakBinlik < $iBinKatiUzunluk; $iBasamakBinlik += 3) {
            $i = intval(($iBinKatiUzunluk - $iBasamakBinlik) / 3 - 1);
            $sGecerliBinler = substr($sSayi, $iBasamakBinlik, 3);
            $aGecerliBinlerYazi = self::binlik2yazi($sGecerliBinler);
            $aYazi["SayiYazisi"] .= " " . (!empty($aGecerliBinlerYazi["SayiYazisi"]) ? $aGecerliBinlerYazi["SayiYazisi"] . " " . self::$aBasamakBinler[$i]["BasamakEki"] : "");
            $aYazi["SiralamaEki"] = self::$aBasamakBinler[$i]["SiralamaEki"];
            if (!empty($aGecerliBinlerYazi["SiralamaEki"])) {
                $aYazi["SiralamaEki"] = $aGecerliBinlerYazi["SiralamaEki"];
            }
            if ($iSayiUzunluk == 2) {
                $aYazi["OndalikEki"] = self::$aBasamakOnlar[0]["OndalikEki"];
            }
            elseif ($iSayiUzunluk == 3) {
                $aYazi["OndalikEki"] = self::$aBasamakYuzler[0]["OndalikEki"];
            }
            elseif ($iSayiUzunluk > 3 && $sGecerliBinler != "000") {
                $aYazi["OndalikEki"] = self::$aBasamakBinler[$i]["OndalikEki"];
            }
            if ($sGecerliBinler == "001") {
                $aYazi["SayiYazisi"] = str_replace(" Bir Bin", " Bin", $aYazi["SayiYazisi"]);
            }
        }
        $aYazi["SayiYazisi"] = trim($aYazi["SayiYazisi"]);
        return $aYazi;
    }

    private static function binlik2yazi($sSayi) {
        $aYazi = array();
        $aYazi["SayiYazisi"] = "";
        $aYazi["SiralamaEki"] = "";
        $sSayi = strval($sSayi);
        $sSayi = str_pad($sSayi, 3, "0", STR_PAD_LEFT);
        if ($sSayi == "000") {
            return $aYazi;
        }
        $i = intval($sSayi[0]) - 1;
        if ($i >= 0) {
            $aYazi["SayiYazisi"] .= " " . self::$aBasamakYuzler[$i]["BasamakEki"];
            $aYazi["SiralamaEki"] = self::$aBasamakYuzler[$i]["SiralamaEki"];
        }
        $i = intval($sSayi[1]) - 1;
        if ($i >= 0) {
            $aYazi["SayiYazisi"] .= " " . self::$aBasamakOnlar[$i]["BasamakEki"];
            $aYazi["SiralamaEki"] = self::$aBasamakOnlar[$i]["SiralamaEki"];
        }
        $i = intval($sSayi[2]);
        if ($i > 0) {
            $aYazi["SayiYazisi"] .= " " . self::$aBasamakBirler[$i]["BasamakEki"];
            $aYazi["SiralamaEki"] = self::$aBasamakBirler[$i]["SiralamaEki"];
        }
        $aYazi["SayiYazisi"] = ltrim($aYazi["SayiYazisi"]);
        return $aYazi;
    }

    private static function explode($sSayi) {
        $aExploded = array();
        $sSayi = strval($sSayi);
        $aMatches = array();
        if (!preg_match("/^([\+\-])?([\d]{1,126})([\.][\d]{1,126})?([\.])?$/", $sSayi, $aMatches)) {
            return FALSE;
        }
        $sIsaret = "";
        if ($aMatches[1] == "-") {
            $sIsaret .= "-";
        }
        $sTamKisim = ltrim($aMatches[2], "0");
        if (empty($sTamKisim)) {
            $sTamKisim = "0";
        }
        $sOndalikKisim = ltrim($aMatches[3], ".");
        $sOndalikKisim = rtrim($sOndalikKisim, "0");
        if (empty($sOndalikKisim)) {
            $sOndalikKisim = "";
        }
        $sSiralamaIsareti = "";
        if ($aMatches[4] == ".") {
            $sSiralamaIsareti = ".";
        }
        $aExploded["Isaret"] = $sIsaret;
        $aExploded["TamKisim"] = $sTamKisim;
        $aExploded["OndalikKisim"] = $sOndalikKisim;
        $aExploded["SiralamaIsareti"] = $sSiralamaIsareti;
        return $aExploded;
    }

}
