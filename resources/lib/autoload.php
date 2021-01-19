<?php
session_start();

require_once 'connection_data.php';
require_once 'html_components.php';
require_once 'pdo.php';
require_once 'security.php';
//initialize $errors array
$errors = [];

if (key_exists('errors', $_SESSION) and is_array($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}
