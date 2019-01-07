<?php

namespace  classes\entities;

use PHPUnit\Framework\TestCase;

class EntityCustomerConverterTest extends TestCase
{
    public function testConvertArrayStringIntoCustomerPhoneNumber () {
        $arrayToBeConverted = [
            'phone' => '(212) 6007989253'
        ];

        $expectingResult = [
            'country'=> "Morocco",
            'state'=> 0,
            'country_code'=> "212",
            'number'=> "6007989253",
        ];

        $response = EntityCustomerConverter::convertArrayStringIntoCustomerPhoneNumber($arrayToBeConverted);

        $this->assertEquals(json_encode($expectingResult), json_encode($response));
    }
}
