<?php
$public_access = true;

require_once 'autoload.php';

// checks if email already exists in database
function CheckUniqueUsrEmail( $email )
{
    $sql = "SELECT * FROM klanten WHERE kla_email='" . $email . "'";
    $rows = GetData($sql);

    if (count($rows) > 0)
    {
        $_SESSION['errors']['usr_email_error'] = "This email-adress is already registered";
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
        $_SESSION['errors']['usr_username_error'] = "This username already exists";
        //print $_SESSION['errors']['usr_username_error'];
        return false;
    }

    return true;
}
//checks if password length >8
function ValidateUsrPasswordLength( $password )
{
    if ( strlen($password) < 8 )
    {
        $_SESSION['errors']['usr_password_length_error'] = "The password needs to contain at least 8 characters";
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
        $_SESSION['errors']['usr_password_confirm_error'] = "The passwords do not match";
        //print 'password confirm error';
        return false;
    }

    return true;
}
