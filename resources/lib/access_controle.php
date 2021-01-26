<?php
CheckAccess();
//checks if public access is set to true or user is logged in
function CheckAccess()
{
    global $public_access;
    if (!isset($_SESSION['user']) and !$public_access ){
        GoToNoAccess();
    }
}
//otherwise sent to no access page
function GoToNoAccess()
{
    header("Location:https://wdev.be/elliot21/groepswerk_php_25_01/public/no_access.php");    exit;
}
