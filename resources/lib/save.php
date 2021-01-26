<?php
$public_access = true;

require_once 'autoload.php';

//controleert of de form method post is
if ( $_SERVER['REQUEST_METHOD'] == "POST" )
{
//controle CSRF token
    if ( ! key_exists("csrf", $_POST)) die("Missing CSRF");
//var_dump($_POST['csrf']);

    if ( ! hash_equals( $_POST['csrf'], $_SESSION['lastest_csrf'] ) ) die("Problem with CSRF");

//clear csrf token
    $_SESSION['lastest_csrf'] = "";

// store http_referer in variable so we can link back to form on error
    $sending_form_uri = $_SERVER['HTTP_REFERER'];

// check if the email already exists
    $email = $_POST["email_user"];
    CheckUniqueUsrEmail($email);

// check if username already exists
    $username_post = $_POST["signup_user"];
    CheckUniqueUsrUsername($username_post);

// check if password length is >8
    ValidateUsrPasswordLength($_POST["password_user"]);

// check if password === confirm password
    ValidateUsrPasswordConfirm($_POST["password_user"],$_POST["password_user_confirm"]);

//terugkeren naar afzender als er een fout is
    if ( isset($_SESSION['errors']) && count($_SESSION['errors']) > 0 )
    {
        $_SESSION['OLD_POST_SIGNUP'] = $_POST;
        $_SESSION['OLD_ERROR'] = $_SESSION['errors'];
        header( "Location: " . $sending_form_uri ); exit();
    }

    /*$_SESSION['OLD_POST']["voornaam_user"]

    to keep old post values on error set every input fields value to  (use registrion_form_input.html + printregistrationinput for this maybe?)
    value="echo isset($_SESSION['OLD_POST']["voornaam_user"]) ? $_SESSION['OLD_POST']["voornaam_user"] : '';"}*/

//setting form values as variables
    $voornaam = $_POST["voornaam_user"];
    $achternaam = $_POST["achternaam_user"];
    $straat = $_POST["straatnaam_user"];
    $huisnr = $_POST["house_number_user"];
    $postcode = $_POST["postcode_user"];
    $gemeente = $_POST["gemeente_user"];
    $password_encrypted = password_hash( $_POST["password_user"], PASSWORD_BCRYPT );

    $gender = $_POST["gender"];
//defining the sql statement
    $sql = "INSERT INTO klanten (kla_voornaam,kla_achternaam,kla_straat,
kla_huisnr,kla_postcode,kla_gemeente,kla_wachtwoord,kla_email,kla_username,kla_geslacht)
 VALUES ('$voornaam','$achternaam','$straat','$huisnr','$postcode','$gemeente','$password_encrypted','$email','$username_post','$gender')";
//executing the sql
    ExecuteSQL($sql);
    $_SESSION['msgs']['registered'] = "You have been succesfully registered!";
    header( "Location: ../../public/index.php");
}

