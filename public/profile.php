<?php
$public_access = true;
require_once '../resources/lib/autoload.php';
printHead('profile');
printNav();?>
<form class="form1" action="../resources/lib/updateUser.php" method="post">
    <input type="hidden" name="id_user" value ="<?echo $_SESSION["user"]["kla_id"]?>">
    <input type="text" name="update_user" id="signup_user" placeholder="Username" readonly value="<?echo $_SESSION["user"]["kla_username"]?>">
    <div class="radio-container">
    <label for="male">Male</label>
    <input type="radio" id="male" name="gender" value="male"<?php echo radiobutton2("male") ?>/>
    <label for="female">Female</label>
    <input type="radio" id="female" name="gender" value="female" <?php echo radiobutton2("female") ?>/>
    <label for="other">Other</label>
    <input type="radio" id="other" name="gender" value="other" <?php echo radiobutton2("other") ?>/>
    </div>
    <input type="text" name="voornaam_user" id="voornaam_user" placeholder="Name" value="<?echo $_SESSION["user"]["kla_voornaam"]?>">
    <input type="text" name="achternaam_user" id="achternaam_user" placeholder="Surname" value="<?echo $_SESSION["user"]["kla_achternaam"]?>">
    <input type="email" name="email_user" id="email_user" placeholder="Email-adress" value="<?echo $_SESSION["user"]["kla_email"]?>">
    <input type="text" name="straatnaam_user" id="straatnaam_user" placeholder="Streetname" value="<?echo $_SESSION["user"]["kla_straat"]?>">
    <input type="text" name="house_number_user" id="house_number_user" placeholder="House Number" value="<?echo $_SESSION["user"]["kla_huisnr"]?>">
    <input type="text" name="gemeente_user" id="gemeente_user" placeholder="City" value="<?echo $_SESSION["user"]["kla_gemeente"]?>">
    <input type="text" name="postcode_user" id="postcode_user" placeholder="Postcode" value="<?echo $_SESSION["user"]["kla_postcode"]?>">
    <div class="buttoncontainer">
        <button class="green_button" type="submit">submit</button>
</form>

<form class='form2' action="../resources/lib/delete_user.php" method="post">
    <input type="hidden" name="id_user" value ="<?echo $_SESSION["user"]["kla_id"]?>">
    <button class="red_button" type="submit">delete user</button>
</form></div>
</form>
<?php
printFooter();
?>
<script>
    // JS to hide loader on page load
    window.addEventListener("load", function() {
        const loader = document.querySelector(".loader");
        loader.className += " hidden"; // class "loader hidden"
    });
</script>
</body>
</html>