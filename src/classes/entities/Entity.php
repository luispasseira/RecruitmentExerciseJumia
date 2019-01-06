<?php
/**
 * Created by PhpStorm.
 * User: LuisPasseira
 * Date: 1/4/2019
 * Time: 8:05 PM
 */

namespace entities;


class Entity implements \IEntity
{
    protected $id;

    /**
     * @return int
     */
    public function getId() : int{
        return $this->id;
    }

    /**
     * @return array
     */
    public static function getTableFields(): array
    {
        return array();
    }

    /**
     * @return string
     */
    public static function getTableName(): string
    {
        return "";
    }
}