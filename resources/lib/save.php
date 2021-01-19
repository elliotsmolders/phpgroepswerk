<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'autoload.php';

//controleert of het ww minstens 8 tekens lang is
ValidateUsrPassword($_POST['password_user']);
//controleert of het in email vorm is
ValidateUsrEmail($_POST['email_user']);
//controleert of er al een account met deze email is gekoppeld
CheckUniqueUsrEmail($_POST['email_user']);
//terugkeren naar afzender als er een fout is
if (count($_SESSION['errors']) > 0) {
    $_SESSION['OLD_POST'] = $_POST;
    header("Location: ../public/signup.php");
    exit();
}

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
