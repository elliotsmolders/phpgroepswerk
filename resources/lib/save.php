<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'autoload.php';

//controle CSRF token
if (!key_exists("csrf", $_POST)) die("Missing CSRF");
// var_dump($_POST['csrf']);
// var_dump($_SESSION['lastest_csrf']);
if (!hash_equals($_POST['csrf'], $_SESSION['lastest_csrf'])) die("Problem with CSRF");
//setting form values as variables
$_SESSION['lastest_csrf'] = "";
$voornaam = $_POST["voornaam_user"];
$achternaam = $_POST["achternaam_user"];
$straat = $_POST["straatnaam_user"];
$huisnr = $_POST["house_number_user"];
$postcode = $_POST["postcode_user"];
$gemeente = $_POST["gemeente_user"];
$password_post = password_hash($_POST["password_user"], PASSWORD_BCRYPT);
$email = $_POST["email_user"];
$username_post = $_POST["signup_user"];
$gender = $_POST["gender"];
$sql = "INSERT INTO klanten (kla_voornaam,kla_achternaam,kla_straat,
kla_huisnr,kla_postcode,kla_gemeente,kla_wachtwoord,kla_email,kla_username,kla_geslacht)
 VALUES ('$voornaam','$achternaam','$straat','$huisnr','$postcode','$gemeente','$password_post','$email','$username_post','$gender')";
ExecuteSQL($sql);
