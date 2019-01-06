<?php

use repositories\EntityCustomerRepository;

function indexCustomersPhoneNumbers(): void
{
    try {
        $response = EntityCustomerRepository::findAllPhoneNumbers();
    } catch (\Exception $exception) {
        $response = ['message' => $exception->getMessage()];
    }
    echo json_encode($response);
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