<?php

namespace repositories;

use classes\databases\DBSqlLite;
use classes\entities\EntityCustomer;
use classes\entities\EntityCustomerConverter;


class EntityCustomerRepository
{
    /**
     * @return array
     * returns all phone numbers on db.
     */
    public static function findAllPhoneNumbers(): array
    {
        $dbConnection = new DBSqlLite();
        //query returns an array of arrays
        $queryResult = $dbConnection->getAllByFields(new EntityCustomer(), ['phone']);

        return EntityCustomerConverter::convertArrayStringIntoCustomersPhoneNumbers($queryResult);
    }

    /**
     * @param string $countryCode
     * @return array
     * returns all phone numbers on db by given country code.
     */
    public static function findAllPhoneNumbersByCountry(string $countryCode): array
    {
        $dbConnection = new DBSqlLite();
        $queryResult = $dbConnection->getAllByCountryCode(new EntityCustomer(), ['phone'], $countryCode);

        return EntityCustomerConverter::convertArrayStringIntoCustomersPhoneNumbers($queryResult);

    }

    /**
     * @param string $state
     * @return array
     * returns all phone numbers on db by given state.
     */
    public static function findAllPhoneNumbersByState(string $state): array
    {
        if ($state != "all") {
            $dbConnection = new DBSqlLite();
            $queryResult = $dbConnection->getAllByFields(new EntityCustomer(), ['phone']);

            //construct EntityCustomers
            $entityCustomerArrayResult = EntityCustomerConverter::convertArrayStringIntoCustomersPhoneNumbers($queryResult);

            $resultWithCountry = array();

            //filter which EntityCustomer has PhoneNumber from given state
            foreach ($entityCustomerArrayResult as $entityCustomer) {
                if ($entityCustomer->isValidPhoneNumber() == (bool)$state) {
                    array_push($resultWithCountry, $entityCustomer);
                }
            }
        } else {
            $resultWithCountry = EntityCustomerRepository::findAllPhoneNumbers();
        }


        return $resultWithCountry;
    }
}