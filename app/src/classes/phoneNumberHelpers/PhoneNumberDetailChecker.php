<?php

namespace classes\phoneNumberHelpers;

class PhoneNumberDetailChecker
{
    /**
     * @param string $phone
     * @return bool
     * checks if given phone is from Cameroon
     */
    public static function isCameroonPhoneNumber(string $phone): bool
    {
        return substr($phone, 0, 5) == "(237)";
    }

    /**
     * @param string $phone
     * @return bool
     * checks if given phone is from Ethiopia
     */
    public static function isEthiopiaPhoneNumber(string $phone): bool
    {
        return substr($phone, 0, 5) == "(251)";
    }

    /**
     * @param string $phone
     * @return bool
     * checks if given phone is from Morocco
     */
    public static function isMoroccoPhoneNumber(string $phone): bool
    {
        return substr($phone, 0, 5) == "(212)";
    }

    /**
     * @param string $phone
     * @return bool
     * checks if given phone is from Mozambique
     */
    public static function isMozambiquePhoneNumber(string $phone): bool
    {
        return substr($phone, 0, 5) == "(258)";
    }

    /**
     * @param string $phone
     * @return bool
     * checks if given phone is from Uganda
     */
    public static function isUgandaPhoneNumber(string $phone): bool
    {
        return substr($phone, 0, 5) == "(256)";
    }

    /**
     * @param string $phone
     * @return string
     * gets the country name from given phone
     */
    public static function getCountryName(string $phone): string
    {
        $countryName = "Unknown";

        if (self::isCameroonPhoneNumber($phone))
            $countryName = "Cameroon";
        if (self::isEthiopiaPhoneNumber($phone))
            $countryName = "Ethiopia";
        if (self::isMoroccoPhoneNumber($phone))
            $countryName = "Morocco";
        if (self::isMozambiquePhoneNumber($phone))
            $countryName = "Mozambique";
        if (self::isUgandaPhoneNumber($phone))
            $countryName = "Uganda";

        return $countryName;
    }

    /**
     * @param string $phone
     * @return string
     * gets the country code from given phone
     */
    public static function getCountryCode(string $phone): string
    {
        $countryCode = "000";

        if (self::isCameroonPhoneNumber($phone))
            $countryCode = "237";
        if (self::isEthiopiaPhoneNumber($phone))
            $countryCode = "251";
        if (self::isMoroccoPhoneNumber($phone))
            $countryCode = "212";
        if (self::isMozambiquePhoneNumber($phone))
            $countryCode = "258";
        if (self::isUgandaPhoneNumber($phone))
            $countryCode = "256";

        return $countryCode;
    }


}