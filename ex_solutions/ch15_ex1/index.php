<?php
require_once('model/fields.php');
require_once('model/validate.php');

$validate = new Register\Validate();
$fields = $validate->getFields();
$fields->addField('email', 'Must be a valid email address.');
$fields->addField('password', 'Must be at least 8 characters.');
$fields->addField('verify');
$fields->addField('first_name');
$fields->addField('last_name');
$fields->addField('address');
$fields->addField('city');
$fields->addField('state', 'Use 2 character abbreviation.');
$fields->addField('zip', 'Use 5 or 9 digit ZIP code.');
$fields->addField('phone', 'Use 999-999-9999 format.');
$fields->addField('birthdate', 'Use mm/dd/yyyy format.');
$fields->addField('card_type');
$fields->addField('card_number', 'Enter number with or without dashes.');
$fields->addField('exp_date', 'Use mm/yyyy format.');

if (isset($_POST['action'])) {
    $action =  $_POST['action'];
} else {
    $action =  'reset';
}

$action = strtolower($action);
switch ($action) {
    case 'reset':
        include 'view/register.php';
        break;
    case 'register':
        // Copy form values to local variables
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $verify = $_POST['verify'];
        $firstName = trim($_POST['first_name']);
        $lastName = trim($_POST['last_name']);
        $address = trim($_POST['address']);
        $city = trim($_POST['city']);
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $phone = $_POST['phone'];
        $birthdate = $_POST['birthdate'];
        $cardType = $_POST['card_type'];
        $cardNumber = $_POST['card_number'];
        $cardDigits = preg_replace('/[^[:digit:]]/', '', $cardNumber);
        $expDate = $_POST['exp_date'];

        // Validate form data
        $validate->email('email', $email);
        $validate->password('password', $password);
        $validate->verify('verify', $password, $verify);
        $validate->text('first_name', $firstName);
        $validate->text('last_name', $lastName);
        $validate->text('address', $address, false);
        $validate->text('city', $city, false);
        $validate->state('state', $state, false);
        $validate->zip('zip', $zip, false);
        $validate->phone('phone', $phone);
        $validate->birthdate('birthdate', $birthdate);
        $validate->cardType('card_type', $cardType);
        $validate->cardNumber('card_number', $cardDigits, $cardType);
        $validate->expDate('exp_date', $expDate);

        // Load appropriate view based on hasErrors
        if ($fields->hasErrors()) {
            include 'view/register.php';
        } else {
            include 'view/success.php';
        }
        break;
}
?>