<?php
require_once 'autoload.php';

// checks if email already exists in database
function CheckUniqueUsrEmail( $email )
{
    $sql = "SELECT * FROM klanten WHERE kla_email='" . $email . "'";
    $rows = GetData($sql);

    if (count($rows) > 0)
    {
        $_SESSION['errors']['usr_email_error'] = "Er bestaat al een gebruiker met dit e-mailadres";
        //print 'error email';
        return false;
    }

    return true;
}
// checks if username already exists in database
function CheckUniqueUsrUsername( $username )
{
    $sql = "SELECT * FROM klanten WHERE kla_username='" . $username . "'";
    $rows = GetData($sql);

    if (count($rows) > 0)
    {
        $_SESSION['errors']['usr_username_error'] = "Er bestaat al een gebruiker met dit username";
        //print 'error user';
        return false;
    }

    return true;
}
//checks if password length >8
function ValidateUsrPasswordLength( $password )
{
    if ( strlen($password) < 8 )
    {
        $_SESSION['errors']['usr_password_length_error'] = "Het wachtwoord moet minstens 8 tekens bevatten";
        //print 'password length error';
        return false;
    }

    return true;
}
// checks if password = confirm password
function ValidateUsrPasswordConfirm( $password,$confirm_password )
{
    if ( $password !== $confirm_password )
    {
        $_SESSION['errors']['usr_password_conirm_error'] = "Het wachtwoord moet hetzelfde zijn";
        //print 'password confirm error';
        return false;
    }

    return true;
}
