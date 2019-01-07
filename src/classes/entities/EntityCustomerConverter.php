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
            $arrayCustomers[] = self::convertArrayStringIntoCustomerPhoneNumber($singleArray);
        }

        return $arrayCustomers;
    }

    /**
     * @param array $arrayCustomerPhoneNumber
     * @return EntityCustomer
     */
    public static function convertArrayStringIntoCustomerPhoneNumber (array $arrayCustomerPhoneNumber) {
        $customer = new EntityCustomer();

        //$singleArray[0] is the phone number.
        $customer->setPhoneNumber($arrayCustomerPhoneNumber['phone']);
        $customer->setIsValidPhoneNumber(PhoneNumberValidator::isValidPhoneNumber($arrayCustomerPhoneNumber['phone']));
        $customer->setPhoneCountryName(PhoneNumberDetailChecker::getCountryName($arrayCustomerPhoneNumber['phone']));
        $customer->setPhoneCountryCode(PhoneNumberDetailChecker::getCountryCode($arrayCustomerPhoneNumber['phone']));
        return $customer;
    }
}