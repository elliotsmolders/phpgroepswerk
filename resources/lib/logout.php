<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access =  true;
require_once 'autoload.php';
$_SESSION["user"] = [];
session_destroy();
session_start();
$_SESSION['msgs']['logged_out'] = "You have been logged out!";
header("Location: ../../public/index.php");
