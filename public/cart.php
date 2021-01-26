<?php
require_once '../resources/lib/autoload.php';

printHead("shopping_cart");
printNav();
printCartTop();
// for each element in cart print out a row
if(isset($_SESSION['cart'])){foreach ($_SESSION['cart'] as $key => $value){
    $data=GetData("SELECT pro_price,pro_name,pro_image1,pro_unique_id FROM products WHERE pro_id = $key");

}}
printCartBottom();
printFooter();


?>

</div>
<!-- js to hide loader on page load -->
<script>
    window.addEventListener("load", function () {
        const loader = document.querySelector(".loader");
        loader.className += " hidden"; // class "loader hidden"
    });
</script>
</body>

</html>