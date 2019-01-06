<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    include '../src/controllers/EntityCustomerController.php';
    var_dump($_POST);
    die;
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
} else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    include 'views/phoneNumbers.html';
}
