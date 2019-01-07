<?php

namespace classes\phoneNumberHelpers;

use PHPUnit\Framework\TestCase;

class PhoneNumberValidatorTest extends TestCase
{

    public function testIsValidCameroonPhoneNumber()
    {
        $this->assertTrue(PhoneNumberValidator::isValidCameroonPhoneNumber('(237) 697151594'));
    }

    public function testIsNotValidCameroonPhoneNumber()
    {
        $this->assertFalse(PhoneNumberValidator::isValidCameroonPhoneNumber('(212) 6007989253'));
    }
}
