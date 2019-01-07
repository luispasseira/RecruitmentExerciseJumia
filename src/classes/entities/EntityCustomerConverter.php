<?php
namespace classes\entities;

use classes\phoneNumberHelpers\PhoneNumberDetailChecker;
use classes\phoneNumberHelpers\PhoneNumberValidator;

class EntityCustomerConverter
{
    /**
     * @param array $resultArray
     * @return array
     * converts given array of PhoneNumbers into EntityCustomers phone numbers and
     * gets its country, country code and checks if its valid or not
     */
    public static function convertArrayStringIntoCustomersPhoneNumbers(array $resultArray): array
    {
        $arrayCustomers = [];
        foreach ($resultArray as $singleArray) {
            $customer = new EntityCustomer();
            //$singleArray[0] is the phone number.
            $customer->setPhoneNumber($singleArray[0]);
            $customer->setIsValidPhoneNumber(PhoneNumberValidator::isValidPhoneNumber($singleArray[0]));
            $customer->setPhoneCountryName(PhoneNumberDetailChecker::getCountryName($singleArray[0]));
            $customer->setPhoneCountryCode(PhoneNumberDetailChecker::getCountryCode($singleArray[0]));
            array_push($arrayCustomers, $customer);
        }

        return $arrayCustomers;
    }
}