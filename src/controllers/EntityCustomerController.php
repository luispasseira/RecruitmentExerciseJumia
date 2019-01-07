<?php

use repositories\EntityCustomerRepository;

/**
 * returns all phone numbers
 */
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
 * returns all phone numbers from given country
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
 * returns all phone numbers with given country
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