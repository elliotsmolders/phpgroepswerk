
<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
require_once 'autoload.php';

$user_data = LoginCheck();

if ( $user_data )
{   $_SESSION['user'] = $user_data;
    $_SESSION['msgs'][] = "Welkom, " . $_SESSION['user']['usr_voornaam'];
    header("Location: ../../public/index.php");
}
else
{
    unset( $_SESSION['user']);
    print "HELAAS!";
}
function LoginCheck()
{
    if ( $_SERVER['REQUEST_METHOD'] == "POST" )
    {
        //controle CSRF token
        if ( ! key_exists("csrf", $_POST)) die("Missing CSRF");
        //var_dump($_POST['csrf']);
        //var_dump($_SESSION['lastest_csrf']);
        if ( ! hash_equals( $_POST['csrf'], $_SESSION['lastest_csrf'] ) ) die("Problem with CSRF");

        //clear csrf token
        $_SESSION['lastest_csrf'] = "";

        // store http_referer in variable so we can link back to form on error
        $sending_form_uri = $_SERVER['HTTP_REFERER'];

        //
        $usr= $_POST['login_user'];
        $pass = $_POST['login_password'];
        if ( ! key_exists("login_user", $_POST ) )
        {
            $_SESSION['errors']['login_password_length_error'] = "De gebruikersnaam is niet correct ingevuld";
        }
        if ( ! key_exists("login_password", $_POST ) OR ValidateUsrPasswordLength($pass))
        {
            $_SESSION['errors']['login_password_error'] = "Het wachtwoord is niet ingevuld";
        }
        //terugkeren naar formulier als error

        //search user in database
        $sql = "SELECT kla_wachtwoord FROM klanten WHERE kla_username='$usr' ";
        $data = GetData($sql);
        //if user exists:
        if ( count($data) > 0 )
        {
                if ( password_verify( $pass, $data[0]["kla_wachtwoord"] ) )
                    // returns all the users data on succesfull login
                    return GetData("SELECT * FROM klanten WHERE kla_username='$usr' ");

        }
        return null;
    }
}