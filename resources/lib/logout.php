<?php
require_once 'autoload.php';
$_SESSION["user"] = [];
unset($_SESSION["user"] );
session_destroy();
session_start();
$_SESSION['msgs']['logged_out'] = "You have been logged out!";
header("Location: ../../public/index.php");
