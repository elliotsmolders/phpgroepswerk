<?php

require_once '../resources/lib/autoload.php';
printHead("signup");
//add extra elements
$csrf = GenerateCSRF( "submitform.php"  );
printSignup($csrf);




?>
</body>

</html>