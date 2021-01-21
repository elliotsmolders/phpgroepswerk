<?php
$public_access = true;

require_once '../resources/lib/autoload.php';
printHead("signup");
$csrf = GenerateCSRF( "submitform");
$errorusername = usernameError();
$errorpassword = passwordError();
$erroremail = emailError();
//add extra elements
?>
<div class="container">
    <div class="left">
        <div class="logo">
            <a href="index.php"><img src="./images/placeholder.com-logo1.png" alt="Logo" /></a>
        </div>
        <button type="submit" form="submitform">Submit</button>
    </div>
    <form action="../resources/lib/save.php" method="POST" id="submitform"name="submitform">
        <!--security-->
        <input type="hidden" name="csrf" value="<?php print $csrf?>">
        <!--end security-->
        <div class="input_group <?php echo $errorusername ?>">
            <input
                    type="text"
                    name="signup_user"
                    id="signup_user"
                    placeholder="Username"
                    value="<?php print $_SESSION['OLD_POST_SIGNUP']['signup_user'] ;?>"

            />
        <p><?php echo $_SESSION['OLD_ERROR']['usr_username_error']; ?></p>
        </div>
        <div class="input_group <?php echo $errorpassword ?>">
            <input
                    type="password"
                    name="password_user"
                    id="password_user"
                    placeholder="Password"

            />
            <p><?php echo $_SESSION['OLD_ERROR']['usr_password_length_error']; ?></p>

        </div>
        <div class="input_group <?php echo $errorpassword ?>">
            <input
                    type="password"
                    name="password_user_confirm"
                    id="password_user_confirm"
                    placeholder="Confirm Password"
            />
            <p><?php echo $_SESSION['OLD_ERROR']['usr_password_confirm_error']; ?></p>
        </div>
        <div class="radio-container">
            <input type="radio" id="male" name="gender" value="male" <?php echo radiobutton("male") ?>    />
            <label for="male">Male</label>

            <input type="radio" id="female" name="gender" value="female"<?php echo radiobutton("female") ?>/>
            <label for="female">Female</label>

            <input type="radio" id="other" name="gender" value="other" <?php echo radiobutton("other") ?> />
            <label for="other">Other</label>
        </div>
        <div class="input_group">
            <input
                    type="text"
                    name="voornaam_user"
                    id="voornaam_user"
                    placeholder="Name"
                    value="<?php print $_SESSION['OLD_POST_SIGNUP']['voornaam_user'] ;?>"
            />
        </div>
        <div class="input_group">
            <input
                    type="text"
                    name="achternaam_user"
                    id="achternaam_user"
                    placeholder="Surname"
                    value="<?php print $_SESSION['OLD_POST_SIGNUP']['achternaam_user'] ;?>"

            />
        </div>

        <div class="input_group <?php echo $erroremail ?>">
            <input
                    type="email"
                    name="email_user"
                    id="email_user"
                    placeholder="Email-adress"
                    value="<?php print $_SESSION['OLD_POST_SIGNUP']['email_user'] ;?>"

            />
            <p><?php echo $_SESSION['OLD_ERROR']['usr_email_error']; ?></p>
        </div>
        <div class="input_group">
            <input
                    type="text"
                    name="straatnaam_user"
                    id="straatnaam_user"
                    placeholder="Streetname"
                    value="<?php print $_SESSION['OLD_POST_SIGNUP']['straatnaam_user'] ;?>"

            />
        </div>
        <div class="input_group">
            <input
                    type="text"
                    name="house_number_user"
                    id="house_number_user"
                    placeholder="House Number"
                    value="<?php print $_SESSION['OLD_POST_SIGNUP']['house_number_user'] ;?>"

            />
        </div>
        <div class="input_group">
            <input
                    type="text"
                    name="gemeente_user"
                    id="gemeente_user"
                    placeholder="City"
                    value="<?php print $_SESSION['OLD_POST_SIGNUP']['gemeente_user'] ;?>"

            />
        </div>
        <div class="input_group">
            <input
                    type="text"
                    name="postcode_user"
                    id="postcode_user"
                    placeholder="Postcode"
                    value="<?php print $_SESSION['OLD_POST_SIGNUP']['postcode_user'] ;?>"

            />
        </div>
    </form>
</div>

<?php


//OLD_ERROR leegmaken, zo worden er bij volgende requests enkel de nieuwe errors weergegeven
$_SESSION['OLD_ERROR']=[];
//OLD_POST leegmaken
$_SESSION['OLD_POST_SIGNUP']=[];


?>


</body>

</html>