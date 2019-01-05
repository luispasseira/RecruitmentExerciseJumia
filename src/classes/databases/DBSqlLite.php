<?php

namespace REJ;

class DBSqlLite extends Database
{
    protected $connectionPath;
    protected $connection;

    //private constructor
    private function __construct()
    {

    }

    /**
     * @param string $connectionPath
     * @return DBSqlLite
     */
    public static function withConnectionPath(string $connectionPath): self
    {
        $instance = new self();
        $instance->setConnectionPath($connectionPath);
        return $instance;
    }

    /**
     ******* BEGIN SETS *******
     */

    /**
     * @param string $connectionPath
     */
    public function setConnectionPath(string $connectionPath): void
    {
        parent::setConnectionPath($connectionPath);
    }

    /**
     * @param \PDO $PDO
     */
    protected function setConnection(\PDO $PDO): void
    {
        parent::setConnection($PDO);
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
        return parent::getConnectionPath();
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
        return parent::openConnection();
    }

    /**
     * @return bool
     */
    public function closeConnection(): bool
    {
        return parent::closeConnection();
    }

    /**
     * @param Entity $entity
     * @return array
     */
    public function getAll(Entity $entity): array
    {
        return $this->executeQuery("SELECT * FROM " . $entity->getTableName());
    }

    /**
     * @param Entity $entity
     * @param array $fields
     * @return array
     */
    public function getAllByFields(Entity $entity, array $fields): array
    {
        return $this->executeQuery("SELECT " . $this->getStringFromArray($fields) . " FROM " . $entity->getTableName());

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