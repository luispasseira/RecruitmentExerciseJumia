<?php

namespace classes\phoneNumberHelpers;

use PHPUnit\Framework\TestCase;

class PhoneNumberValidatorTest extends TestCase
{
    /*** Cameroon ***/
    public function testIsValidCameroonPhoneNumber()
    {
        $this->assertTrue(PhoneNumberValidator::isValidCameroonPhoneNumber('(237) 697151594'));
    }

    public function testIsNotValidCameroonPhoneNumber()
    {
        $this->assertFalse(PhoneNumberValidator::isValidCameroonPhoneNumber('(212) 6007989253'));
    }

    /*** Ethiopia ***/
    public function testIsValidEthiopiaPhoneNumber()
    {
        $this->assertTrue(PhoneNumberValidator::isValidEthiopiaPhoneNumber('(251) 914701723'));
    }

    public function testIsNotValidEthiopiaPhoneNumber()
    {
        $this->assertFalse(PhoneNumberValidator::isValidEthiopiaPhoneNumber('(251) 9119454961'));
    }

    /*** Morocco ***/
    public function testIsValidMoroccoPhoneNumber()
    {
        $this->assertTrue(PhoneNumberValidator::isValidMoroccoPhoneNumber('(212) 691933626'));
    }

    public function testIsNotValidMoroccoPhoneNumber()
    {
        $this->assertFalse(PhoneNumberValidator::isValidMoroccoPhoneNumber('(212) 6007989253'));
    }

    /*** Mozambique ***/
    public function testIsValidMozambiquePhoneNumber()
    {
        $this->assertTrue(PhoneNumberValidator::isValidMozambiquePhoneNumber('(258) 823747618'));
    }

    public function testIsNotValidMozambiquePhoneNumber()
    {
        $this->assertFalse(PhoneNumberValidator::isValidMozambiquePhoneNumber('(258) 84330678235'));
    }

    /*** Uganda ***/
    public function testIsValidUgandaPhoneNumber()
    {
        $this->assertTrue(PhoneNumberValidator::isValidUgandaPhoneNumber('(256) 714660221'));
    }

    public function testIsNotValidUgandaPhoneNumber()
    {
        $this->assertFalse(PhoneNumberValidator::isValidUgandaPhoneNumber('(256) 7503O6263'));
    }
}
