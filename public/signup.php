<?php

require_once '../resources/lib/autoload.php';
printHead("signup");
//add csrf
$csrf = GenerateCSRF("submitform.php");
printSignup($csrf);


?>
</body>

</html>