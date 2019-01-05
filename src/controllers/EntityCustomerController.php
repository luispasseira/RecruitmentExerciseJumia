<?php

namespace REJ;

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