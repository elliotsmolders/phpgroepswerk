<?php
require_once 'autoload.php';

//setting post variables to variables
$id = $_POST["id_user"];
$voornaam = $_POST["voornaam_user"];
$achternaam = $_POST["achternaam_user"];
$straat = $_POST["straatnaam_user"];
$huisnr = $_POST["house_number_user"];
$postcode = $_POST["postcode_user"];
$gemeente = $_POST["gemeente_user"];
$email = $_POST["email_user"];
$username_post = $_POST["update_user"];
$gender = $_POST["gender"];

// (nieuwe username is uniek of username is niet veranderd) EN (email is uniek in db of niet veranderd)
if((CheckUniqueUsrUsername($username_post)
    or ($username_post === $_SESSION['user']['kla_username']))
    && (CheckUniqueUsrEmail($email)
        or ($email === $_SESSION['user']['kla_email']))){
    CheckUniqueUsrEmail($email);
    // sql statement
    $sql= 'UPDATE klanten SET kla_achternaam ="'.$achternaam.'",
kla_voornaam ="'.$voornaam.'",
kla_straat ="'.$straat.'",
kla_huisnr ="'.$huisnr.'",
kla_username ="'.$username_post.'",
kla_postcode ="'.$postcode.'",
kla_email ="'.$email.'",
kla_gemeente ="'.$gemeente.'",
kla_geslacht ="'.$gender.'" WHERE kla_id="'.$id.'"';
    //executing our update statement
    ExecuteSQL($sql);
    // after update => set session user info to the updates values
    $user_data= GetData("SELECT * FROM klanten WHERE kla_id='$id' ");
    $_SESSION['user'] = $user_data[0];
    //add message (will also add message if nothing changed, fix later if time
    $_SESSION['msgs']['edited'] = "Your profile information has been changed!";

}
header("Location: ../../public/index.php");
