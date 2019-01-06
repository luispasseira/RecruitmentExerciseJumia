<?php

use REJ\EntityCustomerRepository;

/**
 * @return string
 */
function indexCustomersPhoneNumbers(): string
{
    /*try {
        $response = json_encode(EntityCustomerRepository::findAllPhoneNumbers());
    } catch (\Exception $exception) {
        $response = $exception->getMessage();
    }*/
    return json_encode(['coisas'=>'da vida']);
}

/**
 * @param string $country
 * @return string
 */
function indexCustomersPhoneNumbersByCountry(string $country): string
{
    try {
        $response = json_encode(EntityCustomerRepository::findAllPhoneNumbers());
    } catch (\Exception $exception) {
        $response = $exception->getMessage();
    }
    return $response;
}

/**
 * @param string $state
 * @return string
 */
function indexCustomersPhoneNumbersByState(string $state): string
{
    try {
        $response = json_encode(EntityCustomerRepository::findAllPhoneNumbers());
    } catch (\Exception $exception) {
        $response = $exception->getMessage();
    }
    return $response;
}