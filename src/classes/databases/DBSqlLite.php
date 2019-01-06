<?php

namespace databases;

use entities\Entity;

class DBSqlLite implements \IDatabaseBehaviour
{
    protected $connectionPath = "C:\wamp64\www\RecruitmentExerciseJumia\database\\";
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
    public function getConnection(): \PDO
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
        $isConnected = false;

        try {
            $this->setConnection(new \PDO($this->getConnectionPath()));
            $isConnected = true;
        } catch (\Exception $ex) {
            return $isConnected;
        }
        return $isConnected;
    }

    /**
     * @return bool
     */
    public function closeConnection(): bool
    {
        return $this->connection = null;
    }

    /**
     * @param \IEntity $entity
     * @return array
     */
    public function getAll(\IEntity $entity): array
    {
        $result = array(['Failed to load...']);
        if ($this->openConnection()) {
            $result = $this->executeQuery("SELECT * FROM " . $entity->getTableName());
            $this->closeConnection();
        }

        return $result;
    }

    /**
     * @param Entity $entity
     * @param array $fields
     * @return array
     */
    public function getAllByFields(\IEntity $entity, array $fields): array
    {
        $result = array(['Failed to load...']);
        if ($this->openConnection()) {
            $result = $this->executeQuery("SELECT " . $this->getStringFromArray($fields) . " FROM " . $entity->getTableName());
            $this->closeConnection();
        }

        return $result;
    }

    /**
     ******* END INHERITED METHODS *******
     */

    /**
     ******* BEGIN SPECIFIC METHODS *******
     */

    /**
     * @param array $arr
     * @return string
     */
    private function getStringFromArray(array $arr): string
    {
        $returnString = "";
        for ($i = 0; $i < sizeof($arr); $i++) {
            if ($arr[$i] != sizeof($arr))
                $returnString .= $arr[$i] . ", ";
            else
                $returnString .= $arr[$i];
        }
        return $returnString;
    }

    /**
     * @param string $query
     * @return array
     */
    private function executeQuery(string $query): array
    {
        $result = $this->getConnection()->query($query);
        if (!$result)
            return (array)$result;
        else
            return array(['Failed to load...']);
    }

    /**
     ******* END SPECIFIC METHODS *******
     */


}