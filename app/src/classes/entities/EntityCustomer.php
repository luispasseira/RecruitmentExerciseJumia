<?php

namespace classes\entities;

use classes\phoneNumberHelpers\PhoneNumberDetailChecker;
use classes\phoneNumberHelpers\PhoneNumberValidator;


class EntityCustomer extends Entity implements \JsonSerializable
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    private $name; //Just to be consistent. Never used.

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $phoneCountryName;

    /**
     * @var string
     */
    private $phoneCountryCode;

    /**
     * @var bool
     */
    private $isValidPhoneNumber;

    /**
     ******* BEGIN SETS *******
     */

    /**
     * @param string $phone
     */
    public function setPhoneNumber(string $phone)
    {
        //removes the (xxx) from the phone number.
        $this->phoneNumber =  substr($phone, 6);
    }

    /**
     * @param bool $isValid
     */
    public function setIsValidPhoneNumber(bool $isValid)
    {
        $this->isValidPhoneNumber = $isValid;
    }

    /**
     * @param mixed $phoneCountryName
     */
    public function setPhoneCountryName($phoneCountryName)
    {
        $this->phoneCountryName = $phoneCountryName;
    }

    /**
     * @param mixed $phoneCountryCode
     */
    public function setPhoneCountryCode($phoneCountryCode)
    {
        $this->phoneCountryCode = $phoneCountryCode;
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
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getPhoneCountryName(): string
    {
        return $this->phoneCountryName;
    }

    /**
     * @return string
     */
    public function getPhoneCountryCode(): string
    {
        return $this->phoneCountryCode;
    }

    /**
     * @return string
     */
    public function isValidPhoneNumber(): bool
    {
        return $this->isValidPhoneNumber;
    }

    /**
     ******* END GETS *******
     */

    /**
     ******* BEGIN INHERITED METHODS *******
     */

    /**
     * @return string
     */
    public static function getTableName(): string
    {
        return "customer";
    }

    /**
     * @return array
     */
    public static function getTableFields(): array
    {
        return array([
            "id",
            "name",
            "phone"
        ]);
    }

    /**
     ******* END INHERITED METHODS *******
     */

    /**
     ******* BEGIN SPECIFIC METHODS *******
     */

    /**
     * Sets $isValidPhoneNumber value.
     */
    public function assignPhoneNumberState()
    {
        $this->setIsValidPhoneNumber(PhoneNumberValidator::isValidPhoneNumber($this->getPhoneNumber()));
    }

    /**
     ******* END SPECIFIC METHODS *******
     */

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
       return [
         'country' => $this->getPhoneCountryName(),
         'state' => $this->isValidPhoneNumber() ? 1 : 0,
         'country_code' => $this->getPhoneCountryCode(),
         'number' => $this->getPhoneNumber()
       ];
    }
}