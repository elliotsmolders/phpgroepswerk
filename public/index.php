<?php
$public_access = true;

require_once '../resources/lib/autoload.php';
print_r($msgs);

printHead('home');
printNav();
?>

<p class="<?php echo isRegistered($msgs['registered'])?>" id="register_message"><?php print_r($msgs['registered']) ; ?></p>
<p class="<?php echo isLoggedOut($msgs['logged_out'])?>" id="logout_message"><?php print_r($msgs['logged_out']) ; ?></p>

<?php
printHomeTop();
//can print as many products as you want
printHomeProduct();
printHomeBottom();
printFooter();


?>
<script>
    // close the div in 5 secs
    window.setTimeout("hideMessage1();", 3000);
    window.setTimeout("closeMessage1();", 10000);
    window.setTimeout("hideMessage2();", 3000);
    window.setTimeout("closeMessage2();", 10000);
    function hideMessage1(){
        document.getElementById("register_message").style.backgroundColor='transparent';
    }

    function closeMessage1(){
        document.getElementById("register_message").style.display=" none";
    }
    function hideMessage2(){
        document.getElementById("logout_message").style.backgroundColor='transparent';
    }

    function closeMessage2(){
        document.getElementById("logout_message").style.display=" none";
    }
</script>
</body>

</html>