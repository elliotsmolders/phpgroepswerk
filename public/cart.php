<?php

require_once '../resources/lib/autoload.php';

printHead("shopping_cart");
printNav();
printCartTop();
//can print as many rows as you want
printCartRow();
printCartBottom();
printFooter();
//split up shopping_cart_html and load in 1 row per product in cart ? 

?>
</body>

</html>