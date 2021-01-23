<?php
$public_access=true;
require_once '../resources/lib/autoload.php';

printHead("shopping_cart");
printNav();
printCartTop();
// for each element in cart print out a row
foreach ($_SESSION['cart'] as $key => $value){
    $data=GetData("SELECT pro_price,pro_name,pro_image1,pro_unique_id FROM products WHERE pro_id = $key");
    printCartRow($data[0]['pro_price'],$data[0]['pro_image1'],$data[0]['pro_name'],$value,$data[0]['pro_unique_id']);
}
printCartBottom();
printFooter();


?>

</div>
</body>

</html>