<?php
/**
 * Created by PhpStorm.
 * User: LuisPasseira
 * Date: 1/4/2019
 * Time: 8:05 PM
 */

namespace classes\entities;
use interfaces\IEntity;

class Entity implements IEntity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId() : int{
        return $this->id;
    }

    /**
     * @return array
     * to be overridden.
     */
    public static function getTableFields(): array
    {
        return array();
    }

    /**
     * @return string
     * to be overridden.
     */
    public static function getTableName(): string
    {
        return "";
    }
}