<?php

namespace classes\phoneNumberHelpers;

use PHPUnit\Framework\TestCase;

class PhoneNumberDetailCheckerTest extends TestCase
{
    /*** Cameroon ***/
    public function testIsCameroonPhoneNumber()
    {
        $this->assertTrue(PhoneNumberDetailChecker::isCameroonPhoneNumber('(237) 697151594'));
    }

    public function testIsNotCameroonPhoneNumber()
    {
        $this->assertFalse(PhoneNumberDetailChecker::isCameroonPhoneNumber('(212) 6007989253'));
    }

    /*** Ethiopia ***/
    public function testIsEthiopiaPhoneNumber()
    {
        $this->assertTrue(PhoneNumberDetailChecker::isEthiopiaPhoneNumber('(251) 914701723'));
    }

    public function testIsNotEthiopiaPhoneNumber()
    {
        $this->assertFalse(PhoneNumberDetailChecker::isEthiopiaPhoneNumber('(281) 9119454961'));
    }

    /*** Morocco ***/
    public function testIsMoroccoPhoneNumber()
    {
        $this->assertTrue(PhoneNumberDetailChecker::isMoroccoPhoneNumber('(212) 691933626'));
    }

    public function testIsNotMoroccoPhoneNumber()
    {
        $this->assertFalse(PhoneNumberDetailChecker::isMoroccoPhoneNumber('(282) 6007989253'));
    }

    /*** Mozambique ***/
    public function testIsMozambiquePhoneNumber()
    {
        $this->assertTrue(PhoneNumberDetailChecker::isMozambiquePhoneNumber('(258) 823747618'));
    }

    public function testIsNotMozambiquePhoneNumber()
    {
        $this->assertFalse(PhoneNumberDetailChecker::isMozambiquePhoneNumber('(288) 84330678235'));
    }

    /*** Uganda ***/
    public function testIsUgandaPhoneNumber()
    {
        $this->assertTrue(PhoneNumberDetailChecker::isUgandaPhoneNumber('(256) 714660221'));
    }

    public function testIsNotUgandaPhoneNumber()
    {
        $this->assertFalse(PhoneNumberDetailChecker::isUgandaPhoneNumber('(286) 7503O6263'));
    }
}