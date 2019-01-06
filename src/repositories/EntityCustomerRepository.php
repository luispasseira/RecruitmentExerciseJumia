<?php

namespace repositories;

use databases\DBSqlLite;
use entities\EntityCustomer;
use REJ\EntityCustomerConverter;


class EntityCustomerRepository
{
    public static function findAllPhoneNumbers(): array
    {
        $dbConnection = new DBSqlLite();
        $queryResult = $dbConnection->getAllByFields(new EntityCustomer(), array(['phone']));

        return EntityCustomerConverter::convertArrayStringIntoCustomersPhoneNumbers($queryResult);
    }

    public static function findAllPhoneNumbersByCountry(string $country): array
    {
        $connectionPath = "C:\Users\LuisPasseira\Desktop\RecruitmentExerciseJumia\database";
        $dbConnection = DBSqlLite::withConnectionPath($connectionPath);

        $queryResult = $dbConnection->getAllByFields(new EntityCustomer(), array(['phone']));

        return EntityCustomerConverter::convertArrayStringIntoCustomersPhoneNumbers($queryResult);
    }

    public static function findAllPhoneNumbersByState(string $state): array
    {
        $connectionPath = "C:\Users\LuisPasseira\Desktop\RecruitmentExerciseJumia\database";
        $dbConnection = DBSqlLite::withConnectionPath($connectionPath);

        $queryResult = $dbConnection->getAllByFields(new Entity(), array(['phone']));

        return EntityCustomerConverter::convertArrayStringIntoCustomersPhoneNumbers($queryResult);
    }
}