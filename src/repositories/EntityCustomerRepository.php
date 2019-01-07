<?php

namespace repositories;

use classes\databases\DBSqlLite;
use classes\entities\EntityCustomer;
use classes\entities\EntityCustomerConverter;


class EntityCustomerRepository
{
    public static function findAllPhoneNumbers(): array
    {
        $dbConnection = new DBSqlLite();
        //query returns an array of arrays
        $queryResult = $dbConnection->getAllByFields(new EntityCustomer(), ['phone']);

        return EntityCustomerConverter::convertArrayStringIntoCustomersPhoneNumbers($queryResult);
    }

    public static function findAllPhoneNumbersByCountry(string $countryCode): array
    {
        $dbConnection = new DBSqlLite();
        $queryResult = $dbConnection->getAllByCountryCode(new EntityCustomer(), ['phone'], $countryCode);

        return EntityCustomerConverter::convertArrayStringIntoCustomersPhoneNumbers($queryResult);

    }

    public static function findAllPhoneNumbersByState(string $state): array
    {
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

        return $resultWithCountry;
    }
}