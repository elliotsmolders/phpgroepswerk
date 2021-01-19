<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'autoload.php';

function ValidateUsrPassword($password)
{
    if (strlen($password) < 8) {
        $_SESSION['errors']['usr_password_error'] = "Het wachtwoord moet minstens 8 tekens bevatten";
        return false;
    }

    return true;
}

function ValidateUsrEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        $_SESSION['errors']['usr_email_error'] = "Geen geldig e-mailadres!";
        return false;
    }
}

function CheckUniqueUsrEmail($email)
{
    $sql = "SELECT * FROM klanten WHERE kla_email='" . $email . "'";
    $rows = GetData($sql);

    if (count($rows) > 0) {
        $_SESSION['errors']['usr_email_error'] = "Er bestaat al een gebruiker met dit e-mailadres";
        return false;
    }

    return true;
}
