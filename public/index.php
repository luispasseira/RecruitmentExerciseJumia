<?php

require __DIR__ . "/../vendor/autoload.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    include '../src/controllers/EntityCustomerController.php';

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
            default:
                echo json_encode(['message'=>"404 not found"]);
        }
    }

} else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    include 'views/phoneNumbers.html';
}
