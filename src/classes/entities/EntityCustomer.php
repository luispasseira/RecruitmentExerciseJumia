<?php

namespace entities;

use REJ\PhoneNumberDetailChecker;
use REJ\PhoneNumberValidator;

class EntityCustomer extends Entity
{
    protected $id;
    private $name; //Just to be consistent. Never used.
    private $phoneNumber;
    private $phoneCountryName;
    private $phoneCountryCode;
    private $isValidPhoneNumber;

    /**
     ******* BEGIN SETS *******
     */

    /**
     * @param string $phone
     */
    public function setPhoneNumber(string $phone): void
    {
        $this->phoneNumber = $phone;
    }

    /**
     * @param bool $isValid
     */
    public function setIsValidPhoneNumber(bool $isValid): void
    {
        $this->isValidPhoneNumber = $isValid;
    }

    /**
     * @param mixed $phoneCountryName
     */
    public function setPhoneCountryName($phoneCountryName): void
    {
        $this->phoneCountryName = $phoneCountryName;
    }

    /**
     * @param mixed $phoneCountryCode
     */
    public function setPhoneCountryCode($phoneCountryCode): void
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
    public function assignPhoneNumberState(): void
    {
        $this->setIsValidPhoneNumber(PhoneNumberValidator::isValidPhoneNumber($this->getPhoneNumber()));
    }

    /**
     * Sets $phoneCountryName value.
     */
    public function assignPhoneNumberCountryName(): void
    {
        $this->setPhoneCountryName(PhoneNumberDetailChecker::getCountryName($this->getPhoneNumber()));
    }

    /**
     * Sets $phoneCountryCode value.
     */
    public function assignPhoneNumberCountryCode(): void
    {
        $this->setPhoneCountryCode(PhoneNumberDetailChecker::getCountryCode($this->getPhoneNumber()));
    }

    /**
     ******* END SPECIFIC METHODS *******
     */
}