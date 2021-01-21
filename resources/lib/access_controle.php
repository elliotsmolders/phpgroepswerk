<?php
CheckAccess();
//checks if public access is set to true or user is logged in
function CheckAccess()
{
    global $public_access;
    if ( ! $public_access AND ! isset($_SESSION['user']) )
    {
        GoToNoAccess();
    }
}
//otherwise sent to no access page
function GoToNoAccess()
{
    global $app_root;

    header("Location: " . $app_root . "/no_access.php");
    exit;
}
