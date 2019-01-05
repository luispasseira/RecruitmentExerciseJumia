<?php

namespace REJ;

class Database implements \IDatabaseBehaviour
{
    protected $connectionPath;
    protected $connection;

    /**
     * @param string $stringPath
     */
    public function setStringPath(string $stringPath): void
    {
        $this->stringPath = $stringPath;
    }

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
     * @return string
     */
    public function getConnectionPath(): string
    {
        return $this->connectionPath;
    }

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
     * @param Entity $entity
     * @return array
     */
    public function getAll(Entity $entity): array
    {
        return array();
    }

    /**
     * @param Entity $entity
     * @param array $fields
     * @return array
     */
    public function getAllByFields(Entity $entity, array $fields): array
    {
        return array();
    }

    /**
     * @param string $query
     * @return array
     */
    private function executeQuery(string $query): array
    {
        return array();
    }
}