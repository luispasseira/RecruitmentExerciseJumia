<?php
interface IEntity{
    public static function getTableName() : string;
    public static function getTableFields() : array;
}