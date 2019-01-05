<?php
interface IDatabaseBehaviour{
    public function openConnection() : bool;
    public function closeConnection() : bool;
    public function getAll(\REJ\Entity $entity) : array;
    public function getAllByFields(\REJ\Entity $entity, array $fields) : array;
}