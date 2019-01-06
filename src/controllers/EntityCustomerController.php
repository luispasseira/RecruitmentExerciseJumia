<?php

namespace REJ;

if (isset($_POST['functionCall']) && !empty($_POST['functionCall'])) {
    $functionCall = $_POST['functionCall'];
    switch ($functionCall) {
        case 'indexCustomersPhoneNumbers':
            indexCustomersPhoneNumbers();
            break;
        case 'indexCustomersPhoneNumbersByCountry':
            indexCustomersPhoneNumbersByCountry($_POST['country']);
            break;
        case 'indexCustomersPhoneNumbersByState':
            indexCustomersPhoneNumbersByState($_POST['state']);
            break;
    }
}

/**
 * @return string
 */
function indexCustomersPhoneNumbers(): string
{
    try {
        $response = json_encode(EntityCustomerRepository::findAllPhoneNumbers());
    } catch (\Exception $exception) {
        $response = $exception->getMessage();
    }
    return $response;
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