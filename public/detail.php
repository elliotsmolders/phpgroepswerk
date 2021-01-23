<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
$public_access = true;
require_once '../resources/lib/autoload.php';
$id = $_GET["product"];
$data=GetData("SELECT * FROM products WHERE pro_unique_id = $id");
$price = $data[0]['pro_price'];
$name = $data[0]['pro_name'];
$category = $data[0]['pro_category'];
$brand = $data[0]['pro_brand'];
$rating = $data[0]['pro_rating'];
$description = $data[0]['pro_description'];
$image1 = $data[0]['pro_image1'];
$image2 = $data[0]['pro_image2'];
$image3 = $data[0]['pro_image3'];
$image4 = $data[0]['pro_image4'];
$availability =available($data[0]['pro_availability']);
$id=$data[0]['pro_unique_id'];
printHead("detail");
printNav();
printDetailTop($image1,$image2,$image3,$image4,$name,$price,$rating);
printDetailBottom($category,$brand,$description,$availability,$rating,$id);
printFooter();

?>
</body>

</html>