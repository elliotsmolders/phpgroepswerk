<?php
$public_access = true;

require_once '../resources/lib/autoload.php';
$csrf = GenerateCSRF( "loginform");
function loginerrorexist ($x){
    return $x ? 'error': '';
}
//checks if we found an error while checking if the username exists
$loginerrorusername= loginerrorexist($errors['login_username_error']);

//checks if we found an error while checking password length
$loginerrorpassword=loginerrorexist($errors['usr_password_length_error']);

//checks if we found an error while checking if password matches users password
$incorrectpassword=loginerrorexist($errors['[login_password_error]']);

printHead("login");
?>
<div class="wrapper">
    <a href="index.php"
    ><img src="./images/placeholder.com-logo1.png" alt="logo"
        /></a>
    <form
            action="../resources/lib/login_validate.php"
            method="post"
            name="loginform"
    >
        <!--security-->
        <input type="hidden" name="csrf" value="<?php print $csrf?>">
        <!--end security-->
        <h1>Login</h1>
        <div class="input_group <?php echo $loginerrorusername ?>">
            <input
                    type="text"
                    name="login_user"
                    id="login_user"
                    placeholder="Username"
                    value="<?php echo $msgs['failed_user']?>"
            />
            <!-- prints message if error in username  -->
            <p><?php echo $errors['login_username_error'] ?></p>
        </div>
        <div class="input_group <?php echo $loginerrorpassword ?>">
            <input
                    type="password"
                    name="login_password"
                    id="login_password"
                    placeholder="Password"
            />
            <!-- prints message if error in password matching database  -->
            <p><?php echo $errors ["login_password_error"] ?></p>
            <!-- prints message if error in password length  -->
            <p><?php echo $errors ['usr_password_length_error']  ?></p>
        </div>
        <input type="submit" value="Login" class="submit" />
        <!-- href= signup.html -->
        <a href="signup.php" class="signup">Don't have an account?</a>
    </form>
</div>

</body>

</html>