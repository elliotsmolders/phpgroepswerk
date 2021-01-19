<?php

require_once '../resources/lib/autoload.php';
printHead("signup");
//add extra elements
printSignup();


/*
still need to add error messages, like below after each input field that can have an error
<p class="">
   <?php
   if(isset($_SESSION['errors']['usr_email_error']))  {
       echo $_SESSION['errors']['usr_email_error'];
       unset($_SESSION['errors']['usr_email_error']);
   }
   ?>
</p>*/



?>
</body>

</html>