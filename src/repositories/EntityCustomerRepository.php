<?php

namespace REJ;

class EntityCustomerRepository
{
    public static function findAllPhoneNumbers(): array
    {
        $connectionPath = "C:\Users\LuisPasseira\Desktop\RecruitmentExerciseJumia\database";
        $dbConnection = DBSqlLite::withConnectionPath($connectionPath);

        $queryResult = $dbConnection->getAllByFields(new Entity(), array(['phone']));

        return EntityCustomerConverter::convertArrayStringIntoCustomersPhoneNumbers($queryResult);
    }

    public static function findAllPhoneNumbersByCountry(string $country): array
    {
        $connectionPath = "C:\Users\LuisPasseira\Desktop\RecruitmentExerciseJumia\database";
        $dbConnection = DBSqlLite::withConnectionPath($connectionPath);

        $queryResult = $dbConnection->getAllByFields(new Entity(), array(['phone']));

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