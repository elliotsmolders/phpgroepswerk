<?php

require_once '../resources/lib/autoload.php';
print_r($msgs);

printHead('home');
printNav();
?>

<p class="<?php echo isRegistered($msgs['registered'])?>" id="register_message"><?php print_r($msgs['registered']) ; ?></p>
<?php
printHomeTop();
//can print as many products as you want
printHomeProduct();
printHomeBottom();
printFooter();


?>
<script>
    // close the div in 5 secs
    window.setTimeout("hideMessage();", 3000);
    window.setTimeout("closeMessage();", 10000);
    function hideMessage(){
        document.getElementById("register_message").style.backgroundColor='transparent';
    }

    function closeMessage(){
        document.getElementById("register_message").style.display=" none";
    }
</script>
</body>

</html>