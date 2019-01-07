<?php

namespace classes\databases;

use entities\Entity;
use interfaces\IDatabaseBehaviour;
use interfaces\IEntity;

class DBSqlLite implements IDatabaseBehaviour
{
    protected $connectionPath = "sqlite:C:/wamp64/www/RecruitmentExerciseJumia/database/sample.db";
    protected $connection;

    /**
     ******* BEGIN SETS *******
     */

    /**
     * @param string $connectionPath
     */
    public function setConnectionPath(string $connectionPath): void
    {
        $this->connectionPath = $connectionPath;
    }

    /**
     * @param \PDO $PDO
     */
    protected function setConnection(\PDO $PDO): void
    {
        $this->connection = $PDO;
    }

    /**
     ******* END SETS *******
     */

    /**
     ******* BEGIN GETS *******
     */

    /**
     * @return string
     */
    public function getConnectionPath(): string
    {
        return $this->connectionPath;
    }

    /**
     * @return \PDO
     */
    public function getConnection(): ?\PDO
    {
        return $this->connection;
    }

    /**
     ******* END GETS *******
     */

    /**
     ******* BEGIN INHERITED METHODS *******
     */

    /**
     * @return bool
     */
    public function openConnection(): bool
    {
        try {
            if (is_null($this->getConnection())) {
                $this->setConnection(new \PDO($this->getConnectionPath()));
            }
            $isConnected = true;
        } catch (\Exception $ex) {
            $isConnected = false;
        }
        return $isConnected;
    }

    /**
     *
     */
    public function closeConnection(): void
    {
        $this->connection = null;
    }

    /**
     * @param IEntity $entity
     * @return array
     */
    public function getAll(IEntity $entity): array
    {
        $result = ['Failed to load...'];
        if ($this->openConnection()) {
            $result = $this->executeQuery("SELECT * FROM " . $entity->getTableName());
            $this->closeConnection();
        }

        return $result;
    }

    /**
     * @param IEntity $entity
     * @param array $fields
     * @return array
     */
    public function getAllByFields(IEntity $entity, array $fields): array
    {
        $result = ['Failed to load...'];
        if ($this->openConnection()) {
            $result = $this->executeQuery("SELECT " . implode($fields, ', ') . " FROM " . $entity->getTableName());
            $this->closeConnection();
        }

        return $result;
    }

    /**
     * @param IEntity $entity
     * @param array $fields
     * @param string $countryCode
     * @return array
     */
    public function getAllByCountryCode(IEntity $entity, array $fields, string $countryCode): array
    {

        $result = ['Failed to load...'];
        if ($this->openConnection()) {
            $result = $this->executeQuery("SELECT " . implode($fields, ', ') . " FROM " . $entity->getTableName() . " WHERE phone LIKE '(" . $countryCode . ")%'");
            $this->closeConnection();
        }

        return $result;
    }

    /**
     * @param string $query
     * @return array
     */
    private function executeQuery(string $query): array
    {
        $customers = [];
        $stmt = $this->getConnection()->query($query);

        while ($row = $stmt->fetch()) {
            $customers[] = $row;
        }

        if ($customers)
            return $customers;
        else {
            return [];
        }
    }

    /**
     ******* END SPECIFIC METHODS *******
     */


}