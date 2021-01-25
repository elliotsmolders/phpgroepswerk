    <?php
session_start();
$public_access = true;
require_once 'autoload.php';


$user_data = LoginCheck();

if ( $user_data )
{   $_SESSION['user'] = $user_data[0];
    $_SESSION['msgs']['login'] = "Signed in as " . $_SESSION['user']['kla_username'];
    header("Location: ../../public/index.php");
}
else
{
    unset( $_SESSION['user']);
    $_SESSION['msgs']['failed_user'] = $_POST['login_user'];
    header("Location: ../../public/login.php");
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

        if ( ! key_exists("login_user", $_POST ) )
        {
            $_SESSION['errors']['login_password_length_error'] = "No username entered";
        }
        if ( ! key_exists("login_password", $_POST ))
        {
            $_SESSION['errors']['login_password_error'] = "No password entered";
        }
        //
        $usr= $_POST['login_user'];
        $pass = $_POST['login_password'];
        ValidateUsrPasswordLength($pass);

        //search user in database
        $sql = "SELECT kla_wachtwoord FROM klanten WHERE kla_username='$usr' ";
        $data = GetData($sql);
        //if user exists:
        if ( count($data) > 0 )
        {
                if ( password_verify( $pass, $data[0]["kla_wachtwoord"] ) )
                    // returns all the users data on succesfull login
                    return GetData("SELECT * FROM klanten WHERE kla_username='$usr' ");
                else{
                    $_SESSION['errors']['login_password_error'] = "Incorrect password";
                    return null;
                }
        }
        $_SESSION['errors']['login_username_error'] = "Incorrect username";
        return null;
    }
}