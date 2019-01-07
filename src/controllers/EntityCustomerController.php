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
 */
function indexCustomersPhoneNumbersByCountry(string $country): void
{
    try {
        $response = EntityCustomerRepository::findAllPhoneNumbersByCountry($country);

    } catch (\Exception $exception) {
        $response = ['message' => $exception->getMessage()];
    }

    echo json_encode($response);
}

/**
 * @param string $state
 */
function indexCustomersPhoneNumbersByState(string $state): void
{
    try {
        $response = EntityCustomerRepository::findAllPhoneNumbersByState($state);

    } catch (\Exception $exception) {
        $response = ['message' => $exception->getMessage()];
    }

    echo json_encode($response);
}