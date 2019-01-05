<?php

namespace REJ;

class EntityCustomerRepository
{
    public static function findAllPhoneNumbers(): array
    {
        $result = array(['Failed to load...']);
        $connectionPath = "C:\Users\LuisPasseira\Desktop\RecruitmentExerciseJumia\database";
        $dbConnection = DBSqlLite::withConnectionPath($connectionPath);

        if ($dbConnection->openConnection()) {
            $result = $dbConnection->getAllByFields(new Entity(), array(['phone']));
        }

        $dbConnection->closeConnection();

        return $result;
    }
}