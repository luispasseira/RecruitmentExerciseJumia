<?php
/**
 * Created by PhpStorm.
 * User: LuisPasseira
 * Date: 1/5/2019
 * Time: 5:09 PM
 */

namespace REJ;


class EntityCustomerConverter
{
    public static function convertArrayStringIntoCustomersPhoneNumbers(array $arrayString): array
    {
        $arrayCustomers = array();
        foreach ($arrayString as $singleString) {
            $customer = new EntityCustomer();
            $customer->setPhoneNumber($singleString);
            $customer->setIsValidPhoneNumber(PhoneNumberValidator::isValidPhoneNumber($singleString));
            $customer->setPhoneCountryName(PhoneNumberDetailChecker::getCountryName($singleString));
            $customer->setPhoneCountryCode(PhoneNumberDetailChecker::getCountryCode($singleString));
            array_push($arrayCustomers, $customer);
        }

        return $arrayCustomers;
    }
}