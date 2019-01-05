<?php

namespace REJ;

class PhoneNumberValidator
{
    /**
     * @param string $phone
     * @return bool
     */
    private static function isValidCameroonPhoneNumber(string $phone): bool
    {
        return preg_match('/\(237\)\ ?[2368]\d{7,8}$/', $phone);
    }

    /**
     * @param string $phone
     * @return bool
     */
    private static function isValidEthiopiaPhoneNumber(string $phone): bool
    {
        return preg_match('/\(251\)\ ?[1-59]\d{8}$/', $phone);
    }

    /**
     * @param string $phone
     * @return bool
     */
    private static function isValidMoroccoPhoneNumber(string $phone): bool
    {
        return preg_match('/\(212\)\ ?[5-9]\d{8}$/', $phone);
    }

    /**
     * @param string $phone
     * @return bool
     */
    private static function isValidMozambiquePhoneNumber(string $phone): bool
    {
        return preg_match('/\(258\)\ ?[28]\d{7,8}$/', $phone);
    }

    /**
     * @param string $phone
     * @return bool
     */
    private static function isValidUgandaPhoneNumber(string $phone): bool
    {
        return preg_match('/\(256\)\ ?\d{9}$/', $phone);
    }

    /**
     * Validates given phone number for the following countries:
     * Cameroon, Ethiopia, Morocco, Mozambique, Uganda.
     *
     * @param string $phone
     * @return bool
     */
    public static function isValidPhoneNumber(string $phone): bool
    {
        $isValid = false;

        if (self::isValidCameroonPhoneNumber($phone))
            $isValid = true;
        if (self::isValidEthiopiaPhoneNumber($phone))
            $isValid = true;
        if (self::isValidMoroccoPhoneNumber($phone))
            $isValid = true;
        if (self::isValidMozambiquePhoneNumber($phone))
            $isValid = true;
        if (self::isValidUgandaPhoneNumber($phone))
            $isValid = true;

        return $isValid;
    }
}