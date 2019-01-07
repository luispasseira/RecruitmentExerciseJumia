<?php
namespace interfaces;
interface IDatabaseBehaviour{
    public function openConnection() : bool;
    public function closeConnection() : void;
    public function getAll(IEntity $entity) : array;
    public function getAllByFields(IEntity $entity, array $fields) : array;
}