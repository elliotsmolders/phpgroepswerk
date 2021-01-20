<?php

require_once '../resources/lib/autoload.php';

printHead('home');
printNav();
?>

<p class="<?php echo isRegistered($msgs['registered'])?>"><?php print_r($msgs['registered']) ; ?></p>
<?php
printHomeTop();
//can print as many products as you want
printHomeProduct();
printHomeBottom();
printFooter();


?>
</body>

</html>