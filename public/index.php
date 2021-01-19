<?php

require_once '../resources/lib/autoload.php';
printHead('home');
printNav();
printHomeTop();
//can print as many products as you want
//select * from products , foreach => printHomeProduct with details of that products
printHomeProduct();
printHomeBottom();
printFooter();


?>
</body>

</html>